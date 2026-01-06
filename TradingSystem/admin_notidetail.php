<!DOCTYPE html>
<?php
  include ("admin_header.php");
  include 'config.php';
  $cuid = $_GET['cuid'];
  $query = "SELECT * FROM customer where cuid='$cuid';";
  $result=mysqli_query($conn,$query);
  $fetch=mysqli_fetch_assoc($result);
  $items=$fetch['customerBoughtItems'];
  $quantity=$fetch['itemsQuantity'];
  $number = $fetch['number'];
  $status=$fetch['status'];

   if(isset($_GET['cancelid']))
      {
        $cuid=$_GET['cancelid'];
     
      $sql="UPDATE customer SET status='cancel' where cuid='$cuid'";
     
      if(mysqli_query($conn,$sql))
      {
        $query = "SELECT * FROM customer where cuid='$cuid';";
        $result=mysqli_query($conn,$query);
        $fetch=mysqli_fetch_assoc($result);
        $items=$fetch['customerBoughtItems'];
        $quantity=$fetch['itemsQuantity'];
        $number = $fetch['number'];
        $status=$fetch['status'];
      }
    }
    if(isset($_GET['confrimid']))
    {
      $cuid=$_GET['confrimid'];
     
      $sql="UPDATE customer SET status='undelivery' where cuid='$cuid'";
     
      if(mysqli_query($conn,$sql))
      {
        $query = "SELECT * FROM customer where cuid='$cuid';";
        $result=mysqli_query($conn,$query);
        $fetch=mysqli_fetch_assoc($result);
        $items=$fetch['customerBoughtItems'];
        $quantity=$fetch['itemsQuantity'];
        $number = $fetch['number'];
        $status=$fetch['status'];
        $itemsArray= explode(",", $items);
        $qtyArray= explode(",", $quantity);
        foreach($itemsArray as $product){
          $i=0;
          $qty = $qtyArray[$i];
          $que = "SELECT * FROM product WHERE pid='$product';";
          $res = mysqli_query($conn,$que);
          $row = mysqli_fetch_assoc($res);
          $itemName = $row['itemName'];
          $oqty = $row['qty'];
          $oqty -= $qty;

          $que1 = "UPDATE `product` SET `qty`='$oqty' WHERE pid='$product';";
          mysqli_query($conn,$que1);
        }
      }
    }
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>အသေးစိတ်အချက်အလက်များ</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <style>
    body {
      font-family: 'Arial', Times, serif;
      /* You can replace 'Times New Roman' with other classic fonts like 'Arial', 'Georgia', etc. */
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    header {
      background-color: #f0f0f0;
      padding: 10px;
      text-align: center;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
    }

    .top-column {
      width: 100%;
      margin: 5px;
      padding: 0px;
      box-sizing: border-box;
    }

    .bottom-column {
      width: 48%; /* Adjust the width based on your preference */
      margin: 10px;
      padding: 20px;
      border: 1px solid #ddd;
      box-sizing: border-box;
    }

    th{
        font-size:20px;
      }

    th, td {
            border: 0px  #ddd;
            padding: 8px;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:nth-child(odd) {
            background-color: #e6f7ff;
        }
        tr:hover {
            background-color: #ddd;
        }

    table{
        width:100%;
        text-align: center;
    }
    /* Add any additional styling you need */
  </style>
</head>
<body>
  <div class="main--container">
  <header>
    <h1>
      <a href="admin_noti.php" style="text-decoration: none; color: black;float: left;"><i class="fa-solid fa-arrow-left"></i></a>
      အသေးစိတ်အချက်အလက်များ</h1>
    <!-- Add any other content for the header -->
  </header>
  <div class="container">
    <div class="top-column">
    <table>
      <tr>
        <th>ပစ္စည်းများ</th>
        <th>ဈေးနှုန်း</th>
        <th>အရေအတွက်</th>
      </tr>
    <?php 

      $itemsArray= explode(",", $items);
      $qtyArray= explode(",", $quantity);
      foreach($itemsArray as $product){
        $i=0;
        $qty = $qtyArray[$i];
        $que = "SELECT * FROM product WHERE pid='$product';";
        $res = mysqli_query($conn,$que);
        $row = mysqli_fetch_assoc($res);
        $itemName = $row['itemName'];
        $price = $row['price'];
        $quantity=$fetch['itemsQuantity'];
        echo '<tr>
        <td>'.$itemName.'</td>
        <td>'.$price.'</td>
        <td>'.$qty.'</td>
        </tr>';
        $i++;
      }

    ?>
      
    </table>
    </div>

    <div class="bottom-column">
      <!-- Bottom Left Column Content -->
      <h2>ဆက်သွယ်ရန်လိပ်စာ</h2>
      <?php
        echo $fetch['customerName'].'<br>';
        echo $fetch['customerPhone'].'<br>';
        echo $fetch['region'].'&nbsp';
        echo $fetch['township'].'&nbsp';
        echo $fetch['detailAddress'];
      ?>
    </div>

    <div class="bottom-column">
      <?php
      echo "<h2>စုစုပေါင်း</h2><br>";
      echo "<b>လုပ်ငန်းစဉ်အမှတ်:<b>".$number."<br>";
      echo  "<b>".$fetch['day'] ."/". $fetch['month'] ."/". $fetch['year']. "</b><br>";
      echo "Total Spent: <b>" . htmlspecialchars($fetch['price']) . "</b>";
      ?>
    </div>
    <?php if( $status=="uncomfrim")
    {?>
     <a href="?cancelid=<?=$cuid?>"> <button style="height: 50px; padding: 5px;">Cancel</button></a>
      <a href="?confrimid=<?=$cuid?>"> <button style="height: 50px; padding: 5px;">Confrim</button></a>
    <?php } ?>
      
    </div>
  </div>
</body>
</html>
