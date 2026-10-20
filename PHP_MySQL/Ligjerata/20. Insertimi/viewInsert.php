<!DOCTYPE html>
<html>
    <head>
        <title> View Insert </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Css/style.css">
    </head>
    <body>
        <header class="site-header">
            <div class="container header-content">
                <a class="site-logo" href="insert.php">Galeria</a>
                <nav class="site-nav">
                    <a href="insert.php">Produktet</a>
                    <a href="insertimi.php">Shto produkt</a>
                    <a href="viewInsert.php">Tabela</a>
                </nav>
            </div>
        </header>
        <main class="container page-content">
        <h1 class="page-title">Lista e produkteve</h1>
        <a class="nav-link" href="insert.php">Produktet</a>
        <div class="table-wrapper">
        <table>
            <tr>
                <th>File Id</th>
                <th>File Name</th>
                <th>File Upload</th>
                <th>Description</th>
            </tr>
            <?php
               $con = mysqli_connect('localhost', 'kebir', 'Kebir123!', 'login');
                    mysqli_select_db($con,'login');
                
                $select = "SELECT * FROM upload;";
                $query = mysqli_query($con, $select);
                
                while($row = mysqli_fetch_array($query))
                {
                    $id = $row['id'];
                    $fileName = $row['fileName'];
                    $fileUpload = $row['fileUpload'];
                    $description = $row['Description'];
            ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $fileName; ?></td>
                <td><img class="table-image" src="file/<?php echo rawurlencode(basename($fileUpload)); ?>" alt="<?php echo htmlspecialchars($fileName); ?>"></td>
                <td><?php echo $description; ?></td>
            </tr>
              <?php  } ?>
            
        </table>
        </div>
        </main>
        <footer class="site-footer">
            <p>&copy; <?php echo date('Y'); ?> Galeria. Të gjitha të drejtat e rezervuara.</p>
        </footer>
    </body>
</html>
