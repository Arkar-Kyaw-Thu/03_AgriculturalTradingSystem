<?php
include ("admin_header.php");
include("connection.php");
if(isset($_GET['id']))
{
  $id=$_GET['id'];
  $sql = "Delete FROM  knowledge WHERE kid='$id'";
  $delete=$db->query($sql);
if($delete)
{
  header("Location:adminKnowledgepage.php");
  die();
}

}


?>


<!DOCTYPE html>
<html lang="en">
    <head>
      <script type="text/javascript" src="sweetalert.min.js"></script>
  <title></title>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ဗဟုသုတများ</title>
        <style type="text/css">
.knowledge-title {
  display: flex;
  justify-content: space-between;
}
.search-box{
  display: inline-block;
  padding: 3px;
  color: black;
}
.knowledge-main-cards {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
  margin: 20px 0;
}
.knowledge-main-cards a{
  text-decoration: none;
}

.knowledge-card {
  background-color: #fff;
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  padding: 5px;
  border: 1px solid grey;
}

.knowledge-card-header{
  display: flow;
}

.knowledge-card-header a{
  float: right;
}

.knowledge-card-inner {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.knowledge-card-button{
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-top: 10%;
}

.knowledge-card-button a{
  color: black;
  text-decoration: none;
  text-align: center;
  padding: 10px 10px 10px 10px;
  width: 100%;
}

.knowledge-card-button a:hover{
  background-color: rgba(255, 255, 255, 0.2);
  box-shadow: 3px 3px 3px 3px rgba(0,0,0,0.1);
  cursor: pointer;
}

.knowledge-card-inner > .material-icons-outlined {
  font-size: 45px;
}
        </style>
    </head>
<body>

<!-- Home-section-starts!! -->
<div class="main--container">
  <div class="knowled-title">
    <h1 class="heading" style="position: absolute;"><span> ဆောင်းပါးများ <i class="fa-brands fa-pagelines fa-lg" style="color: #5cb418;"></i></span></h1>
    <h1 align="right">
      <div class="search-box">
        <a href="adminupdatepage.php" style="border:1px solid black;border-radius: 50%; padding: 5px;"><i class="fa fa-plus"></i></a>
      </div>
      <div class="search-box">
        <form action="" method="POST">
          <input type="text" name="Search" placeholder="Type to search" style="width:81%;height:30px; padding: 5px;">
          <button name="submit" style="width:15%;height: 30px;"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </h1>
  </div>
  <div class="knowledge-main-cards">
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
      document.location.href='adminKnowledgepage.php';}
      });        
    </script>
<?php 
  }
  else{
    $search=trim($_POST["Search"]);
    $sql="SELECT * FROM knowledge WHERE knowledgeTitle like '%$search%' order by CurrentDate desc";
    $res=$db->query($sql);
    $row1 = $res->fetchAll();
      if($row1){
        foreach($row1 as $item) {
          $kid = $item->kid;
          $Title=$item->knowledgeTitle;
          $img=$item->knowledgePhoto;
          $Body=$item->knowledgeDescript;
          $Date=$item->CurrentDate;
?>
    <div class="knowledge-card">
      <div class="knowledge-cards-inner">
        <p><img src="./images/sabarpoe.jpg" style='width: 100%;height: 200px;'></p>
      </div>
      <div class="knowledge-cards-inner">
        <p align="center"><?=$Title?></p>
      </div>
      <div class="knowledge-cards-inner">
        <p align="center"><?=$Title?></p>
      </div>
      <div class="knowledge-cards-inner">
        <p style="float: right;padding-right: 20px;">
          <a href='adminupdatepage.php?id=".$item->knowledgeTitle."'>
        <button type='submit'  class='btn btn-custom' style='background-color: #3bc59a;border-radius: 8px; font-size: medium;color: #fff;
         margin-right: 15px; padding:5px 20px;'>Edit</button></a>
         <a href='?id=".$item->knowledgeTitle."'>
        <button type='submit'  class='btn btn-custom ' style='background-color: #3bc59a;border-radius: 8px; font-size: medium;color: #fff;
        padding: 5px 20px;'>Delete</button></a>
        </p>
      </div>
      <div class="knowledge-cards-inner" style="border-top:1px solid black;">
        <p align="center">Last updated-(<?=$Date?>)</p>
      </div>
    </div>
<?php 
        }
      }
    }
}else{
  $sql="SELECT * FROM knowledge order by CurrentDate desc";
  $res=$db->query($sql);
  $row1 = $res->fetchAll();  
  if($row1)
  {
    foreach($row1 as $item) {
      $kid = $item->kid;
      $Title=$item->knowledgeTitle;
      $img=$item->knowledgePhoto;
      $Body=$item->knowledgeDescript;
      $Date=$item->CurrentDate;
?>
    <div class="knowledge-card">
      <div class="knowledge-cards-inner">
        <p><img src="./images/<?=$img?>" style='width: 100%;height: 200px;'></p>
      </div>
      <div class="knowledge-cards-inner" style="margin-bottom: 2%;">
        <p align="center"><?=$Title?></p>
      </div>
      <div class="knowledge-cards-inner" style="margin-bottom: 2%;overflow-y: hidden;height: 30px;">
        <p align="center"><?=$Body?></p>
      </div>
      <div class="knowledge-cards-inner" style="margin-bottom: 2%;">
        <p style="float: right;padding-right: 20px;">
          <a href='adminupdatepage.php?id=<?=$kid?>'>
        <button type='submit'  class='btn btn-custom' style='background-color: #3bc59a;border-radius: 8px; font-size: medium;color: #fff;
         margin-right: 15px; padding:5px 20px;'>Edit</button></a>
         <a href='?id=<?=$kid?>'>
        <button type='submit'  class='btn btn-custom ' style='background-color: #3bc59a;border-radius: 8px; font-size: medium;color: #fff;
        padding: 5px 20px;'>Delete</button></a>
        </p>
      </div>
      <div class="knowledge-cards-inner" style="border-top:1px solid black;padding: 2%;">
        <p align="center">Last updated-(<?=$Date?>)</p>
      </div>
    </div>
<?php 
    } 
  }
}
?>
  </div>
      
    </body>
</html>