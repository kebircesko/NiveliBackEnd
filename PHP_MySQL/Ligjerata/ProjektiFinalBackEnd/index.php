<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';
$pageTitle = 'Teknologji per cdo dite';
$activePage = 'home';
$featured = $db->query("SELECT p.*, c.name AS category_name FROM products p JOIN categories c ON c.id=p.category_id WHERE p.is_featured=1 AND p.is_active=1 ORDER BY p.id DESC LIMIT 4");
require __DIR__ . '/includes/header.php';
?>
<section class="hero"><div class="container"><div class="hero-grid">
    <div class="hero-copy"><p class="eyebrow">Koleksioni i ri / 2026</p><h1>Teknologji që ecën me ritmin tënd.</h1><p>Pajisje të zgjedhura për tingull më të mirë, punë më të mençur dhe çdo moment mes tyre.</p><div class="hero-actions"><a class="button button-primary" href="products.php">Eksploro koleksionin →</a><a class="button button-outline" href="#featured">Shiko më të kërkuarat</a></div></div>
    <div class="hero-visual"><div class="float-tag one">● Tingull premium</div><div class="hero-product">🎧</div><div class="float-tag two">30h bateri<br><small>për gjithë javën</small></div></div>
</div></div></section>
<div class="container trust-row">
    <div class="trust-item"><span class="trust-icon">◇</span><div><strong>Dërgesë e shpejtë</strong><span>Brenda 1–3 ditësh</span></div></div>
    <div class="trust-item"><span class="trust-icon">↺</span><div><strong>Kthim i lehtë</strong><span>Brenda 14 ditësh</span></div></div>
    <div class="trust-item"><span class="trust-icon">♢</span><div><strong>Garanci 1 vit</strong><span>Për çdo produkt</span></div></div>
    <div class="trust-item"><span class="trust-icon">⌁</span><div><strong>Pagesë e sigurt</strong><span>Në dorëzim</span></div></div>
</div>
<section class="section"><div class="container"><div class="section-heading"><div><p class="eyebrow">Zgjidh sipas stilit</p><h2>Kategori të kuruara</h2></div><a class="text-link" href="products.php">Shiko të gjitha →</a></div><div class="category-grid">
    <a class="category-card" href="products.php?category=1"><p class="eyebrow">Tingull pa kompromis</p><h3>Audio</h3><span>→</span><div class="category-art">🎧</div></a>
    <a class="category-card" href="products.php?category=2"><p class="eyebrow">Puno kudo</p><h3>Aksesore</h3><span>→</span><div class="category-art">⌨️</div></a>
    <a class="category-card" href="products.php?category=3"><p class="eyebrow">Jetë më aktive</p><h3>Wearables</h3><span>→</span><div class="category-art">⌚</div></a>
</div></div></section>
<section class="section section-soft" id="featured"><div class="container"><div class="section-heading"><div><p class="eyebrow">Zgjedhjet e klientëve</p><h2>Më të kërkuarat</h2></div><a class="text-link" href="products.php">Bli koleksionin →</a></div><div class="product-grid">
<?php while ($product = $featured->fetch_assoc()): ?>
    <article class="product-card"><?php if ($product['old_price']): ?><span class="badge">Ofertë</span><?php endif; ?><a class="product-image" href="product.php?id=<?= (int)$product['id'] ?>"><img src="<?= e(product_image($product['image'])) ?>" alt="<?= e($product['name']) ?>"></a><div class="product-info"><span class="product-category"><?= e($product['category_name']) ?></span><h3><a href="product.php?id=<?= (int)$product['id'] ?>"><?= e($product['name']) ?></a></h3><span class="price"><?= money((float)$product['price']) ?></span><?php if ($product['old_price']): ?><span class="old-price"><?= money((float)$product['old_price']) ?></span><?php endif; ?></div></article>
<?php endwhile; ?>
</div></div></section>
<section class="section"><div class="container"><div class="promo"><div class="promo-copy"><p class="eyebrow">Nexa workspace</p><h2>Më pak rrëmujë.<br>Më shumë fokus.</h2><p class="muted">Aksesore minimaliste të krijuara për tavolinën ku ndodhin idetë e mëdha.</p><a class="button button-dark" href="products.php?category=2">Zbulo workspace →</a></div><div class="promo-art">⌨️</div></div></div></section>
<?php require __DIR__ . '/includes/footer.php'; ?>
