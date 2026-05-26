<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title> Insert to WEB</title>
    </head>
    <body>
    <div>
        <?php 

        $connect=mysqli_connect("localhost","root","","login");
        mysqli_select_db($connect,"login");

        $select = "SELECT * FROM upload"; 
        /*order by rand() LIMIT 3//by rand()->random //Cka mdel si rezultat me kete query */

        $query = mysqli_query($connect, $select);
        
        //mysqli_fetch array -eshte nje funksion qe perdoret per te marre rreshtat nga databaza dhe per ti ruajtur ato si nje grup.
        while($row=mysqli_fetch_array($query))
        {
            $fileId = $row['id']; //ne db duhet me bo autoincrement dhe Adjust privileges ne kete kolon
            $fileName = $row['fileName'];
            $fileUpload = $row['fileUpload'];
            $description = substr($row['description'],0,100);//me i shfaq sa keraktere deshirojm 0-> start 100->finish
        ?>
        <h2>
            <a href="produkti.php?id=<?php echo $fileId;?>">
                <?php echo $fileName; ?>
            </a>
        </h2>
        <img src="file/<?php echo $fileUpload; ?>" style="width:300px; height:300px">
        <p>
            <?php echo $description; ?>
        </p>
        <?php } ?><!--Pse e mbyllim ketu?-->
        </div>
    </body>
</html>