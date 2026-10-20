<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title> Insertimi i produkteve</title>
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
        <h1 class="page-title">Shto produkt</h1>
        <!--enctype="multipart/form-data"-është një lloj kodimi që lejon që filet të dërgohen përmes një metode POST. Thjesht, pa këtë kodim file nuk mund të dërgohen përmes metodes POST. Nëse dëshironi të lejoni një përdorues të ngarkojë një file përmes një forme, duhet ta përdorni këtë enctype->eshte per sigurimin.
        Me ndihmën e $ _FILES global, ne mund të marrim emrin e skedarit, llojin e skedarit, madhësinë e skedarit, emrin e skedarit temp dhe gabimet e shoqëruara me skedarin.
        -->
        <form class="upload-form" method="post" action="insertimi.php" enctype="multipart/form-data">
            <div class="form-group"><label for="fileName">Emri</label><input id="fileName" type="text" name="fileName"></div>
            <div class="form-group"><label for="fileUpload">Fotografia</label><input id="fileUpload" type="file" name="fileUpload" accept="image/*"></div>
            <div class="form-group"><label for="content">Përshkrimi</label><textarea id="content" name="content"></textarea></div>
            <div class="form-actions">
                <input type="submit" name="upload" value="Shto">
                <input type="reset" name="cancel" value="Pastro">
            </div>
        </form>
        
        <a class="form-home" href='insert.php'>Kthehu te produktet</a>
        </main>
        <footer class="site-footer">
            <p>&copy; <?php echo date('Y'); ?> Galeria. Të gjitha të drejtat e rezervuara.</p>
        </footer>
    </body>
</html>
<?php
    $con=mysqli_connect('localhost', 'kebir', 'Kebir123!', 'login');
        mysqli_select_db($con,'login');
    
    if(isset($_POST['upload']))
    {
        $fileName=$_POST['fileName'];
        $fileDescription=$_POST['content'];
        $fileUpload=basename($_FILES['fileUpload']['name']);//. $ _FILES ["file"] ["name"] përmban emrin e file që keni ngarkuar nga kompjuteri.
        $fileUpload_tmp=$_FILES['fileUpload']['tmp_name'];  //$ _FILES ["file"] ["tmp_name"] përmban kopjen aktuale të përmbajtjes së file tuaj në server(tmp->temporary-> ruajtje perkoshme)
        //Pyetje:a ruhet file ne databas
        if($fileName=='' || $_FILES['fileUpload']['error'] !== UPLOAD_ERR_OK)
        {
            echo"<script>alert('Emri eshte bosh ose fotografia nuk u ngarkua.');</script>";
        }
        else
        {   
          //Per te mos u ruajtur file i njejt dy ose me shume here.
            $insert="SELECT * FROM upload WHERE fileName='$fileName' OR fileUpload='$fileUpload' LIMIT 1";
            $query=mysqli_query($con,$insert);
            
            $exist=mysqli_fetch_assoc($query);// Associative array->Fetch a result row as an associative array->Merr një rresht rezultati si një grup shoqërues
            
            if($exist)
            {
                if($exist['fileUpload']===$fileUpload)
                {
                    echo "<script>alert('This file already exists!')</script>";
                }
            }
            else
            {
                $destination = __DIR__ . '/file/' . $fileUpload;

                // Ruaje ne databaze vetem nese skedari u kopjua me sukses.
                if(move_uploaded_file($fileUpload_tmp, $destination))
                {
                    $uploadFile="INSERT INTO upload(fileName,fileUpload,Description)
                    VALUES('$fileName','$fileUpload','$fileDescription');";

                    if(mysqli_query($con,$uploadFile))
                    {
                        echo "<script>alert('File is Upload');</script>";
                    }
                }
                else
                {
                    echo "<script>alert('Fotografia nuk u ruajt ne folderin file.');</script>";
                }
            }
        }
    } 
?>
