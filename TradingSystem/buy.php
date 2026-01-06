<?php
  session_start();
  include 'config.php';
  if(!$_SESSION['user_id']){
      header('location:login.php');
  }
  else{
    $item=$_GET['item'];
    $user_id = $_SESSION['user_id'];
    $myquery="SELECT * FROM product  WHERE pid='$item'";
    $myres=mysqli_query($conn,$myquery);
    $real=mysqli_fetch_array($myres);
    $price=$real['price'];

    $query2="SELECT * FROM shoppingcart WHERE uid='$user_id' AND pid='$item';";
    $result2=mysqli_query($conn,$query2);
    $row=mysqli_fetch_array($result2);
    if($row){
      $cid = $row['cid'];
      $qty = $row['Qty'];
      $qty++;
      $tprice = $row['Totalprice'];
      $tprice += $price;
      $que= "UPDATE `shoppingcart` SET `Qty`='$qty',`Totalprice`='$tprice' WHERE cid = '$cid';";
      mysqli_query($conn,$que);
    }else{
      $qty = 1;
      $query="INSERT INTO `shoppingcart`(`uid`, `pid` , `Qty` , `Price` ,`Totalprice`) VALUES ('$user_id','$item','$qty','$price','$price');";
      mysqli_query($conn,$query);
    }
    header("Location: buynowpage.php");
  }
  
?>