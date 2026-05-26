<?php
session_start();
require_once 'database.php';

if(!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

$message = '';
$error = '';

if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    try {
        $stmt = $pdo->prepare("SELECT image_url FROM menu_items WHERE id = ?");
        $stmt->execute([$id]);
        $item = $stmt->fetch();
        
        if($item && $item['image_url'] && file_exists($item['image_url'])) {
            unlink($item['image_url']);
        }
        
        $stmt = $pdo->prepare("DELETE FROM menu_items WHERE id = ?");
        $stmt->execute([$id]);
        $message = 'Item deleted successfully';
    } catch(PDOException $e) {
        $error = 'Delete failed';
    }
}

$stmt = $pdo->query("SELECT * FROM menu_items ORDER BY id DESC");
$items = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - EA Steakhouse</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .admin-container {
            padding: 40px 5%;
            color: white;
        }
        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }
        .logout-btn {
            background: #dc3545;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }
        .tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
            border-bottom: 2px solid #ffc527;
        }
        .tab {
            padding: 10px 20px;
            background: transparent;
            color: white;
            text-decoration: none;
            border-radius: 5px 5px 0 0;
            transition: 0.3s;
        }
        .tab.active {
            background: #ffc527;
            color: #060614;
        }
        .tab:hover:not(.active) {
            background: #191944;
        }
        .add-btn {
            background: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
        }
        .items-table {
            width: 100%;
            border-collapse: collapse;
            background: #191944;
            border-radius: 10px;
            overflow: hidden;
        }
        .items-table th, .items-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ffc527;
        }
        .items-table th {
            background: #ffc527;
            color: #060614;
        }
        .items-table td img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 5px;
        }
        .edit-btn, .delete-btn, .confirm-btn {
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            margin-right: 5px;
            display: inline-block;
        }
        .edit-btn {
            background: #28a745;
            color: white;
        }
        .delete-btn {
            background: #dc3545;
            color: white;
        }
        .confirm-btn {
            background: #ffc527;
            color: #060614;
        }
        .status {
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 12px;
        }
        .status.pending {
            background: #ffc107;
            color: #060614;
        }
        .status.confirmed {
            background: #28a745;
            color: white;
        }
        .message {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .message.success {
            background: #28a745;
            color: white;
        }
        .message.error {
            background: #dc3545;
            color: white;
        }
        .contact-message {
            max-width: 300px;
            white-space: pre-wrap;
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

<div class="admin-container">
    <div class="admin-header">
        <h1>Admin Panel</h1>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
    
    <?php if($message): ?>
        <div class="message success"><?php echo $message; ?></div>
    <?php endif; ?>
    <?php if($error): ?>
        <div class="message error"><?php echo $error; ?></div>
    <?php endif; ?>
    
        <a href="add.php" class="add-btn">+ Add New Menu Item</a>
        
        <h2>Menu Items</h2>
        <table class="items-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($items as $item): ?>
                <tr>
                    <td><?php echo $item['id']; ?></td>
                    <td><img src="<?php echo $item['image_url']; ?>" alt=""></td>
                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                    <td class="contact-message"><?php echo htmlspecialchars(substr($item['description'], 0, 50)); ?>...</td>
                    <td>$<?php echo number_format((float)$item['price'], 2); ?></td>
                    <td><?php echo $item['category']; ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $item['id']; ?>" class="edit-btn">Edit</a>
                        <a href="?delete=<?php echo $item['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
         </table>
</div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>