<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Insertimi i produkteve</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>
    
    <body>
        <main class="page-shell">
        <header class="page-header">
            <div>
                <p class="eyebrow">Produkt i ri</p>
                <h1>Shto produkt</h1>
                <p class="subtitle">Plotëso të dhënat dhe zgjidh fotografinë e produktit.</p>
            </div>
            <a class="button button-secondary" href="viewFile(Update&Delete).php">← Kthehu te lista</a>
        </header>
        <!--enctype="multipart/form-data"-është një lloj kodimi që lejon që filet të dërgohen përmes një metode POST. Thjesht, pa këtë kodim file nuk mund të dërgohen përmes metodes POST. Nëse dëshironi të lejoni një përdorues të ngarkojë një file përmes një forme, duhet ta përdorni këtë enctype.-->
        <form class="form-card" method="post" action="insertimi.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="fileName">Emri i produktit</label>
                <input id="fileName" type="text" name="fileName" placeholder="Shkruaj emrin e produktit">
            </div>
            <div class="form-group">
                <label for="fileUpload">Fotografia</label>
                <input id="fileUpload" type="file" name="fileUpload" accept="image/*">
            </div>
            <div class="form-group">
                <label for="description">Përshkrimi</label>
                <textarea id="description" name="description" placeholder="Shkruaj një përshkrim..."></textarea>
            </div>
            <div class="form-actions">
                <input type="submit" name="upload" value="Ruaje produktin">
                <input type="reset" name="cancel" value="Pastro fushat">
            </div>
        </form>
        </main>
    </body>
</html>
<?php
    $con=mysqli_connect("localhost","kebir","Kebir123!","login");
        mysqli_select_db($con,'login');
    
    if(isset($_POST['upload']))
    {
        $fileName=$_POST['fileName'];
        $fileDescription=$_POST['description'];
        $fileUpload=$_FILES['fileUpload']['name'];
        $fileUpload_tmp=$_FILES['fileUpload']['tmp_name'];
        //$ _FILES ["file"] ["tmp_name"] përmban kopjen aktuale të përmbajtjes së file tuaj në server ndërsa. $ _FILES ["file"] ["name"] përmban emrin e file që keni ngarkuar nga kompjuteri.
        
        if($fileName=='')
        {
            echo"<script>alert('Any input is Empty');</script>";
        }
        else
        {   
          //Per te mos u ruajtur file i njejt dy ose me shume here.
          $insert="SELECT * FROM upload WHERE fileName='$fileName' OR fileUpload='$fileUpload' LIMIT 1";
            $query=mysqli_query($con,$insert);
            
            $exist=mysqli_fetch_assoc($query);
            
            if($exist)
            {
                if($exist['fileUpload']===$fileUpload)
                {
                    echo "<script>alert('This file already exists!')</script>";
                }
            }
            else
            {
           move_uploaded_file($fileUpload_tmp,"file/$fileUpload");
            
            $uploadFile="INSERT INTO upload(fileName,fileUpload,Description)
        VALUES('$fileName','$fileUpload','$fileDescription');";
            
                if(mysqli_query($con,$uploadFile))      
                {
                    echo "<script>alert('File is Upload');</script>";
                }
            }
        }
    } 
?>
