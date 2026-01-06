<!DOCTYPE html>
<?php
    include 'header.php';
    include 'config.php';
?>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
   <title> Online Trading Website </title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
   <style>
        /* Googlefont Poppins CDN Link */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Noto Sans Myanmar", sans-serif;
    }
    body{
    min-height: 100vh;
    }
    
    /*main's css*/
    main {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    margin-left: 50px;
    margin-top: 65px;
    height: 80vh;
  }

  .content-left {
    width: 100%;
    max-width: 600px;
    text-align: center;
    margin-bottom: 20px;
  }

  main h1 {
    font-size: 36px;
    display: contents;
  }

  main p {
    font-size: 16px;
    line-height: 1.5;
    margin: 20px 0;
    color: #555;
  }

  .btn1 {
    padding: 15px 30px;
    background: #70e000;
    color: #fff;
    outline: none;
    border: none;
    font-weight: 700;
    text-transform: uppercase;
    border-radius: 50px;
    cursor: pointer;
    transition: background-color 0.3s, box-shadow 0.3s;
  }

  .btn1:hover {
    background: #a5ee5b;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
  }

  .content-right {
    width: 100%;
    text-align: center;
  }

  .ele-img {
    max-width: 100%;
    height: auto;
    margin-top: 50px;
  }

  @media screen and (min-width: 768px) {
    .content-left {
      width: 50%;
      text-align: left;
      margin-bottom: 0;
      padding-right: 20px;
    }

    .content-right {
      width: 50%;
      text-align: right;
    }

    main h1 {
      font-size: 54px;
    }
  }

    
/* adviser card */

.adviser{
  height: 100vh;
}

.adv{
  text-align: center;
  margin-top: 50px;
  font-size: 50px;
}

.card-list {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    max-width: 1000px;
    margin: 150px auto;
    padding: 20px;
    gap: 20px;
    margin-top: 30px;
}
.card-list .card-item {
    background: #fff;
    padding: 26px;
    border-radius: 8px;
    box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.04);
    list-style: none;
    cursor: pointer;
    text-decoration: none;
    border: 2px solid transparent;
    transition: border 0.5s ease;
}
.card-list .card-item:hover {
    border: 2px solid #000;
}
.card-list .card-item img {
    width: 100%;
    aspect-ratio: 16/9;
    border-radius: 8px;
    object-fit: cover;
}
.card-list span {
    /* display: inline-block; */
    background: #F7DFF5;
    margin-top: 32px;
    padding: 8px 15px;
    font-size: 0.75rem;
    border-radius: 50px;
    font-weight: 600;
    text-align: center;
}

.card-list .insect {
    background-color: #d6f8d6; 
    color: #205c20;
}
.card-item h3 {
    color: #000;
    font-size: 1.438rem;
    margin-top: 28px;
    font-weight: 600;
}
/* .card-item .arrow {
    display: flex;
    align-items: center;
    justify-content: center;
    transform: rotate(-35deg);
    height: 40px;
    width: 40px;
    color: #000;
    border: 1px solid #000;
    border-radius: 50%;
    margin-top: 40px;
    transition: 0.2s ease;
}
.card-list .card-item:hover .arrow  {
    background: #000;
    color: #fff; 
} */
@media (max-width: 1200px) {
    .card-list .card-item {
        padding: 15px;
    }
}
@media screen and (max-width: 980px) {
    .card-list {
        margin: 0 auto;
    }
}

/* price plan */

.pricing-container {
      text-align: center;
      margin-bottom: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      height: 100vh;
    }

    .pricing-title {
      font-size: 4em;
      color: #333;
      margin: 30px;
    }

    .pricing-table {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      max-width: 100%;
      gap: 20px;
    }

    .plan {
      text-align: center;
      background-color: #fff;
      border: 1px solid #ddd;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease-in-out;
      flex: 1;
      margin: 10px;
      max-width: 300px;
    }

    .plan:hover {
      transform: scale(1.05);
    }

    .price {
      font-size: 1.5em;
      color: #333;
      margin: 10px 0;
    }

    ul {
      list-style: none;
      padding: 0;
    }

    li {
      margin: 5px 0;
    }

    button {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 1em;
      transition: background-color 0.3s ease-in-out;
    }

    button:hover {
      background-color: #45a049;
    }

    @media (max-width: 600px) {
      .pricing-title {
        font-size: 1.5em;
      }

      .pricing-table {
        flex-direction: column;
        align-items: center;
      }

      .plan {
        max-width: none;
      }
    }
