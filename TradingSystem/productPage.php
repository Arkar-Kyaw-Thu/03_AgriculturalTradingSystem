<!DOCTYPE html>
<?php 
  include 'header.php';
  include 'config.php';
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ထုတ်ကုန်များ</title>
        <!-- swiper-js link -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
        <!-- font awesome cdn link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- custom css file link -->
        <link rel="stylesheet" href="css/productpage.css">
        <!-- bootstrap cdn link CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <!-- bootstrap cdn link JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </head>
<body>
<!-- Home-section-starts!! -->
<section class="home" id="home">
  <div class="content">
    <h2>ဈေးနှုန်းချိုသာတဲ့ ထုတ်ကုန်များကို</h2>
    <h3>ဒီမှာ ဝယ်ယူလိုက်ပါ!</h3>
  </div>
</section>
<!-- Home section ends -->

<!-- Features-section-starts!! -->
<section class="features" id="features">

  <h1 class="heading"> ကျွန်ုပ်တို့ရဲ့ <span>အင်္ဂါရပ်များ</span></h1>

  <div class="box-container">

    <div class="box">
      <img src="images/box1.jpg" alt="">
      <h3>သန့်ရှင်းလတ်ဆတ်မှု့</h3>
      
      <a href="freshorganic.html" class="btn">ဆက်လက်ဖတ်ရှုရန်</a>
    </div>
    <div class="box">
      <img src="images/box2.jpg" alt="">
      <h3>ပို့ဆောင်ခြင်း</h3>
      
      <a href="freedelivery.html" class="btn">ဆက်လက်ဖတ်ရှုရန်</a>
    </div>
    <div class="box">
      <img src="images/box3.jpg" alt="">
      <h3>လွယ်ကူတဲ့ငွေပေးချေမှု့</h3>
      
      <a href="easypayment.html" class="btn">ဆက်လက်ဖတ်ရှုရန်</a>
    </div>

  </div>
  
</section>
<!-- Features-section-end -->

<!-- Product-section-starts!! -->
<section class="products" id="products">

  <h1 class="heading">ကျွန်ုပ်တို့ရဲ့ <span>ထုတ်ကုန်များ</span></h1>

  <div class="swiper product-slider">

    <div class="swiper-wrapper">
<?php
  $que="SELECT * FROM product GROUP BY itemBrand;";
  $res=mysqli_query($conn,$que);
  $i="1";
  while($col=mysqli_fetch_array($res)){
    $item_brand = $col['itemBrand'];
    $query="SELECT * FROM product WHERE itemBrand='$item_brand';";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result);
    $img = $row['img'];
?>
      <div class="swiper-slide box">
        <img src="images/<?=$img?>" alt="" style="width: 60%;">
        <h3><?=$item_brand?></h3>
        <h5><?=$item_brand?> အမျိုးအစားများ</h5>
        <!-- <div class="price">$40.9</div> -->
        <div class="stars">
          <!-- <i class="fas fa-star"></i>
          <i class="fas fa-star"></i> -->
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <a href="#<?=$item_brand?>" class="btna">ဝယ်ယူရန်</a>
      </div>
<?php } ?>
    </div>
  </div>
<!-- Rice -->
<div>
<?php
  $que="SELECT * FROM product GROUP BY itemBrand;";
  $res=mysqli_query($conn,$que);
  $i="1";
  while($col=mysqli_fetch_array($res)){
    $item_brand = $col['itemBrand'];
?>
<section class="products" id="<?=$item_brand?>">

  <h1 class="heading" style="text-align: start;"><span><?= $item_brand ?></span></h1>
  <div class="swiper product-slider">
    <div class="swiper-wrapper">
  <?php
    $query="SELECT * FROM product WHERE itemBrand='$item_brand';";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_array($result)){
  ?>
      <div class="swiper-slide box">
        <img src="images/<?=$row['img']?>" alt="" style="width: 60%;">
        <h3><?=$row['itemName']?></h3>
        <h5><?=$row['itemBrand']?></h5>
        <div class="price"><?=$row['price']?></div>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
          <a href="buy.php?item=<?=$row['pid']?>" class="btn">ဝယ်ယူရန်</a>
          <a href="shoppingCartAdd.php?uid=<?=$item_brand?> &item=<?=$row['pid']?>"  class="btn" style="margin-left: .5rem;">ဈေးခြင်းထဲထည့်ရန်</a>
      </div>
  <?php
    }
  ?>
    </div>
  </div>
</section>
<?php
    $i++;
  }
?>
</div>
<hr>
<!-- Product-section-end -->

<!-- footer start -->
<section class="footer" >
  <div class="box-container">
    <div class="box">
        <h3>ကျွန်ုပ်တို့ အကြောင်း<i class="fa-brands fa-pagelines"></i></h3>
        <p>
          ကျွန်ုပ်တို့သည် စိုက်ပျိုးရေးကို စိတ်အားထက်သန်ပြီး ဒေသတွင်းတွင် အလတ်ဆတ်ဆုံးနှင့် ကျန်းမာရေးနှင့် အညီညွတ်ဆုံး ထုတ်ကုန်များကို ပံ့ပိုးပေးပါသည်။
         ။
        </p>
        <div class="share">
          <a href="#..." class="fab fa-facebook-f"></a>
          <a href="#..." class="fab fa-twitter"></a>
          <a href="#..." class="fab fa-instagram"></a>
          <a href="#..." class="fab fa-linkedin"></a>

        </div>
    </div>

    <div class="box">
      <h3>ဆက်သွယ်ရန်</h3>
      <a class="links"><i class="fa fa-map-marker"></i> 123 Organic Way, Farm</a>
      <a class="links"><i class="fa fa-phone"></i> +95 957-759-987</a>
      <a class="links"><i class="fa fa-envelope"></i> info@organicstore.com</a>
    </div>

    <div class="box">
      <h3>အမြန်လင့်များ</h3>
      <a href="#" class="links"><i class="fas fa-arrow-right"></i>ပင်မစာမျက်နှာ</a>
      <a href="#" class="links"><i class="fas fa-arrow-right"></i>အင်္ဂါရပ်များ</a>
      <a href="#" class="links"><i class="fas fa-arrow-right"></i>ထုတ်ကုန်များ</a>
      <a href="#" class="links"><i class="fas fa-arrow-right"></i>အမျိုးအစားများ</a>
      <a href="#" class="links"><i class="fas fa-arrow-right"></i>သုံးသပ်ချက်</a>
    </div>
    
    <!-- <div class="box">
      <h3>Newsletter</h3>
      <p>Login for latest updates</p>
      <input type="email" placeholder="your email" class="email">
      <input type="submit" value="Login" class="btn">
      <img src="img/payment.png" class="payment-img" alt="">
      <img src="img/payment1.png" class="payment-img" alt="">
    </div> -->
  
  
</section>
<!-- footer end -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script>
      var swiper = new Swiper(".product-slider", {
      loop: true,
      spaceBetween: 20,
      autoplay:{
        delay: 7500,
        disableOnInteraction: false,
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1020: {
          slidesPerView: 3,
        },
      },
    });
      </script>
    </body>
</html>