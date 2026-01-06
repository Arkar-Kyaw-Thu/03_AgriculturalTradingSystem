<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Update Page</title>
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
    <?php
$connect=mysqli_connect("localhost","root","","tradingsystem");


if(isset($_POST['submit'])){
    $ID = $_POST['id'];
    $name = $_POST['name'];
    $position = $_POST['position'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $salary = $_POST['salary'];




        $que = "UPDATE `Staff` SET `Name`='$name',`Position`='$position',`Email`='$email',`Phone`='$phone',`Salary`='$salary' WHERE `Staff_ID`='$ID'";
    

    if(mysqli_query($connect, $que)) {
        header("Location: staff.php");
    } else {
        echo "Error updating record: " . mysqli_error($query);
    }
}

?>

</head>
<body>
<!--<div class="link">
    <a href="index1.php">Dashboard</a>
    <a href="staff.php">Staff</a>
</div>-->
<center>
<form id="Form" method="post" enctype="multipart/form-data">
    <h2 class="text-center"><a href="staff.php" style="text-decoration: none; color: black;float: left;"><i class="fa-solid fa-arrow-left"></i></a>Update Staff Information</h2>
    <?php
$connect=mysqli_connect("localhost","root","","tradingsystem");
    

    if (isset($_GET['id'])) {
        $code = $_GET['id'];
        $que = "SELECT `Staff_ID`, `Name`, `Position`, `Email`, `Phone`, `Salary` FROM `staff` WHERE Staff_ID ='$code'";
        $select = mysqli_query($connect, $que);
        if ($select) {
            $fetch = mysqli_fetch_assoc($select);
            ?>
            <input type="hidden" name="id" value="<?php echo $fetch['Staff_ID']; ?>">
            <div>
                <label for="title" class="form-label">Name</label>
                <input type="text" id="n1" name="name" value="<?php echo $fetch['Name']; ?>" required>
            </div>
            <div>
                <label for="title" class="form-label">Position</label>
                <input type="text" id="n1" name="position" value="<?php echo $fetch['Position']; ?>" required>
            </div>
            <div>
                <label for="title" class="form-label">Email</label>
                <input type="text" id="n1" name="email" value="<?php echo $fetch['Email']; ?>" required>
            </div>
            <div>
                <label for="title" class="form-label">Phone</label>
                <input type="text" id="n1" name="phone" value="<?php echo $fetch['Phone']; ?>" required>
            </div>
            <div>
                <label for="title" class="form-label">Salary</label>
                <input type="text" id="n1" name="salary" value="<?php echo $fetch['Salary']; ?>" required>
            </div>
            <button type="submit" class="btn" name="submit">Update</button>
            <?php
        }
    }
    ?>
</form>
</center>
</body>
</html>
