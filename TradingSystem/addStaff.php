<!DOCTYPE html>
<?php

$connect=mysqli_connect("localhost","root","","tradingsystem");

  if(isset($_POST['add'])){
    $name = $_POST['name'];
    $position = $_POST['position'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $salary = $_POST['salary'];

    $que="INSERT INTO `staff`(`Name`, `Position`, `Email`, `Phone`, `Salary`) VALUES ('$name','$position','$email','$phone','$salary')";
    mysqli_query($connect,$que);
    header("Location: staff.php");
    }
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Update Page</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <style>
body {
            font-family: 'Poppins', sans-serif;
            font-size: large;
            margin: 0;
            padding: 0;
            height: 100%;
            background: #fff;
        }
        form {
            border: 0px solid black;
            border-radius: 20px;
            margin: 10px auto;
            padding: 20px;
            max-width: 600px;
            background-color: #c6f4ab;
        }
        input, textarea, select {
            padding: 12px;
            border-radius: 5px;
            font-size: 15px;
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
        }
        .btn {
            padding: 10px;
            background-color: #5cb418;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #4CAF50;
        }
        a {
            text-decoration: none;
            color: #000;
            font-size: 20px;
        }
         .link{
        background-color: #ffff;
        padding-top: 2px;
      }   

      .head{
        background-color: #fff;
        width: 100px;
        font-size: 30px;
      }
    </style>
    </head>
    <!--<div class="link">
      <span class="head"><a href="index.php">Dashboard</a>&nbsp;
        <a href="team.php">team</a></span>
    </div>-->
    <body >
           <center>
              <form id="Form" method="post" enctype="multipart/form-data">
                          <h2 class="text-center" ><a href="staff.php" style="text-decoration: none; color: black;float: left;"><i class="fa-solid fa-arrow-left"></i></a>Add Staff member</h2>
                        <table>
            <div>
                <label for="title" class="form-label">Name</label>
                <input type="text" id="n1" name="name" required>
            </div>
            <div>
                <label for="title" class="form-label">Position</label>
                <input type="text" id="n1" name="position" required>
            </div>
            <div>
                <label for="title" class="form-label">Email</label>
                <input type="text" id="n1" name="email" required>
            </div>
            <div>
                <label for="title" class="form-label">Phone</label>
                <input type="text" id="n1" name="phone" required>
            </div>
            <div>
                <label for="title" class="form-label">Salary</label>
                <input type="text" id="n1" name="salary"  required>
            </div>

                          <tr><td colspan="2" align="center"><button type="submit"  class="btn " name="add">Add Data</button></td>
                        </tr></table>
                      </form></center>

</body>
</html>
