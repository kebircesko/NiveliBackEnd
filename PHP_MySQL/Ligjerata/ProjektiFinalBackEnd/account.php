<?php
require_once __DIR__.'/config/database.php';require_once __DIR__.'/includes/functions.php';
if(!is_logged_in()){flash('error','Hyni për të parë llogarinë.');redirect('login.php');}
$stmt=$db->prepare('SELECT * FROM orders WHERE user_id=? ORDER BY created_at DESC');$stmt->bind_param('i',$_SESSION['user']['id']);$stmt->execute();$orders=$stmt->get_result();
$pageTitle='Llogaria ime';require __DIR__.'/includes/header.php';
?>
<div class="container account-grid"><aside class="info-card"><p class="eyebrow">Profili</p><h2><?= e($_SESSION['user']['name']) ?></h2><p class="muted"><?= e($_SESSION['user']['email']) ?></p><?php if(is_admin()): ?><a class="button button-dark" href="admin/index.php">Admin panel</a><br><br><?php endif; ?><a class="button button-soft" href="logout.php">Dil nga llogaria</a></aside><section><div class="section-heading"><div><p class="eyebrow">Historia</p><h2>Porositë e mia</h2></div></div><?php if(!$orders->num_rows): ?><div class="empty-state"><h3>Ende nuk keni porosi.</h3><a class="button button-dark" href="products.php">Shiko produktet</a></div><?php else: ?><div class="table-wrap"><table class="data-table"><tr><th>Porosia</th><th>Data</th><th>Statusi</th><th>Totali</th></tr><?php while($o=$orders->fetch_assoc()): ?><tr><td>#<?= $o['id'] ?></td><td><?= date('d.m.Y',strtotime($o['created_at'])) ?></td><td><?= e(ucfirst($o['status'])) ?></td><td><?= money((float)$o['total']) ?></td></tr><?php endwhile; ?></table></div><?php endif; ?></section></div>
<?php require __DIR__.'/includes/footer.php'; ?>
