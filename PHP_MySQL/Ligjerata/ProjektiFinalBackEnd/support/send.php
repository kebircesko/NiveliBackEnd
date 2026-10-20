<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/support_schema.php';

header('Content-Type: application/json; charset=utf-8');

function json_error(string $message, int $status = 422): never
{
    http_response_code($status);
    echo json_encode(['error' => $message], JSON_UNESCAPED_UNICODE);
    exit;
}

function bot_reply(string $message): string
{
    $text = mb_strtolower($message, 'UTF-8');

    if (preg_match('/porosi|status|paket|ku.*porosia/u', $text)) {
        return 'Për statusin e porosisë, hyr te Llogaria ime → Porositë e mia. Nëse na jep numrin e porosisë, ekipi i suportit do ta kontrollojë.';
    }
    if (preg_match('/transport|dërges|derges|sa dit|kur.*vjen/u', $text)) {
        return 'Dërgesa zakonisht arrin brenda 1–3 ditësh pune. Transporti është falas për porositë mbi 100 €.';
    }
    if (preg_match('/kthim|kthej|garanci|defekt/u', $text)) {
        return 'Produktin mund ta kthesh brenda 14 ditësh. Të gjitha produktet kanë 12 muaj garanci. Supporti do të të ndihmojë me hapat.';
    }
    if (preg_match('/pages|paguaj|kartel|cash|dorëzim|dorezim/u', $text)) {
        return 'Aktualisht pagesa bëhet me para në dorëzim. Nuk ke nevojë të vendosësh të dhëna bankare.';
    }
    if (preg_match('/stok|produkt|çmim|cmim|ofert/u', $text)) {
        return 'Stoku dhe çmimi aktual shfaqen te faqja e secilit produkt. Për një rekomandim specifik, shkruaj cilin produkt po kërkon.';
    }
    if (preg_match('/pershendet|përshëndet|tung|hello|hi\b/u', $text)) {
        return 'Përshëndetje! Jam asistenti virtual i Nexa. Mund të më pyesësh për porosi, dërgesë, kthim, pagesë ose produkte.';
    }

    return 'Faleminderit për mesazhin! E regjistrova pyetjen dhe një administrator do të të përgjigjet këtu sa më shpejt.';
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    json_error('Metoda nuk lejohet.', 405);
}

if (!isset($_POST['csrf']) || !hash_equals($_SESSION['csrf'] ?? '', $_POST['csrf'])) {
    json_error('Faqja ka skaduar. Rifreskoje dhe provo përsëri.', 419);
}

if (isset($_SESSION['support_last_send']) && time() - $_SESSION['support_last_send'] < 1) {
    json_error('Prit një sekondë para mesazhit tjetër.', 429);
}

$message = trim($_POST['message'] ?? '');
if ($message === '' || mb_strlen($message) > 1000) {
    json_error('Mesazhi duhet të ketë 1–1000 karaktere.');
}

try {
    ensure_support_tables($db);
    $conversationId = (int)($_SESSION['support_conversation_id'] ?? 0);
    $token = $_SESSION['support_token'] ?? bin2hex(random_bytes(32));
    $_SESSION['support_token'] = $token;

    if ($conversationId) {
        $check = $db->prepare('SELECT id FROM support_conversations WHERE id=? AND session_token=?');
        $check->bind_param('is', $conversationId, $token);
        $check->execute();
        if (!$check->get_result()->num_rows) $conversationId = 0;
    }

    $db->begin_transaction();

    if (!$conversationId) {
        $name = trim($_POST['name'] ?? ($_SESSION['user']['name'] ?? ''));
        $email = trim($_POST['email'] ?? ($_SESSION['user']['email'] ?? ''));
        if (mb_strlen($name) < 2) json_error('Shkruaj emrin para mesazhit.');
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) json_error('Shkruaj një email valid.');
        $userId = isset($_SESSION['user']['id']) ? (int)$_SESSION['user']['id'] : null;
        $create = $db->prepare('INSERT INTO support_conversations(user_id,session_token,customer_name,customer_email) VALUES(?,?,?,?)');
        $create->bind_param('isss', $userId, $token, $name, $email);
        $create->execute();
        $conversationId = $db->insert_id;
        $_SESSION['support_conversation_id'] = $conversationId;
    } else {
        $open = $db->prepare("UPDATE support_conversations SET status='open',updated_at=NOW() WHERE id=?");
        $open->bind_param('i', $conversationId);
        $open->execute();
    }

    $insert = $db->prepare('INSERT INTO support_messages(conversation_id,sender,message) VALUES(?,?,?)');
    $sender = 'customer';
    $insert->bind_param('iss', $conversationId, $sender, $message);
    $insert->execute();

    $reply = bot_reply($message);
    $sender = 'bot';
    $insert->bind_param('iss', $conversationId, $sender, $reply);
    $insert->execute();

    $touch = $db->prepare('UPDATE support_conversations SET updated_at=NOW() WHERE id=?');
    $touch->bind_param('i', $conversationId);
    $touch->execute();
    $db->commit();
    $_SESSION['support_last_send'] = time();

    echo json_encode(['success' => true], JSON_UNESCAPED_UNICODE);
} catch (mysqli_sql_exception $exception) {
    if ($db->errno === 0) {
        // no-op; connection may still be usable
    }
    try { $db->rollback(); } catch (Throwable $ignored) {}
    json_error('Chat-i nuk është instaluar ende. Importo database/chat_support_migration.sql në phpMyAdmin.', 500);
}
