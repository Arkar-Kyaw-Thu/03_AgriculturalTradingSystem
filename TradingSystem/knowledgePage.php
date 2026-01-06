<!DOCTYPE html>
<?php 
  include 'header.php';
  include 'config.php';
?>
<html>
<head>
      <script type="text/javascript" src="sweetalert.min.js"></script>
      <title></title>
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ဗဟုသုတများ</title>
        <!-- swiper-js link -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
        <!-- font awesome cdn link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- custom css file link -->
        <link rel="stylesheet" href="knowledgepage.css">
         <!-- Bootstrap Font Icon CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
        <!-- bootstrap cdn link CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <!-- bootstrap cdn link JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </head>
<body>
	<section class="home" id="home">
  		<div class="content">

  		</div>
	</section>

<br><br>
<div class="title"><h1 class="heading"><span> ဆောင်းပါးများ <i class="fa-brands fa-pagelines fa-lg" style="color: #5cb418;"></i></span></h1></div>

  

<div class="search-box">
  <form action="knowledgePage.php" method="POST" id="btn" >
    <input type="text" name="Search" placeholder="Type to search">
    <button name="submit"><i class="fa fa-search"></i></button>
    </form>
</div>


 <!-- card1 -->
 <div class="row row-cols-1 row-cols-md-2 g-4 ms-5" style="display: flex; justify-content: center; padding-left:100px;">
 <?php
$form="form";
include("connection.php");

if(isset($_POST["submit"]))
{
  if($_POST["Search"]=="")
{
  ?>
  <script>
      
    swal({
      title: "No Result Found! ",
      text: "ရှာဖွေမှုရလဒ်မတွေ့ပါ",
      icon: "warning",
      })
    .then((isOkay)=>{
      if(isOkay){
    document.location.href='knowledgePage.php';
      
        
      }
    });
    
    
          
</script>




 <?php }else{
  $search=trim($_POST["Search"]);
  $sql="SELECT * FROM knowledge WHERE knowledgeTitle like '%$search%' ";
  $res=$db->query($sql);
  $row1 = $res->fetchAll();

     
  if($row1)
  {

    foreach($row1 as $item) {
      $Title=$item->knowledgeTitle;
      $img=$item->knowledgePhoto;
      $Body=$item->knowledgeDescript;
       $Date=$item->CurrentDate;
      

      
      


  echo"    
  <div class='col'>
    <div class='card' style='width: 50rem; border-radius: 3%;  ''>
      <img src='./images/$img' class='card-img-top' style='border-top-left-radius: 3%; border-top-right-radius: 3%;' height='200px' alt='...'>
      <div class='card-body'>
        <h5 class='card-title'>$Title</h5><br>
        <p class='card-text'> $Title

             </p>
             <a href='Addpage2.php?id=".$item->knowledgeTitle."' style='text-decoration: none;font-weight:bold;color:black;'>see more...</a>
        

      </div>
      <div class='card-footer'>
        <small class='text-body-secondary'>Last updated-($Date)</small>
      </div>
      
    </div>
  </div>
  ";
}
}else
{
?>
  <script>
      
    swal({
      title: "No Result Found! ",
      text: "ရှာဖွေမှုရလဒ်မတွေ့ပါ",
      icon: "warning",
      })
    .then((isOkay)=>{
      if(isOkay){
    document.location.href='knowledgePage.php';
      
        
      }
    });
    
    
          
</script>
<?php }
}

  
}else{
  $sql="SELECT * FROM knowledge ";
  $res=$db->query($sql);
  $row1 = $res->fetchAll();

     
  if($row1)
  {

    foreach($row1 as $item) {
      $Title=$item->knowledgeTitle;
      $img=$item->knowledgePhoto;
      $Body=$item->knowledgeDescript;
      $Date=$item->CurrentDate;

      
      


  echo" <div class='col'>
    <div class='card' style='width: 50rem; border-radius: 3%;  ''>
      <img src='./images/$img' class='card-img-top' style='border-top-left-radius: 3%; border-top-right-radius: 3%;' height='200px' alt='...'>
      <div class='card-body'>
        <h5 class='card-title'>$Title</h5><br>
        <p class='card-text'> $Title

             </p>
            <a href='Addpage2.php?id=".$item->knowledgeTitle."' style='text-decoration: none;font-weight:bold;color:black;'>see more...</a>
       

      </div>
       <div class='card-footer'>
        <small class='text-body-secondary'>Last updated-($Date)</small>
      </div>
      
    </div>
  </div>
  ";
}
}
}
   
  ?>  


</div>






<!-- Home section ends -->
<!-- Javascript part -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- swiper js link -->
        <script>
          let searchForm = document.querySelector('.search-form');

          document.querySelector('#search-btn').onclick = () =>{
            searchForm.classList.toggle('active');
            loginForm.classList.remove('active');
            navbar.classList.remove('active');
          }

          let loginForm= document.querySelector('.login-form');

          document.querySelector('#login-btn').onclick = () =>{
          searchForm.classList.remove('active');
          loginForm.classList.toggle('active');
          navbar.classList.remove('active');
          }

          let navbar = document.querySelector('.navbar');

          document.querySelector('#menu-btn').onclick =() =>{
            searchForm.classList.remove('active');
            loginForm.classList.remove('active');
            navbar.classList.toggle('active');

          }

          window.onscroll =() =>{
            searchForm.classList.remove('active');
            loginForm.classList.remove('active');
            navbar.classList.remove('active');
          }

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