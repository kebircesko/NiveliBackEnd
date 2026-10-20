<?php
require_once __DIR__.'/config/database.php'; require_once __DIR__.'/includes/functions.php';
if(is_logged_in()) redirect(is_admin()?'admin/index.php':'account.php');
$error='';$email='';
if($_SERVER['REQUEST_METHOD']==='POST'){verify_csrf();$email=trim($_POST['email']??'');$password=$_POST['password']??'';$stmt=$db->prepare('SELECT id,name,email,password,role FROM users WHERE email=? LIMIT 1');$stmt->bind_param('s',$email);$stmt->execute();$user=$stmt->get_result()->fetch_assoc();if($user&&password_verify($password,$user['password'])){unset($user['password']);session_regenerate_id(true);$_SESSION['user']=$user;flash('success','Mirë se erdhe, '.$user['name'].'!');redirect($user['role']==='admin'?'admin/index.php':'account.php');}$error='Email ose fjalëkalim i pasaktë.';}
$pageTitle='Hyr';require __DIR__.'/includes/header.php';
?>
<section class="auth-section"><div class="container"><form class="auth-card" method="post"><input type="hidden" name="csrf" value="<?= csrf_token() ?>"><p class="eyebrow">Mirë se u ktheve</p><h1>Hyr në llogari</h1><p class="muted">Vazhdo aty ku e le.</p><?php if($error): ?><div class="error-list"><?= e($error) ?></div><?php endif; ?><div class="form-group"><label>Email</label><input type="email" name="email" value="<?= e($email) ?>" required></div><div class="form-group"><label>Fjalëkalimi</label><input type="password" name="password" required></div><button class="button button-dark" style="width:100%">Hyr</button><p class="muted" style="text-align:center">Nuk ke llogari? <a class="text-link" href="register.php">Regjistrohu</a></p><div class="alert alert-success"><small>Admin demo: admin@nexa.test / Admin123!</small></div></form></div></section>
<?php require __DIR__.'/includes/footer.php'; ?>
