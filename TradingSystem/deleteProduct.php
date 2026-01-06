<?php 
	$conn=mysqli_connect("localhost","root","","tradingsystem")or die("cann't connect to database");
    	$item=$_GET['item'];
    	$query="DELETE FROM `product` WHERE pid='$item';";
    	mysqli_query($conn,$query);
    	if($query){
    		header("location:adminProduct.php");
    	}
?>