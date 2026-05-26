<?php
    $connect = mysqli_connect('localhost','root','','login');
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

        if(empty($fileName1) || empty($fileDescription1))
        {
            echo "<script>alert('Ndonjera prej fushave eshte e zbrazet')</script>"; 
            echo "<script>window.open('$update','_self');</script>";
            exit();
        }
        else 
        {   
            // Get the current file from database (in case no new file is uploaded)
            $selectCurrent = "SELECT fileUpload FROM upload WHERE id='$fileId'";
            $queryCurrent = mysqli_query($connect, $selectCurrent);
            $rowCurrent = mysqli_fetch_array($queryCurrent);
            $currentFile = $rowCurrent['fileUpload'];
            
            // If a new file is uploaded
            if(!empty($fileUpload1) && $fileUpload1_tmp != "")
            {
                // Delete old file if exists
                if(file_exists("file/$currentFile"))
                {
                    unlink("file/$currentFile");
                }
                
                // Upload new file to correct location
                move_uploaded_file($fileUpload1_tmp,"file/$fileUpload1");
                $fileToSave = $fileUpload1;
            }
            else
            {
                // Keep the old file if no new file is uploaded
                $fileToSave = $currentFile;
            }
                               
            $update_query="UPDATE upload SET
                fileName = '$fileName1',
                fileUpload = '$fileToSave',
                description = '$fileDescription1'
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