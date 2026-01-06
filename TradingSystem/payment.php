<!DOCTYPE html>
<?php
include 'header.php';
  session_start();
  include 'config.php';
  if(!$_SESSION['user_id']){
      header('location:login.php');
  }
  $user_id = $_SESSION['user_id'];
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Payment Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />

    <!-- Custom CSS -->
    <style>
      body {
        background-color: #f8f9fa;
      }

      .payment-container {
        max-width: 600px;
        margin: 100px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      .payment-method {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
      }

      .payment-method img {
        max-width: 50px;
        margin-right: 15px;
      }

      .payment-method label {
        cursor: pointer;
      }

      .btn-pay {
        width: 100%;
        padding: 10px;
        font-size: 18px;
        margin-top: 20px;
      }

      .btn-proceed {
        background-color: #5cb418;
        color: #fff;
        border-radius: 30px;
      }
    </style>
  </head>
  <body>
    <div class="container payment-container">
      <h2><a href="buynowpage.php" style="text-decoration:none; color:black;"><i class="fa-solid fa-arrow-left"></i></a></h2>
      <h2 class="text-center mb-4">Choose Payment Method</h2>

      <div class="payment-method">
        <img src="./images/kpay.png" alt="KPay" />
        <label class="custom-control custom-radio">
          <input
            id="payPal"
            name="paymentMethod"
            type="radio"
            class="custom-control-input"
          />
          <span class="custom-control-indicator"></span>
          <span class="custom-control-description">
            <a href="kpayform.php" style="text-decoration: none; color: black"
              >KPay</a
            >
          </span>
        </label>
      </div>

      <div class="payment-method">
        <img src="./images/wave.png" alt="Wave" style="border-radius: 9px" />
        <label class="custom-control custom-radio">
          <input
            id="bitcoin"
            name="paymentMethod"
            type="radio"
            class="custom-control-input"
          />
          <span class="custom-control-indicator"></span>
          <span class="custom-control-description">
            <a href="waveform.php" style="text-decoration: none; color: black"
              >Wave</a
            >
          </span>
        </label>
      </div>

      <div class="payment-method">
        <img src="./images/cashOnDeli.png" alt="Cash On Delivery" />
        <label class="custom-control custom-radio">
          <input
            id="applePay"
            name="paymentMethod"
            type="radio"
            class="custom-control-input"
          />
          <span class="custom-control-indicator"></span>
          <span class="custom-control-description">
            <a
              href="pay.php?id=<?=$user_id?>"
              style="text-decoration: none; color: black"
              >Cash on Delivery</a
            >
          </span>
        </label>
      </div>

      <!--<form method="post">
        <button class="btn btn-proceed btn-pay" name="buy">
          Proceed to Payment
        </button>
      </form>-->
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
