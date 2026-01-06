<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
            <!--fontawesome link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            body{
                background-color: rgb(144, 238, 144);
            }
            .wrapper{
                border: 1px  black;
                height: 550px;
                margin-left: 90px;
                margin-right: 50px;
                /* background-color: rgb(149, 111, 220); */
            }
.img{
    float: left;
    margin-left: 150px;
    
}
.form{
   
    padding: 10px 20px;
    margin-left: 400px;
    text-align: center;
    
}


 input{
  width: px;
    background: transparent;
    padding: 5px 20px;
    border-radius: 40px;
}
img{
 border-radius: 30px;
 margin-top: 30px;
 margin-left: -20px;
 
}

i{
    font-size: large;
}

i:hover{
    cursor: pointer;
    transition: all 0.3 ease;
    opacity: 0.5;
}
.rem{
    text-align: left;
}
a{
    text-decoration: none;
    color: rgb(196, 106, 58);
}
.button{
    padding: 3px 90px;
    border-radius: 20px;
}
.message{
            margin:10px 0;
            width: 90%;
            border-radius: 20px;
            padding:10px;
            text-align: center;
            background-color: lightgrey;
            color:var(--white);
            font-size: 20px;
            }
            
        </style>

</head>
<?php
/*function has_required_characters($password) {
    return preg_match('/[A-Z]/', $password) && preg_match('/[a-z]/', $password) && preg_match('/[^a-zA-Z0-9]/', $password);
}*/

session_start();
$connect = mysqli_connect("localhost", "root", "", "tradingsystem");
if(isset($_POST['submit'])){
    $password=$_POST['password'];
    $email=$_POST['email'];
    echo $password;
    
    if ($password) {
    //if (has_required_characters($password)) {
        $query="SELECT * from adminlogin where email='$email' and password='$password'";
        $result = mysqli_query($connect, $query);
        if ($result) {
            if(mysqli_num_rows($result) > 0){
                $_SESSION['user_id'] = 0;
                header('location:index1.php');
            } else {
                $message[] = "Wrong Password -_-!";
            }
        }
    } else {
        $message[]= "Password does not meet the requirements.";
    }
}
?>

<body>
<div class="wrapper">
    <div class="img">
        <img src="images/2.jpg" alt="" height="500px" width="400px" >
    </div>
    <div class="form">
        <h2>Welcome</h2>
        <img src="images/login-.gif" alt="" height="50px" width="50px"><br><br>
       
        <form action="" method="post" name="f1">
            <?php
            if (isset($message)) {
                foreach ($message as $message) {
                    echo '<div class="message">' . $message . '</div>';
                }
            }
            ?>
            <div class="input-box">
                <label for=""></label>
            <input type="email" id="email" name="email" placeholder="Email..." required >   <i class="fa-solid fa-person"></i>
            </div><br><br>
            
            <div class="input-box">
                <label for=""></label>
            <input type="password" id="userPw" name="password" placeholder="Password..." required>  <i class="fa-solid fa-lock"></i>
            </div><br>
            <input id= "login_btn" type="submit" value="Login" name="submit" >
        </form>
    </div>
</div>
    
</body>
</html>
