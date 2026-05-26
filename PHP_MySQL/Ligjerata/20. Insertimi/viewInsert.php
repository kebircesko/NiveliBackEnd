<!DOCTYPE html>
<html>
    <head>
        <title> View Insert </title>
    </head>
    <body>
        <center>
        <table border='1' style='border:2px solid black;border-collapse: collapse;margin-top: 50px'>
            <tr>
                <td>File Id</td>
                <td>File Name</td>
                <td>File Upload</td>
                <td>Description</td>
            </tr>
            <?php
                $con =mysqli_connect('localhost','root','','login');
                    mysqli_select_db($con,'login');
                
                $select = "SELECT * FROM upload;";  
                $query = mysqli_query($con, $select);
                
                while($row = mysqli_fetch_array($query))
                {
                    $id = $row['id'];
                    $fileName = $row['fileName'];
                    $fileUpload = $row['fileUpload'];
                    $description = $row['description'];
            ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $fileName; ?></td>
                <td><img src="file/<?php echo $fileUpload; ?>" width="80" height="60"></td>
                <td><?php echo $description; ?></td>
            </tr>
              <?php  } ?>
            
        </table>
        </center>
    </body>
</html>