<!DOCTYPE html>
<?php 
    session_start();
	$connect = mysqli_connect("localhost", "root", "", "tradingsystem");
    $res=mysqli_query($connect,"SELECT * FROM customer where status='undelivery';");
    $undeli = mysqli_num_rows($res);
    $res1=mysqli_query($connect,"SELECT * FROM customer where status='uncomfrim';");
    $noti = mysqli_num_rows($res1);
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	<link rel="stylesheet" href="css/admin.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<style type="text/css">
.noti {
  position: relative;
  display: inline-block;
  border-radius: 2px;
}
.noti .badge {
  font-size: 13px;
  position: absolute;
  top: -10px;
  right: 10px;
  padding: 5px 8px;
  border-radius: 100%;
  background: red;
  color: white;
}
</style>
</head>
<body class="body">
	<section class="header" style="background: transparent;">
        <div class="logo">
            <i class="ri-menu-line menu"></i>
            <h2><span>O_T</span>rade.</h2>
        </div>
        <div class="header--items">
            <div class="dark--theme--btn">
                <i class="ri-moon-line moon"></i>
                <i class="ri-sun-line sun"></i>
            </div>
            <a href="admin_chat.php"><i class="fa-brands fa-rocketchat"></i></a>
            <a href="admin_noti.php" class="noti"><i class="ri-notification-2-line"></i><span class="badge"><?=$noti?></span></a>
            <div class="profile">
                <img src="assets/images/business-global-economy_24877-41082.avif" alt="">
            </div>
        </div>
    </section>
    <section class="main">
        <div class="sidebar">
            <ul class="sidebar--items">
                <li>
                    <a href="index1.php" class="active">
                        <span class="icon"><i class="ri-bar-chart-line"></i></span>
                        <div class="sidebar--item">Overview</div>
                    </a>
                </li>
                <li>
                    <a href="staff.php">
                        <span class="icon"><i class="ri-user-line"></i></span>
                        <div class="sidebar--item">Staff</div>
                    </a>
                </li>
                <li>
                    <a href="adminProduct.php">
                        <span class="icon"><i class="ri-handbag-line"></i></span>
                        <div class="sidebar--item">Product</div>
                    </a>
                </li>
                <li>
                    <a href="admin_order.php">
                        <span class="icon"><i class="ri-handbag-line"></i></span>
                        <div class="sidebar--item">Restock Product</div>
                    </a>
                </li>
                <li>
                    <a href="adminKnowledgepage.php">
                        <span class="icon"><i class="ri-booklet-line"></i></span>
                        <div class="sidebar--item">Knowledge</div>
                    </a>
                </li>
                <li>
                    <a href="admin_customer.php">
                        <span class="icon"><i class="ri-user-line"></i></span>
                        <div class="sidebar--item">Customers<span style="background: red;color: white;margin-left: 20%;border: 1px solid transparent;border-radius: 50%;padding: 5px;"><?=$undeli?></span></div>
                    </a>
                </li>
                <li>
                    <!--<a href="#">
                        <span class="icon"><i class="ri-shopping-cart-2-line"></i></span>
                        <div class="sidebar--item">Checkout</div>
                    </a>-->
                </li>
               
            </ul>
            <ul class="sidebar--bottom--items">
                
                <li>
                    <a href="admin_logout.php">
                        <span class="icon"><i class="ri-logout-box-r-line"></i></span>
                        <div class="sidebar--item">Logout</div>
                    </a>
                </li>
            </ul>
        </div>
        <script src="css/main.js"></script>
</body>
</html>