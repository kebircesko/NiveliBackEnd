<?php
$connect=mysqli_connect("localhost","kebir","Kebir123!","login");
mysqli_select_db($connect,"login");

if(isset($_GET['delete'])){
	
	$delete_id = $_GET['delete'];
	
	$delete_query = "DELETE FROM upload WHERE id='$delete_id' ";
	
	if(mysqli_query($connect, $delete_query)){
	
		echo "<script>alert('Produkti eshte Fshire')</script>";
	        
	    echo "<script>window.open('viewFile(Update&Delete).php','_self');</script>";

	}
}
?>