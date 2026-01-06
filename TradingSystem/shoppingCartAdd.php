<?php
  session_start();
  include 'config.php';
  if(!$_SESSION['user_id']){
      header('location:login.php');
  }
  else{
    $id=$_GET['uid'];
    $item=$_GET['item'];

    $myquery="SELECT * FROM product  WHERE pid='$item'";
    $myres=mysqli_query($conn,$myquery);
    $real=mysqli_fetch_array($myres);
    $price=$real['price'];

    $query2="SELECT * FROM shoppingcart WHERE pid='$item';";
    $result2=mysqli_query($conn,$query2);
    $row=mysqli_fetch_array($result2);
    if($row){
    }
    else{
      $user_id = $_SESSION['user_id'];
      $query="INSERT INTO `shoppingcart`(`uid`, `pid` , `Price`) VALUES ('$user_id','$item','$price');";
      mysqli_query($conn,$query);
      header("Location: Productpage.php#$id");
    }
  }
  
?>