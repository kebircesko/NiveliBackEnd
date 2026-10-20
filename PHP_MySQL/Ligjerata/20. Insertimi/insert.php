<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title> Insert to WEB</title>
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
        <h1 class="page-title">Produktet</h1>
        <a class="nav-link" href="insertimi.php">Shto produkt</a>
        <div class="product-grid">
        <?php 
            $con = mysqli_connect('localhost', 'kebir', 'Kebir123!', 'login');
                mysqli_select_db($con,"login");
                $select = "SELECT * FROM upload"; 
                /*order by rand() LIMIT 3//by rand()->random //Cka mdel si rezultat me kete query */
                $query = mysqli_query($con, $select);
                //mysqli_fetch array -eshte nje funksion qe perdoret per te marre rreshtat nga databaza dhe per ti ruajtur ato si nje grup.
                while($row=mysqli_fetch_array($query))
                {
                    $fileId = $row['id'];
                    $fileName = $row['fileName'];
                    $fileUpload = $row['fileUpload'];
                    $description = substr($row['Description'],0,100);//me i shfaq sa keraktere deshirojm 0-> start 100->finish
                ?>
                <article class="product-card">
                <h2>
                    <a href="produkti.php?id=<?php echo $fileId;?>">
                        <?php echo $fileName; ?>
                    </a>
                </h2>
                    <?php $imagePath = __DIR__ . '/file/' . basename($fileUpload); ?>
                    <?php if (is_file($imagePath)) { ?>
                        <img src="file/<?php echo rawurlencode(basename($fileUpload)); ?>" alt="<?php echo htmlspecialchars($fileName); ?>">
                    <?php } else { ?>
                        <p>Fotografia nuk gjendet në folderin <code>file</code>.</p>
                    <?php } ?>
                <p>
                    <?php echo $description; ?>
                </p>
                </article>
                <?php } ?><!--Pse e mbyllim ketu?-->
                </div>
    </main>
    <footer class="site-footer">
        <p>&copy; <?php echo date('Y'); ?> Galeria. Të gjitha të drejtat e rezervuara.</p>
    </footer>
    </body>
</html>