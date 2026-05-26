<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title> Insertimi i produkteve</title>
    </head>
    
    <body>
        <!--enctype="multipart/form-data"-është një lloj kodimi që lejon që filet të dërgohen përmes një metode POST. Thjesht, pa këtë kodim file nuk mund të dërgohen përmes metodes POST. Nëse dëshironi të lejoni një përdorues të ngarkojë një file përmes një forme, duhet ta përdorni këtë enctype->eshte per sigurimin.
        Me ndihmën e $ _FILES global, ne mund të marrim emrin e skedarit, llojin e skedarit, madhësinë e skedarit, emrin e skedarit temp dhe gabimet e shoqëruara me skedarin.
        -->
        <form method="post" action="insertimi.php" enctype="multipart/form-data">
            File Name: <input type="text" name="fileName"><br><br>
            File Upload:<input type="file" name="fileUpload"><br><br>
            File Description: <textarea name='content' cols='30' rows='15'></textarea><br><br>
            <input type="submit" name="upload" value="Insert">
            <input type="reset" name="cancel" value="Cancel">
        </form>
        <br>
        <a href='insert.php'>Home</a>
        <a href='viewInsert.php'>View Products</a>
    </body>
</html>
<?php
    $con=mysqli_connect('localhost','root','','login');
        mysqli_select_db($con,'login');
    
    if(isset($_POST['upload']))
    {
        $fileName=$_POST['fileName'];
        $fileDescription=$_POST['content'];
        $fileUpload=$_FILES['fileUpload']['name'];//. $ _FILES ["file"] ["name"] përmban emrin e file që keni ngarkuar nga kompjuteri. 
        $fileUpload_tmp=$_FILES['fileUpload']['tmp_name'];  //$ _FILES ["file"] ["tmp_name"] përmban kopjen aktuale të përmbajtjes së file tuaj në server(tmp->temporary-> ruajtje perkoshme)
        //Pyetje:a ruhet file ne databas
        if($fileName=='')
        {
            echo"<script>alert('Any input is Empty');</script>";
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
           move_uploaded_file($fileUpload_tmp,"file/$fileUpload");//move_uploaded_file->dergimi ne folder
            
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