/* footer */
 .footer-clean {
      height: 30px;
      padding:50px 0;
      background-color:#fff;
      color:#4b4c4d;
    }

    .footer-clean h3 {
      margin-top:0;
      margin-bottom:12px;
      font-weight:bold;
      font-size:16px;
    }

    .footer-clean ul {
      padding:0;
      list-style:none;
      line-height:1.6;
      font-size:14px;
      margin-bottom:0;
    }

    .footer-clean ul a {
      color:inherit;
      text-decoration:none;
      opacity:0.8;
    }

    .footer-clean ul a:hover {
      opacity:1;
    }

    .footer-clean .item.social {
      text-align:right;
    }

    @media (max-width:767px) {
      .footer-clean .item {
        text-align:center;
        padding-bottom:20px;
      }
    }

    @media (max-width: 768px) {
      .footer-clean .item.social {
        text-align:center;
      }
    }

    .footer-clean .item.social > a {
      font-size:24px;
      width:40px;
      height:40px;
      line-height:40px;
      display:inline-block;
      text-align:center;
      border-radius:50%;
      border:1px solid #ccc;
      margin-left:10px;
      margin-top:22px;
      color:inherit;
      opacity:0.75;

    }

    .footer-clean .item.social > a:hover {
      opacity:0.9;
    }

    @media (max-width:991px) {
      .footer-clean .item.social > a {
        margin-top:40px;
      }
    }

    @media (max-width:767px) {
      .footer-clean .item.social > a {
        margin-top:10px;
      }
    }

    .footer-clean .copyright {
      margin-top:14px;
      margin-bottom:0;
      font-size:13px;
      opacity:0.6;
    } 

  
   </style>
<body>
  <main>
    <div class="content-left">
      <h1>ကျွန်ုပ်တို့၏ ရည်ရွယ်ချက်</h1>
      <p>စိုက်ပျိုးရေးထွက်ကုန်များကို အခြားသူများနှင့် ရောင်းဝယ်ဖောက်ကားရာတွင် ပွင့်လင်းမြင်သာမှု၊ တရားမျှတမှုနှင့် ရေရှည်တည်တံ့ခိုင်မြဲမှုတို့ကို မြှင့်တင်ရန် ရည်ရွယ်ပြီး ဆန်းသစ်သောနည်းပညာများနှင့် ခိုင်မာသောစျေးကွက်ယန္တရားများမှတစ်ဆင့် လယ်ယာထွက်ကုန်များ ဖလှယ်ရာတွင် လွယ်ကူချောမွေ့စေရန် ရည်ရွယ်ပါသည်။</p>
      
    </div>
    <div class="content-right">
      <img src="images/main.jpg" alt="" class="ele-img">
    </div>
  </main>
  

  <!-- Adviser card -->
  <div class="adviser">
  <p class="adv">ကျွန်ုပ်တို့၏ အကြံပေးချက်များ</p>
  <div class="card-list">
    <?php 
      $query = mysqli_query($conn,"SELECT * from product;");
      $product = mysqli_fetch_array($query);
      $product_img = $product['img'];
      $product_name = $product['itemName'];

      $que = mysqli_query($conn,"SELECT * from product WHERE itemBrand='awba';");
      $awba = mysqli_fetch_array($que);
      $product_img1 = $awba['img'];
      $product_name1 = $awba['itemName'];

      $sql=mysqli_query($conn,"SELECT * from knowledge;");
      $row=mysqli_fetch_array($sql);
      $photo=$row['knowledgePhoto'];
      $title=$row['knowledgeTitle'];

    
    ?>
    <a href="productpage.php" class="card-item">
        <img src="images/<?=$product_img?>" alt="Card Image">
        
        <h3><?=$product_name?></h3>
        <span >Seemore...</span>
        <!-- <div class="arrow">
            <i class="fas fa-arrow-right card-icon"></i>
        </div> -->
    </a>
    <a href="productpage.php" class="card-item">
        <img src="images/<?=$product_img1?>" alt="Card Image">
        
        <h3><?=$product_name1?></h3>
        <span >Seemore...</span>
        <!-- <div class="arrow">
            <i class="fas fa-arrow-right card-icon"></i>
        </div> -->
    </a>
    <a href="knowledgePage.php" class="card-item">
        <img src="images/<?=$photo?>" alt="Card Image">
        
        <h3><?=$title?></h3>
        <span >Seemore...</span>
        <!-- <div class="arrow">
            <i class="fas fa-arrow-right card-icon"></i>
        </div> -->
    </a>
   
