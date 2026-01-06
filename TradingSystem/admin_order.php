<!DOCTYPE html>
<?php include ("admin_header.php"); ?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <title></title>
  <style type="text/css">
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}
.product button:hover{
  background-color: grey;
}
tr:nth-child(odd){background-color: #fff}
tr:nth-child(even){background-color: #3bc59a}
  </style>
</head>
<body>
  <div class="main--container">
    <h1 style="margin-bottom: 30px;">Restock Product </h1>
  <div style="overflow-x:auto;">
    <table>
<?php
  $conn=mysqli_connect("localhost","root","","tradingsystem")or die("cann't connect to database");
  $query="SELECT * FROM product where qty<50 order by itemBrand asc;";
  $result=mysqli_query($conn,$query);
  $num=mysqli_num_rows($result);
  if($num>0){
?>
  <tr style="height: 50px; padding: 10px;">
        <th>No</th>
        <th>Img</th>
        <th>Item Name</th>
        <th>Item Brand</th>
        <th>Item Qty</th>
        <th>Item Price</th>
        <th style="text-align: center;"><a href="addProduct.php" style="border: 1px solid black; padding: 5px;border-radius: 50%;"><i class="fa-solid fa-plus"></i></a></th>
      </tr>
<?php
  for($i=1;$i<=$num;$i++){
    $row=mysqli_fetch_array($result);
?>
      <tr>
        <td><?=$i?></td>
        <td><img src="images/<?=$row['img']?>" width="60px" height="60px" class="style: width:50px;height:50px;"></td>
        <td><?=$row['itemName']?></td>
        <td><?=$row['itemBrand']?></td>
        <td><?=$row['qty']?></td>
        <td><?=$row['price']?></td>
        <td style="text-align: center;">
          <a href="updateProduct.php? item=<?=$row['pid']?>" class="product"><button style="padding:10px;border-radius: 10px;margin-right: 5%;">Update</button></a>
          <a href="deleteProduct.php? item=<?=$row['pid']?>" class="product"><button style="padding:10px;border-radius: 10px;">Delete</button></a>
        </td>
      </tr>
<?php
  }
  }else{
    echo "<h1 align='center' style='margin-top:10%;'>ပစ္စည်း ထပ်ထည့်ရန်မလိုအပ်သေးပါ</h1>";
  }
?>
    </table>
  </div>
</div>
</body>
</html>