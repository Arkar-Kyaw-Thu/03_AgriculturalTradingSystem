<?php
include 'config.php';
session_start();
if(isset($_POST['submit'])){

   $email =  $_POST['email'];
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['uid'];
      header('location:main.php');
   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
   <style>@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

:root{
   --blue:#3498db;
   --dark-blue:#2980b9;
   --red:#e74c3c;
   --dark-red:#c0392b;
   --black:#333;
   --white:#fff;
   --light-bg:#eee;
   --box-shadow:0 5px 10px rgba(0,0,0,.1);
}

*{
   font-family: 'Poppins', sans-serif;
   margin:0; padding:0;
   box-sizing: border-box;
   outline: none; border: none;
   text-decoration: none;
}

*::-webkit-scrollbar{
   width: 10px;
}

*::-webkit-scrollbar-track{
   background-color: transparent;
}

*::-webkit-scrollbar-thumb{
   background-color: var(--blue);
}

.btn,
.delete-btn{
   width: 100%;
   border-radius: 5px;
   padding:10px 30px;
   color:var(--white);
   display: block;
   text-align: center;
   cursor: pointer;
   font-size: 20px;
   margin-top: 10px;
}

.btn{
   width: 330px;
    background: transparent;
    padding: 10px 15px;
    border-radius: 30px;
    color: black;
    font-size: 18px;
    background-color: white;
    margin-left: 15px;
   border: 1px solid gray;
   height: 44px;

}

.btn:hover{
   background-color: grey;
}

.delete-btn{
   background-color: grey;
}

.delete-btn:hover{
   background-color: darkgrey;
}

.message{
   margin:10px 0;
   width: 100%;
   border-radius: 20px;
   padding:10px;
   text-align: center;
   background-color: lightgrey;
   color:var(--white);
   font-size: 20px;
}

.form-container-login{
   min-height: 100vh;
   background-color: #ddd;
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
}


.form-container-login form{
   padding:20px;
   background-color:  white;
   box-shadow: var(--box-shadow);
   text-align: center;
   width: 400px;
   border-radius: 20px;
   height: 368px;
}

.form-container-login form h3{
   margin-bottom: 9px;
   font-size: 27px;
   color:var(--black);
   text-transform: uppercase;
}

.form-container-login form .box{
   width: 70%;
   border-radius: 100px;
   padding:12px 14px;
   font-size: 16px;
   color:var(--black);
   margin:10px 0;
   background-color:white;
   height: 43px;
   border: 1px solid gray;
}

.form-container-login form p{
   margin-top: 15px;
   font-size: 18px;
   color:var(--black);
}

.form-container-login form p a{
   color:var(--red);
}

.form-container-login form p a:hover{
   text-decoration: none;
}
</style>

</head>
<body>
   
<div class="form-container-login">
   <form action="" method="post" enctype="multipart/form-data">
      <h2><a href="main.php" style="text-decoration: none; color: black;float: left;"><i class="fa-solid fa-arrow-left"></i></a></h2>

      <h3>login now</h3>

      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="email" name="email" placeholder="enter email" class="box" required> 
      <input type="password" name="password" placeholder="enter password" class="box" required>
      <input type="submit" name="submit" value="login now" class="btn">
      <p>don't have an account? <a href="register.php">register now</a></p>
   </form>

</div>

</body>
</html>