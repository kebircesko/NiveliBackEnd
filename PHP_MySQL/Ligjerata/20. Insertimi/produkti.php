<!DOCTYPE html>
<html>
    <head>
        <title>Detajet e produktit</title>
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
        <main id="main_content" class="container page-content">
        <a class="nav-link" href="insert.php">Kthehu te produktet</a>
        <article class="detail-card">
        <?php
           $con = mysqli_connect('localhost', 'kebir', 'Kebir123!', 'login');
            mysqli_select_db($con,"login");

            if(isset($_GET['id'])){

                $page_id = $_GET['id'];
	            $query = "select * from upload where id='$page_id'";
                $run = mysqli_query($con, $query);

                while($row=mysqli_fetch_array($run)){//derisa te kryhet kushti
	
	               $id = $row['id'];
	               $fileName = $row['fileName'];
	               $fileUpload = $row['fileUpload'];
	               $description = $row['Description'];
        ?>
            <h2>
                <a href="produkti.php?id=<?php echo $id; ?>">
                    <?php echo $fileName; ?>
                </a>
            </h2>
            <?php $imagePath = __DIR__ . '/file/' . basename($fileUpload); ?>
            <?php if (is_file($imagePath)) { ?>
                <img src="file/<?php echo rawurlencode(basename($fileUpload)); ?>" alt="<?php echo htmlspecialchars($fileName); ?>">
            <?php } else { ?>
                <p>Fotografia nuk gjendet në folderin <code>file</code>.</p>
            <?php } ?>

            <p class="detail-name"><b><?php echo $fileName; ?></b></p>
            
            <p class="description"><?php echo $description; ?></p>

            <?php 
                                                    } 
            
                                    }
            ?>
        </article>
        </main>
        <footer class="site-footer">
            <p>&copy; <?php echo date('Y'); ?> Galeria. Të gjitha të drejtat e rezervuara.</p>
        </footer>
    </body>
</html>
