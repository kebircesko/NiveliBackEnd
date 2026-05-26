<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title> Update </title>
    </head>
    
    <body>
    <?php
        $connect=mysqli_connect("localhost","root","","login");
            mysqli_select_db($connect,"login");

        if(isset($_GET['update'])){
            $update_id = $_GET['update'];
            $select = "SELECT * FROM upload WHERE id='$update_id'";
            $query = mysqli_query($connect, $select);

            while($row=mysqli_fetch_array($query)){
	
    ?>
    <form method='post' action="update_ID.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
        File Name:<input type="text" name="fileName" value="<?php echo $row['fileName'];?>">
        <br><br>
        <strong>Current Photo:</strong>
        <br><img src="file/<?php echo $row['fileUpload'];?>" width="200" height="200">
        <br><br>
        <strong>Upload New Photo (Optional):</strong><input type="file" name="fileUpload" placeholder="Leave empty to keep current photo">
        <br><small style="color:gray;">Leave empty to keep current photo</small>
        <br><br>
        File Description:<textarea name="description" cols="30" rows="20"><?php echo $row['description'];?>
        </textarea>
        <br><br>
        <input type="submit" name="update" value="Update">
    
        <?php } }?>  
    </form>
    </body>
</html>