<?php
$adminTitle='Mesazhet';$adminActive='messages';require __DIR__.'/_header.php';
if($_SERVER['REQUEST_METHOD']==='POST'){verify_csrf();$id=(int)($_POST['delete']??0);$stmt=$db->prepare('DELETE FROM messages WHERE id=?');$stmt->bind_param('i',$id);$stmt->execute();flash('success','Mesazhi u fshi.');redirect('admin/messages.php');}
$messages=$db->query('SELECT * FROM messages ORDER BY created_at DESC');
?>
<div class="table-card"><div class="table-wrap"><table class="data-table"><thead><tr><th>Dërguesi</th><th>Mesazhi</th><th>Data</th><th>Veprimi</th></tr></thead><tbody><?php while($m=$messages->fetch_assoc()): ?><tr><td><strong><?= e($m['name']) ?></strong><br><a href="mailto:<?= e($m['email']) ?>"><?= e($m['email']) ?></a></td><td style="max-width:540px"><?= nl2br(e($m['message'])) ?></td><td><?= date('d.m.Y H:i',strtotime($m['created_at'])) ?></td><td><form method="post"><input type="hidden" name="csrf" value="<?= csrf_token() ?>"><button class="mini-button danger" name="delete" value="<?= $m['id'] ?>" data-confirm="Ta fshij mesazhin?">Fshi</button></form></td></tr><?php endwhile; ?></tbody></table></div></div>
<?php require __DIR__.'/_footer.php'; ?>
