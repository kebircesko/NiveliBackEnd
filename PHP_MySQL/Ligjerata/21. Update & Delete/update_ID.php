<?php
    $connect = mysqli_connect("localhost","kebir","Kebir123!","login");
        mysqli_select_db($connect,'login');
        error_reporting();//Sets which PHP errors are reported
    if(isset($_POST['update']))
    {
        $fileId = $_POST['id'];
        $fileName1 = $_POST['fileName'];
        $fileDescription1 =$_POST['description'];
        $fileUpload1 = $_FILES['fileUpload'] ['name'];
        $fileUpload1_tmp=$_FILES['fileUpload']['tmp_name'];   
        $update = 'update.php?update='.$fileId;

        if(empty($fileName1) || empty($fileDescription1) || empty($fileUpload1) )
        {
            echo "<script>alert('Ndonjera prej fushave eshte e zbrazet')</script>"; 
            echo "<script>window.open('$update','_self');</script>";
            exit();
        }
        else 
        {   
            move_uploaded_file($fileUpload1_tmp, __DIR__ . "/file/" . basename($fileUpload1));
            //move_uloaded_file($fileUpload1_tmp,"../20. Insertimi/file/$fileUpload1"); kjo metod nuk po funksionon, sepse nuk po e gjen folderin file, sepse ndodhet ne nje folder tjeter.me sakt eshte me .DIR              
            $update_query="UPDATE upload SET
                fileName = '$fileName1',
                fileUpload = '$fileUpload1',
                Description = '$fileDescription1'

                WHERE id = '$fileId'";
        
            if(mysqli_query($connect, $update_query))
            {
                 echo "<script>alert('File is updated!')</script>";
                 echo "<script>window.open('viewFile(Update&Delete).php','_self');</script>";
                 //header("location: viewFile(Update&Delete).php"); //nuk po funksionon alert !.
            }
       }
    }

?>  
