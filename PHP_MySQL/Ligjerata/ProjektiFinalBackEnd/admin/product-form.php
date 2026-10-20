<?php
$id=filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT)?:0;$adminTitle=$id?'Ndrysho produktin':'Shto produkt';$adminActive='products';require __DIR__.'/_header.php';
$product=['name'=>'','category_id'=>1,'description'=>'','price'=>'','old_price'=>'','stock'=>0,'image'=>'','is_featured'=>0,'is_active'=>1];$errors=[];
if($id){$stmt=$db->prepare('SELECT * FROM products WHERE id=?');$stmt->bind_param('i',$id);$stmt->execute();$product=$stmt->get_result()->fetch_assoc();if(!$product){flash('error','Produkti nuk u gjet.');redirect('admin/products.php');}}
if($_SERVER['REQUEST_METHOD']==='POST'){verify_csrf();$product['name']=trim($_POST['name']??'');$product['category_id']=(int)($_POST['category_id']??0);$product['description']=trim($_POST['description']??'');$product['price']=(float)($_POST['price']??0);$product['old_price']=($_POST['old_price']??'')!==''?(float)$_POST['old_price']:null;$product['stock']=max(0,(int)($_POST['stock']??0));$product['is_featured']=isset($_POST['is_featured'])?1:0;$product['is_active']=isset($_POST['is_active'])?1:0;if($product['name']==='')$errors[]='Emri është i detyrueshëm.';if($product['price']<=0)$errors[]='Çmimi duhet të jetë më i madh se 0.';if(strlen($product['description'])<10)$errors[]='Përshkrimi është shumë i shkurtër.';
// Kontrollo gabimin e upload-it para se te lexohet skedari temporary.
$file = $_FILES['image'] ?? null;
if ($file && $file['error'] !== UPLOAD_ERR_NO_FILE) {
    $uploadErrors = [
        UPLOAD_ERR_INI_SIZE => 'Fotografia është më e madhe se limiti 2MB i PHP-së.',
        UPLOAD_ERR_FORM_SIZE => 'Fotografia është shumë e madhe.',
        UPLOAD_ERR_PARTIAL => 'Fotografia u ngarkua vetëm pjesërisht. Provo përsëri.',
        UPLOAD_ERR_NO_TMP_DIR => 'Mungon folderi temporary i serverit.',
        UPLOAD_ERR_CANT_WRITE => 'Serveri nuk mund ta ruajë fotografinë në disk.',
        UPLOAD_ERR_EXTENSION => 'Ngarkimi u ndal nga një PHP extension.'
    ];

    if ($file['error'] !== UPLOAD_ERR_OK) {
        $errors[] = $uploadErrors[$file['error']] ?? 'Ngarkimi i fotografisë dështoi.';
    } elseif ($file['size'] > 2 * 1024 * 1024) {
        $errors[] = 'Fotografia duhet të jetë më e vogël se 2MB.';
    } else {
        $allowed = ['image/jpeg'=>'jpg', 'image/png'=>'png', 'image/webp'=>'webp', 'image/svg+xml'=>'svg'];
        $mime = (new finfo(FILEINFO_MIME_TYPE))->file($file['tmp_name']);

        if (!isset($allowed[$mime])) {
            $errors[] = 'Lejohen vetëm fotografi JPG, PNG, WEBP ose SVG.';
        } elseif (!is_writable(__DIR__ . '/../uploads')) {
            $errors[] = 'Folderi uploads nuk ka leje për shkrim nga Apache/PHP.';
        } elseif (!$errors) {
            $newName = bin2hex(random_bytes(8)) . '.' . $allowed[$mime];
            $destination = __DIR__ . '/../uploads/' . $newName;

            if (move_uploaded_file($file['tmp_name'], $destination)) {
                $oldImage = $product['image'];
                $product['image'] = $newName;

                if ($oldImage && is_file(__DIR__ . '/../uploads/' . basename($oldImage))) {
                    unlink(__DIR__ . '/../uploads/' . basename($oldImage));
                }
            } else {
                $errors[] = 'Fotografia nuk u kopjua në folderin uploads.';
            }
        }
    }
} elseif (!$id && empty($product['image'])) {
    $errors[] = 'Zgjidhni një fotografi për produktin.';
}
if(!$errors){if($id){$stmt=$db->prepare('UPDATE products SET category_id=?,name=?,description=?,price=?,old_price=?,stock=?,image=?,is_featured=?,is_active=? WHERE id=?');$stmt->bind_param('issddisiii',$product['category_id'],$product['name'],$product['description'],$product['price'],$product['old_price'],$product['stock'],$product['image'],$product['is_featured'],$product['is_active'],$id);}else{$stmt=$db->prepare('INSERT INTO products(category_id,name,description,price,old_price,stock,image,is_featured,is_active) VALUES(?,?,?,?,?,?,?,?,?)');$stmt->bind_param('issddisii',$product['category_id'],$product['name'],$product['description'],$product['price'],$product['old_price'],$product['stock'],$product['image'],$product['is_featured'],$product['is_active']);}$stmt->execute();flash('success',$id?'Produkti u përditësua.':'Produkti u shtua.');redirect('admin/products.php');}}
$categories=$db->query('SELECT * FROM categories ORDER BY name');
?>
<form class="admin-form" method="post" enctype="multipart/form-data"><input type="hidden" name="csrf" value="<?= csrf_token() ?>"><?php if($errors): ?><div class="error-list"><?php foreach($errors as $error): ?><div>• <?= e($error) ?></div><?php endforeach; ?></div><?php endif; ?><div class="form-row"><div class="form-group"><label>Emri i produktit</label><input name="name" value="<?= e($product['name']) ?>" required></div><div class="form-group"><label>Kategoria</label><select name="category_id"><?php while($c=$categories->fetch_assoc()): ?><option value="<?= $c['id'] ?>" <?= $product['category_id']==$c['id']?'selected':'' ?>><?= e($c['name']) ?></option><?php endwhile; ?></select></div></div><div class="form-group"><label>Përshkrimi</label><textarea name="description" required><?= e($product['description']) ?></textarea></div><div class="form-row"><div class="form-group"><label>Çmimi (€)</label><input type="number" step="0.01" min="0" name="price" value="<?= e((string)$product['price']) ?>" required></div><div class="form-group"><label>Çmimi i vjetër (€) — opsional</label><input type="number" step="0.01" min="0" name="old_price" value="<?= e((string)$product['old_price']) ?>"></div></div><div class="form-row"><div class="form-group"><label>Stoku</label><input type="number" min="0" name="stock" value="<?= (int)$product['stock'] ?>"></div><div class="form-group"><label>Fotografia (JPG, PNG, WEBP ose SVG — maksimum 2MB)</label><input type="file" name="image" accept="image/jpeg,image/png,image/webp,image/svg+xml" <?= !$id ? 'required' : '' ?>><?php if($product['image']): ?><img class="image-preview" src="<?= e(product_image($product['image'])) ?>" alt="Fotografia aktuale"><?php endif; ?></div></div><div class="form-row"><label><input style="width:auto" type="checkbox" name="is_featured" <?= $product['is_featured']?'checked':'' ?>> Produkt i veçuar</label><label><input style="width:auto" type="checkbox" name="is_active" <?= $product['is_active']?'checked':'' ?>> Aktiv në dyqan</label></div><br><button class="button button-dark">Ruaj produktin</button> <a class="button button-soft" href="products.php">Anulo</a></form>
<?php require __DIR__.'/_footer.php'; ?>
