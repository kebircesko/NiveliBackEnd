<?php
$adminTitle = 'Support Chat';
$adminActive = 'support';
require __DIR__ . '/_header.php';
require_once __DIR__ . '/../includes/support_schema.php';

try {
    ensure_support_tables($db);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        verify_csrf();
        $conversationId = (int)($_POST['conversation_id'] ?? 0);
        $action = $_POST['action'] ?? 'reply';
        $postedSearch = trim($_POST['q'] ?? '');

        if ($action === 'reply') {
            $reply = trim($_POST['reply'] ?? '');
            if ($reply === '') {
                flash('error', 'Shkruaj përgjigjen para dërgimit.');
            } elseif (mb_strlen($reply) > 2000) {
                flash('error', 'Përgjigjja është shumë e gjatë.');
            } else {
                $stmt = $db->prepare("INSERT INTO support_messages(conversation_id,sender,message) SELECT id,'admin',? FROM support_conversations WHERE id=?");
                $stmt->bind_param('si', $reply, $conversationId);
                $stmt->execute();
                $update = $db->prepare("UPDATE support_conversations SET status='open',updated_at=NOW() WHERE id=?");
                $update->bind_param('i', $conversationId);
                $update->execute();
                flash('success', 'Përgjigjja iu dërgua klientit.');
            }
        } elseif (in_array($action, ['open', 'closed'], true)) {
            $stmt = $db->prepare('UPDATE support_conversations SET status=? WHERE id=?');
            $stmt->bind_param('si', $action, $conversationId);
            $stmt->execute();
            flash('success', $action === 'closed' ? 'Biseda u mbyll.' : 'Biseda u rihap.');
        } elseif ($action === 'delete') {
            $stmt = $db->prepare('DELETE FROM support_conversations WHERE id=?');
            $stmt->bind_param('i', $conversationId);
            $stmt->execute();
            flash('success', 'Biseda u fshi.');
            redirect('admin/support.php' . ($postedSearch !== '' ? '?q=' . rawurlencode($postedSearch) : ''));
        }
        redirect('admin/support.php?id=' . $conversationId . ($postedSearch !== '' ? '&q=' . rawurlencode($postedSearch) : ''));
    }

    $search = trim($_GET['q'] ?? $_POST['q'] ?? '');
    $conversationSql = "SELECT c.*,
        (SELECT sm.message FROM support_messages sm WHERE sm.conversation_id=c.id ORDER BY sm.id DESC LIMIT 1) AS last_message,
        (SELECT sm.sender FROM support_messages sm WHERE sm.conversation_id=c.id ORDER BY sm.id DESC LIMIT 1) AS last_sender
        FROM support_conversations c";
    if ($search !== '') {
        $conversationSql .= " WHERE c.customer_name LIKE ? OR c.customer_email LIKE ?
            OR EXISTS (SELECT 1 FROM support_messages searched WHERE searched.conversation_id=c.id AND searched.message LIKE ?)";
    }
    $conversationSql .= " ORDER BY (c.status='open') DESC,c.updated_at DESC";
    $conversationStmt = $db->prepare($conversationSql);
    if ($search !== '') {
        $searchTerm = '%' . $search . '%';
        $conversationStmt->bind_param('sss', $searchTerm, $searchTerm, $searchTerm);
    }
    $conversationStmt->execute();
    $conversations = $conversationStmt->get_result();

    $selectedId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?: 0;
    if (!$selectedId && $conversations->num_rows) {
        $first = $conversations->fetch_assoc();
        $selectedId = (int)$first['id'];
        $conversations->data_seek(0);
    }

    $selected = null;
    $chatMessages = null;
    if ($selectedId) {
        $stmt = $db->prepare('SELECT * FROM support_conversations WHERE id=?');
        $stmt->bind_param('i', $selectedId);
        $stmt->execute();
        $selected = $stmt->get_result()->fetch_assoc();
        if ($selected) {
            $stmt = $db->prepare('SELECT * FROM support_messages WHERE conversation_id=? ORDER BY id ASC');
            $stmt->bind_param('i', $selectedId);
            $stmt->execute();
            $chatMessages = $stmt->get_result();
        }
    }
} catch (mysqli_sql_exception $exception) {
    $chatInstallError = true;
}
?>
<?php if (!empty($chatInstallError)): ?>
    <div class="error-list"><strong>Chat-i nuk është instaluar në databazë.</strong><br>Importo skedarin <code>database/chat_support_migration.sql</code> në phpMyAdmin.</div>
