<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ndrysho produktin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>
    
    <body>
    <main class="page-shell">
        <header class="page-header">
            <div>
                <p class="eyebrow">Përditësimi</p>
                <h1>Ndrysho produktin</h1>
                <p class="subtitle">Përditëso informacionin dhe fotografinë.</p>
            </div>
            <a class="button button-secondary" href="viewFile(Update&Delete).php">← Kthehu te lista</a>
        </header>
    <?php
        $connect=mysqli_connect("localhost","kebir","Kebir123!","login");
            mysqli_select_db($connect,"login");

        if(isset($_GET['update'])){
            $update_id = $_GET['update'];
            $select = "SELECT * FROM upload WHERE id='$update_id'";
            $query = mysqli_query($connect, $select);
            while($row=mysqli_fetch_array($query)){
                $safeFileName = basename($row['fileUpload']);
                $currentImagePath = 'file/' . rawurlencode($safeFileName);

                if (!is_file(__DIR__ . '/file/' . $safeFileName)) {
                    $currentImagePath = '../20. Insertimi/file/' . rawurlencode($safeFileName);
                }
    ?>
    <form class="form-card" method='post' action="update_ID.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
        <div class="form-group">
            <label for="fileName">Emri i produktit</label>
            <input id="fileName" type="text" name="fileName" value="<?php echo htmlspecialchars($row['fileName']);?>">
        </div>
        <div class="form-group">
            <label for="fileUpload">Fotografia e re</label>
            <input id="fileUpload" type="file" name="fileUpload" accept="image/*">
            <img class="current-image" src="<?php echo $currentImagePath; ?>" alt="Fotografia aktuale">
        </div>
        <div class="form-group">
            <label for="description">Përshkrimi</label>
            <textarea id="description" name="description"><?php echo htmlspecialchars(trim($row['Description']));?></textarea>
        </div>
        <div class="form-actions">
            <input type="submit" name="update" value="Ruaji ndryshimet">
            <a class="button button-secondary" href="viewFile(Update&Delete).php">Anulo</a>
        </div>
    
        <?php } }?>  
    </form>
    </main>
    </body>
</html>
