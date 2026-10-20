<?php
$pageTitle = $pageTitle ?? 'Nexa Store';
$activePage = $activePage ?? '';
require_once __DIR__ . '/functions.php';
?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Nexa Store - teknologji per ritmin tend.">
    <title><?= e($pageTitle) ?> | Nexa Store</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= url('assets/css/style.css') ?>">
</head>
<body>
<header class="site-header">
    <div class="announcement">Transport falas per porosite mbi 100 € <span>•</span> Kthim brenda 14 ditesh</div>
    <div class="container nav-wrap">
        <a class="brand" href="<?= url('index.php') ?>"><span class="brand-mark">N</span>NEXA</a>
        <button class="menu-button" type="button" aria-label="Hap menune" onclick="document.querySelector('.main-nav').classList.toggle('open')">☰</button>
        <nav class="main-nav">
            <a class="<?= $activePage === 'home' ? 'active' : '' ?>" href="<?= url('index.php') ?>">Ballina</a>
            <a class="<?= $activePage === 'products' ? 'active' : '' ?>" href="<?= url('products.php') ?>">Produktet</a>
            <a class="<?= $activePage === 'contact' ? 'active' : '' ?>" href="<?= url('contact.php') ?>">Kontakti</a>
        </nav>
        <div class="nav-actions">
            <?php if (is_admin()): ?><a class="nav-icon" href="<?= url('admin/index.php') ?>" title="Admin panel">⚙</a><?php endif; ?>
            <a class="nav-icon" href="<?= url(is_logged_in() ? 'account.php' : 'login.php') ?>" title="Llogaria">♙</a>
            <a class="cart-link" href="<?= url('cart.php') ?>" title="Shporta">Bag <span><?= cart_count() ?></span></a>
        </div>
    </div>
</header>
<?php if (!empty($_SESSION['flash'])): $flash = $_SESSION['flash']; unset($_SESSION['flash']); ?>
    <div class="container"><div class="alert alert-<?= e($flash['type']) ?>"><?= e($flash['message']) ?></div></div>
<?php endif; ?>
<main>
