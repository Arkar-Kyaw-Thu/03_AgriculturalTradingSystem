<!DOCTYPE html>
<?php
session_start();
  include 'config.php';
  if(!$_SESSION['user_id']){
      header('location:login.php');
  }
  $user_id = $_SESSION['user_id'];
  if(isset($_POST['buy'])){
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
    $number = $_POST['number']."(Kpay)";
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

    $que = "INSERT INTO `customer`(`uid`, `customerName`, `customerPhone`, `customerEmail`, `region`, `township`, `detailAddress`, `customerBoughtItems`, `itemsQuantity`, `price`, `day`, `month`, `year`, `number`, `status`) VALUES ('$user_id','$fullname','$phone','$email','$region','$country','$street','$pid','$qty','$totalprice','$day','$month','$year','$number','uncomfrim')";
    $res = mysqli_query($conn,$que);

    if ($res){
      header('location:productPage.php');
    }
  }
  $itemName = "";
  $totalprice = 0;
  $query = "SELECT * FROM shoppingcart WHERE uid='$user_id' AND qty>=1;";
  $result = mysqli_query($conn,$query);
  while ($row=mysqli_fetch_array($result)){
    $pid = $row['pid'];
    $totalprice += (int)$row['Totalprice'];
    $que = "SELECT * FROM product WHERE pid='$pid';";
    $res = mysqli_query($conn,$que);
    $col = mysqli_fetch_array($res);
    if ($itemName) {
      $itemName .= ','. $col['itemName'];
    }
    else{
      $itemName .= $col['itemName'];
    } 
  }
  $totalprice += 3000;
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- bootstrap cdn link CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
      <!-- font awesome cdn link -->
      <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>KPay Purchase Form</title>
    <style>
      body {
        font-family: poppins;
      }
      .form-container {
        max-width: 500px;
        margin: 0 auto;
        padding: 40px;
        /* border: 1px solid #ccc; */
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-left: 5%;
      }

      input[type="text"],
      input[type="password"] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 5px;
      }

      .otp-button {
        background-color: #5cb418;
        color: #fff;
        width: max-content;
        height: max-content;
      }

      .hover-none:hover {
        background-color: #5cb418;
        color: #fff;
      }

      .wave-card-container {
        max-width: 400px;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      .form-group {
        margin-bottom: 20px;
      }

      .btn-pay {
        width: 100%;
        padding: 10px;
        font-size: 15px;
        margin-top: 20px;
      }

      .btn-paynow {
        background-color: #5cb418;
        color: #fff;
        border-radius: 5px;
        width: fit-content;
      }
      .btn-paynow:hover {
        background-color: #5cb418;
        color: #fff;
      }
      .secondCard {
        color: #5cb418;
      }
    </style>
  </head>

  <body class="p-1 row">
    <div class="form-container mt-5">
      <h2><a href="payment.php" style="text-decoration:none; color:black;"><i class="fa-solid fa-arrow-left"></i></a></h2>
      <h3 class="text-center mb-3">Pay with KPay </h3>
      <form action="" method="post">
        <div class="row mt-3">
          <div class="col-sm-8">
            <label for="amount">Merchant</label>
          </div>
          <div class="col">
            <label for="price">Organicstore</label>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-sm-8">
            <label for="amount">Reference ID</label>
          </div>
          <div class="col">
            <label for="price">10225 3333</label>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-sm-8">
            <label for="item_name">Item Name</label>
          </div>
          <div class="col">
            <label for="item_page"><?=$itemName?></label>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-sm-8">
            <label for="amount">Amount</label>
          </div>
          <div class="col">
            <div for="price"><?=$totalprice?> Ks</div>
          </div>
        </div>

        <div class="row border-bottom border-top mt-3 pt-3 pb-3">
          <div class="col-sm-8">
            <label for="total">Total</label>
          </div>
          <div class="col">
            <label><?=$totalprice?> Ks</label>
          </div>
        </div>

        <center>
        <label for="wave_id" class="mt-3"
          >ငွေလွှဲရန် ဖုန်းနံပါတ် 09774284135</label
        >
        <label for="wave_id" class="mt-3"
          >ငွေလွှဲပီးလျှင် လုပ်ဆောင်ချက်နံပါတ် ရိုက်ထည့်ပါ။</label
        >
        </center>
        <!--<input
          type="text"
          id="phone_number"
          class="mt-3 p-3"
          name="phone_number"
          placeholder="Wave Account Holder Name"
          required
        />-->
        <div class="row">
          <div class="col">
            <input
              type="text"
              class="form-control p-3"
              placeholder="လုပ်ဆောင်ချက်နံပါတ်"
              name="number"
              required
            />
          </div>
          <div class="col-auto">    
            <button class="btn otp-button hover-none" type="submit" name="buy" style="margin-top: 15%;width: 100%;height: 80%">
              B u y
            </button>
          </div>
        </div>
      </form>
      <p class="mt-3"></p>
    </div>


<div style="
display: flex;
justify-content: center;
align-items: center;
min-height: 30vh;" class="col">
  <div class="wave-card-container" style="  position: relative;
  width: 450px;
  border:1px solid #5cb418;
  height: 250px;
  background: #F5FBF3;
  border-radius: 20px;">
  <div class="p-1 secondCard">
    <label>Go further with KPay</label>
      <a href="https://play.google.com/store/apps/details?id=com.kbzbank.kpaycustomer&hl=en&gl=US" style="text-decoration: none; color: #fff">
        <i class="fa-brands fa-google-play" style="color: #5cb418; padding-left: 8%;"></i>
        <span style="color: #5cb418;">Pay Now</span>
    </a>
  </div>
    <div class="imgBx" style="position: absolute;
    right: 51px;
    top: 60px;
    width: 450px;
    height: 250px;
    background: #5cb418;
    border-radius: 20px;
    color: #fff;">

      <div class="container p-3">      
        <div>
          <form>
            <div class="form-group mt-3 p-2">
              <label>Note: Note: Please ensure that</label>
            </div>
            <div class="form-group">
              <label>1. Your KBZ Pay app is downloaded.</label>       
            </div>
            <div class="form-row">
              <div class="form-group">
                <label>2. You are logged in on KBZ Pay app.</label>
            </div>
        </div>
        </div> 
    </div>
  </div>
</div>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
