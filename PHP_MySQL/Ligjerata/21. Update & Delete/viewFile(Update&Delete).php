<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <title> Delete &amp; Update File </title>
    </head> 
    <body>
        <table border='1' style='border:2px solid black'>
            <tr>
                <td>File Id</td>
                <td>File Name</td>
                <td>File Upload</td>
                <td>Description</td>
                <td>Delete File</td>
                <td>Update File</td>
            </tr>
            <?php
                $con =mysqli_connect('localhost','root','','login');
                    mysqli_select_db($con,'login');
                $select = "SELECT * FROM upload;";
                $query = mysqli_query($con,$select);
                
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
                <td><button onclick="checkDelete(<?php echo $id?>);" value="Delete">Delete</button></td>
                <td><a href="update.php?update=<?php echo $id; ?>">Update</a></td>
            </tr>
              <?php  } ?>
            
        </table>
        <script language="JavaScript" type="text/javascript">
            function checkDelete(delId){
                if(confirm('A jeni te sigurt?')){
                    document.location.href = 'delete.php?delete='+delId;
                    return true;
                }
            }
        </script>
    </body>
</html>