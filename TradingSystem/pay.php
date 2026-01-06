<?php
  include 'config.php';
    $user_id = $_GET['id'];
    $fullname = $_COOKIE['fullname'];
    $phone = $_COOKIE['phone'];
    $region = "Bago";
    $country = $_COOKIE['country'];
    $street = $_COOKIE['street'];
    $email  = $_COOKIE['email'];
    $pid = "";
    $qty = "";
    $totalprice = 0;
    $day = date('d');
    $month = date('n');
    $year = date('Y');

    $query = "SELECT * FROM shoppingcart WHERE uid='$user_id' AND qty>=1;";
    $result = mysqli_query($conn,$query);
    while ($row=mysqli_fetch_array($result)){
      $cid = $row['cid'];
      if ($pid) {
        $pid .= ','.$row['pid'];
      }
      else{
        $pid .= $row['pid'];
      }

      if ($qty) {
        $qty .= ','.$row['Qty'];
      }
      else{
        $qty .= $row['Qty'];
      }

      $totalprice += (int)$row['Totalprice'];

      $query1 = "DELETE FROM shoppingcart WHERE cid='$cid' AND uid='$user_id';";
      mysqli_query($conn,$query1);
      
    }
    $totalprice += 3000;

    $que = "INSERT INTO `customer`(`uid`, `customerName`, `customerPhone`, `customerEmail`, `region`, `township`, `detailAddress`, `customerBoughtItems`, `itemsQuantity`, `price`, `day`, `month`, `year`, `number`, `status`) VALUES ('$user_id','$fullname','$phone','$email','$region','$country','$street','$pid','$qty','$totalprice','$day','$month','$year','cash','uncomfrim')";
    $res = mysqli_query($conn,$que);

    if ($res){
      header('location:productPage.php');
    }
  
?>