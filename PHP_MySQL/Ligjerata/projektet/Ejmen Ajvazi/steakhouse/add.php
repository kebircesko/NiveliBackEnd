<?php
session_start();
require_once 'database.php';

if(!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

$message = '';
$error = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image_url = '';
    
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "uploads/";
        
        $file_extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif', 'webp');
        
        if(in_array($file_extension, $allowed_extensions)) {
            $new_filename = time() . '_' . uniqid() . '.' . $file_extension;
            $target_file = $target_dir . $new_filename;
            
            if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                $image_url = $target_file;
            } else {
                $error = 'Failed to upload image';
            }
        } else {
            $error = 'Only JPG, JPEG, PNG, GIF, WEBP files are allowed';
        }
    }
    
    if(empty($error)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO menu_items (name, description, price, category, image_url) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$name, $description, $price, $category, $image_url]);
            $message = 'Item added successfully';
            header('refresh:2;url=admin.php');
        } catch(PDOException $e) {
            $error = 'Add failed: ' . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Menu Item - EA Steakhouse</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background: #191944;
            padding: 40px;
            border-radius: 10px;
            color: white;
        }
        .form-container h1 {
            color: #ffc527;
            margin-bottom: 30px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }
        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ffc527;
            background: #060614;
            color: white;
            border-radius: 5px;
            font-size: 16px;
        }
        .form-group input[type="file"] {
            padding: 5px;
            border: 1px solid #ffc527;
            background: #060614;
            color: white;
            border-radius: 5px;
        }
        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }
        .current-image {
            margin-top: 10px;
            max-width: 200px;
        }
        .current-image img {
            width: 100%;
            border-radius: 5px;
        }
        .buttons {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        .cancel-btn {
            background: #6c757d;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            flex: 1;
        }
        .submit-btn {
            background: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            flex: 1;
            font-size: 16px;
        }
        .message {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
        .message.success {
            background: #28a745;
            color: white;
        }
        .message.error {
            background: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
<div id="navpc">
    <img src="./images/logo.png" id="logopc" alt=""/>
    <ul>
        <a href="index.php"><li>Home</li></a>
        <a href="menu.php"><li>Menu</li></a>
        <a href="about.html"><li>About</li></a>
        <a href="contact.php"><li id="last">Contact</li></a>
        <a href="book.html"><button class="primary">Book a table</button></a>
    </ul>
</div>

<div class="form-container">
    <h1>Add New Menu Item</h1>
    
    <?php if($message): ?>
        <div class="message success"><?php echo $message; ?> Redirecting...</div>
    <?php endif; ?>
    <?php if($error): ?>
        <div class="message error"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label>Item Name *</label>
            <input type="text" name="name" required>
        </div>
        
        <div class="form-group">
            <label>Description</label>
            <textarea name="description"></textarea>
        </div>
        
        <div class="form-group">
            <label>Price *</label>
            <input type="number" step="0.01" name="price" required>
        </div>
        
        <div class="form-group">
            <label>Category *</label>
            <select name="category" required>
                <option value="steaks">STEAKS</option>
                <option value="salads">SALADS</option>
                <option value="desserts">DESSERTS</option>
                <option value="drinks">DRINKS</option>
            </select>
        </div>
        
        <div class="form-group">
            <label>Upload Image</label>
            <input type="file" name="image" accept="image/*">
        </div>
        
        <div class="buttons">
            <a href="admin.php" class="cancel-btn">Cancel</a>
            <button type="submit" class="submit-btn">Add Item</button>
        </div>
    </form>
</div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>