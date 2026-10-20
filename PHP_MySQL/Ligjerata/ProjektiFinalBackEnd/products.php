<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';
$pageTitle = 'Produktet'; $activePage = 'products';
$categoryId = filter_input(INPUT_GET, 'category', FILTER_VALIDATE_INT) ?: 0;
$search = trim($_GET['search'] ?? '');
$categories = $db->query("SELECT c.*, COUNT(p.id) AS product_count FROM categories c LEFT JOIN products p ON p.category_id=c.id AND p.is_active=1 GROUP BY c.id ORDER BY c.name");
$sql = "SELECT p.*, c.name AS category_name FROM products p JOIN categories c ON c.id=p.category_id WHERE p.is_active=1";
$types = ''; $params = [];
if ($categoryId) { $sql .= ' AND p.category_id=?'; $types .= 'i'; $params[] = $categoryId; }
if ($search !== '') { $sql .= ' AND (p.name LIKE ? OR p.description LIKE ?)'; $types .= 'ss'; $term = "%$search%"; $params[]=$term; $params[]=$term; }
$sql .= ' ORDER BY p.created_at DESC';
$stmt = $db->prepare($sql); if ($types) $stmt->bind_param($types, ...$params); $stmt->execute(); $products = $stmt->get_result();
require __DIR__ . '/includes/header.php';
?>
<section class="page-hero"><div class="container"><p class="eyebrow">Koleksioni Nexa</p><h1>Teknologji me qëllim.</h1><p>Zgjidh pajisjet që e bëjnë ditën më të thjeshtë, më produktive dhe më argëtuese.</p></div></section>
<div class="container shop-layout">
    <aside class="filters"><h3>Kategoritë</h3><div class="filter-list"><a class="<?= !$categoryId ? 'active':'' ?>" href="products.php">Të gjitha</a><?php while($cat=$categories->fetch_assoc()): ?><a class="<?= $categoryId===$cat['id']?'active':'' ?>" href="products.php?category=<?= (int)$cat['id'] ?>"><span><?= e($cat['name']) ?></span><span><?= (int)$cat['product_count'] ?></span></a><?php endwhile; ?></div></aside>
    <section><form class="search-form" method="get"><input type="search" name="search" value="<?= e($search) ?>" placeholder="Kërko produkt..."><?php if($categoryId): ?><input type="hidden" name="category" value="<?= $categoryId ?>"><?php endif; ?><button class="button button-dark">Kërko</button></form><div class="results-head"><span><?= $products->num_rows ?> produkte</span><span>Renditur sipas më të rejave</span></div><div class="product-grid">
    <?php while($product=$products->fetch_assoc()): ?><article class="product-card"><?php if($product['old_price']): ?><span class="badge">Ofertë</span><?php endif; ?><a class="product-image" href="product.php?id=<?= (int)$product['id'] ?>"><img src="<?= e(product_image($product['image'])) ?>" alt="<?= e($product['name']) ?>"></a><div class="product-info"><span class="product-category"><?= e($product['category_name']) ?></span><h3><a href="product.php?id=<?= (int)$product['id'] ?>"><?= e($product['name']) ?></a></h3><span class="price"><?= money((float)$product['price']) ?></span><?php if($product['old_price']): ?><span class="old-price"><?= money((float)$product['old_price']) ?></span><?php endif; ?></div></article><?php endwhile; ?>
    <?php if(!$products->num_rows): ?><div class="empty-state"><h3>Nuk u gjet asnjë produkt</h3><a class="button button-dark" href="products.php">Pastro filtrat</a></div><?php endif; ?>
    </div></section>
</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