</div>
</div>

<!-- Adviser card end -->

<!-- Price plan -->
<!--<div class="pricing-container">
  <h1 class="pricing-title">Pricing Table</h1>

  <div class="pricing-table">
    <div class="plan basic">
      <h2>Basic</h2>
      <p class="price">$09.99/month</p>
      <ul>
        <li>Feature 1</li>
        <li>Feature 2</li>
        <li>Feature 3</li>
      </ul>
      <button>Purchase</button>
    </div>

    <div class="plan regular">
      <h2>Regular</h2>
      <p class="price">$19.99/month</p>
      <ul>
        <li>Feature 1</li>
        <li>Feature 2</li>
        <li>Feature 3</li>
      </ul>
      <button>Purchase</button>
    </div>

    <div class="plan advance">
      <h2>Advance</h2>
      <p class="price">$29.99/month</p>
      <ul>
        <li>Feature 1</li>
        <li>Feature 2</li>
        <li>Feature 3</li>
      </ul>
      <button>Purchase</button>
    </div>
  </div>
</div>-->

<!-- Price plan -->

  <div style="display: flex; flex-direction: column; align-items: center;">
    <div class="mapouter" id="contact">
      <p class="map" style="text-align: center;">တည်နေရာကြည့်ရန်</p>
      <div class="gmap_canvas">
        <iframe src="https://maps.google.com/maps?q=university%20of%20computer%20studies%20pyay&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" id="gmap_canvas" frameborder="0" scrolling="no" style="width: 600px; height: 400px;"></iframe>
        <style>.mapouter{position:relative;text-align:right;height:400px;width:600px;}</style>
        <style>.gmap_canvas{overflow:hidden;background:none!important;height:400px;width:600px;}</style>
        <a href="https://www.eireportingonline.com">ei reporting</a>
      </div>
    </div>
  </div>
  
   <div class="footer-clean">
    <footer>
        <div class="container" id="container">
            <div class="row justify-content-center">
                <div class="col-sm-4 col-md-3 item">
                    <h3>ဝန်ဆောင်မှုများ</h3>
                    <ul>
                        <li><a href="#">Web design</a></li>
                        <li><a href="#">Development</a></li>
                        <li><a href="#">Hosting</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3 item">
                    <h3>အကြောင်းအရာ</h3>
                    <ul>
                        <li><a href="#">Company</a></li>
                        <li><a href="#">Team</a></li>
                        <li><a href="#">Legacy</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3 item">
                    <h3>Careers</h3>
                    <ul>
                        <li><a href="#">Job openings</a></li>
                        <li><a href="#">Employee success</a></li>
                        <li><a href="#">Benefits</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 item social" style="margin-top:-5%;"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="fa-brands fa-linkedin fa-lg"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a>
                    <p class="copyright">copyright © 2023</p>
                </div>
            </div>
        </div>
        
    </footer>
  </div>



  <script >

// sidebar open close js code
let navLinks = document.querySelector(".nav-links");
let menuOpenBtn = document.querySelector(".navbar .bx-menu");
let menuCloseBtn = document.querySelector(".nav-links .bx-x");
menuOpenBtn.onclick = function() {
navLinks.style.left = "0";
}
menuCloseBtn.onclick = function() {
navLinks.style.left = "-100%";
}


// sidebar submenu open close js code
let htmlcssArrow = document.querySelector(".htmlcss-arrow");
htmlcssArrow.onclick = function() {
 navLinks.classList.toggle("show1");
}
let moreArrow = document.querySelector(".more-arrow");
moreArrow.onclick = function() {
    navLinks.classList.toggle("show2");
}
let jsArrow = document.querySelector(".js-arrow");
jsArrow.onclick = function() {
    navLinks.classList.toggle("show3");
}
</script>
</body>
</html>