<?php else: ?>
<div class="support-admin">
    <aside class="support-inbox">
        <div class="support-inbox-title"><strong>Bisedat</strong><span><?= $conversations->num_rows ?></span></div>
        <form class="support-search" method="get">
            <input type="search" name="q" value="<?= e($search) ?>" placeholder="Kërko emër, email, mesazh...">
            <button type="submit" aria-label="Kërko">⌕</button>
            <?php if ($search !== ''): ?><a href="support.php" title="Pastro kërkimin">×</a><?php endif; ?>
        </form>
        <?php if (!$conversations->num_rows): ?><div class="support-empty"><?= $search !== '' ? 'Nuk u gjet asnjë bisedë.' : 'Ende nuk ka biseda.' ?></div><?php endif; ?>
        <?php while ($conversation = $conversations->fetch_assoc()): ?>
            <a class="support-conversation <?= $selectedId === (int)$conversation['id'] ? 'active' : '' ?>" href="support.php?id=<?= $conversation['id'] ?><?= $search !== '' ? '&amp;q=' . rawurlencode($search) : '' ?>">
                <span class="support-person"><?= e(mb_strtoupper(mb_substr($conversation['customer_name'], 0, 1))) ?></span>
                <span class="support-summary"><strong><?= e($conversation['customer_name']) ?></strong><small><?= e(mb_strimwidth($conversation['last_message'] ?? '', 0, 48, '…')) ?></small></span>
                <span class="support-meta"><small><?= date('H:i', strtotime($conversation['updated_at'])) ?></small><i class="<?= $conversation['status'] ?>"></i></span>
            </a>
        <?php endwhile; ?>
    </aside>
    <section class="support-thread">
        <?php if ($selected): ?>
            <header class="support-thread-head"><div><strong><?= e($selected['customer_name']) ?></strong><a href="mailto:<?= e($selected['customer_email']) ?>"><?= e($selected['customer_email']) ?></a></div><div class="admin-actions"><form method="post"><input type="hidden" name="csrf" value="<?= csrf_token() ?>"><input type="hidden" name="conversation_id" value="<?= $selectedId ?>"><input type="hidden" name="q" value="<?= e($search) ?>"><button class="mini-button" name="action" value="<?= $selected['status']==='open'?'closed':'open' ?>"><?= $selected['status']==='open'?'Mbylle':'Rihape' ?></button><button class="mini-button danger" name="action" value="delete" data-confirm="Ta fshij tërë bisedën?">Fshi</button></form></div></header>
            <div class="support-thread-messages" id="adminChatMessages">
                <?php while ($message = $chatMessages->fetch_assoc()): ?><div class="support-message <?= e($message['sender']) ?>"><div><span><?= $message['sender']==='customer' ? e($selected['customer_name']) : ($message['sender']==='bot'?'Nexa Bot':'Ju') ?></span><p><?= nl2br(e($message['message'])) ?></p><small><?= date('d.m.Y H:i', strtotime($message['created_at'])) ?></small></div></div><?php endwhile; ?>
            </div>
            <form class="support-reply" method="post"><input type="hidden" name="csrf" value="<?= csrf_token() ?>"><input type="hidden" name="conversation_id" value="<?= $selectedId ?>"><input type="hidden" name="q" value="<?= e($search) ?>"><textarea name="reply" rows="2" maxlength="2000" placeholder="Shkruaj përgjigjen për klientin..." required></textarea><button class="button button-dark" name="action" value="reply">Dërgo përgjigjen ➤</button></form>
        <?php else: ?><div class="support-empty"><h3>Zgjidh një bisedë</h3><p>Bisedat e klientëve do të shfaqen këtu.</p></div><?php endif; ?>
    </section>
</div>
<script>const adminChat=document.getElementById('adminChatMessages');if(adminChat)adminChat.scrollTop=adminChat.scrollHeight;</script>
<?php endif; ?>
<?php require __DIR__ . '/_footer.php'; ?>
