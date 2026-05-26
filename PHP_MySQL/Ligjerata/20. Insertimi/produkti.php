<html>
    <head>
    </head>
    <body>
        <div id="main_content">
        <?php
            $con=mysqli_connect("localhost","root","","login");
            mysqli_select_db($con,"login");

            if(isset($_GET['id'])){

                $page_id = $_GET['id'];
	            $query = "select * from upload where id='$page_id'";
                $run = mysqli_query($con, $query);
                //derisa te kryhet kushti do te vazhdojme me ekzekutimin e kodit
                while($row=mysqli_fetch_array($run)){
	
	               $id = $row['id'];
	               $fileName = $row['fileName'];
	               $fileUpload = $row['fileUpload'];
	               $description = $row['description'];
        ?>
            <h2>
                <a href="produkti.php?id=<?php echo $id; ?>">
                    <?php echo $fileName; ?>
                </a>
            </h2>
            <center><img src="file/<?php echo $fileUpload; ?>" width="500" height="300" /></center>
            <p align="center"><b><?php echo $fileName; ?></b></p>
            <p align="justify"><?php echo $description; ?></p>
            <?php 
                                                    } 
            
                                    }
            ?>
        </div>
    </body>
</html>