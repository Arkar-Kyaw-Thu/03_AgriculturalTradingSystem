<?php
  if(isset($_POST['address'])){
    $fullname=$_POST['fullName'];
    $phone=$_POST['phoneNumber'];
    $country=$_POST['country'];
    $street=$_POST['street'];
    $email=$_POST['email'];
    setcookie("fullname","$fullname",time()+3600*24);
    setcookie("phone","$phone",time()+3600*24);
    setcookie("country","$country",time()+3600*24);
    setcookie("street","$street",time()+3600*24);
    setcookie("email","$email",time()+3600*24);
    header("location: buynowpage.php");
  }
?>