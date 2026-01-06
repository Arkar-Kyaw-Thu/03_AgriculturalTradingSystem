<?php 
include ("admin_header.php");
session_start();

 if(isset($_GET['id'])){
    $delete=$_GET['id'];
    $delete="DELETE FROM `staff` WHERE Staff_ID='$delete'";
    $dd=mysqli_query($connect,$delete);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
</head>

<style>
    body {
        padding: 0px;
        margin: 0;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    
    table {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        border-collapse: collapse;
        width:90%;
        height: 200px;
        border: 1px solid #bdc3c7;
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
    }
    
    tr {
        transition: all .2s ease-in;
        cursor: pointer;
    }
    
    th,
    td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    
    #header {
        background-color: #16a085;
        color: #fff;
    }
    
    h1 {
        font-weight: 600;
        text-align: center;
        background-color: #16a085;
        color: #fff;
        padding: 10px 0px;
    }
    
    tr:hover {
        background-color: #f5f5f5;
        transform: scale(1.02);
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
    }
    
    }
</style>


        

<body>
<div class="main--container">
    <table>
    <tr id="header">
            <th>ID</th>
            <th>Name</th>
            <th>Position</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Salary</th>
            <?php
            echo "
            <th style='text-align:center;'><a href='addStaff.php'><button style='padding:5px;'>Add</button></a></th>";
        ?>

        </tr>
        <?php
        $select="SELECT * from staff";
    $qw=mysqli_query($connect,$select);
    while($row =mysqli_fetch_assoc($qw)) {
        $Staff_id=$row['Staff_ID'];
        $Name=$row['Name'];
        $position=$row['Position'];
         $Email=$row['Email'];
          $Phone=$row['Phone'];
          $Salary=$row['Salary'];

        ?>
         <tr>
            <td><?php echo $Staff_id?></td>
            <td><?php echo $Name?> </td>
            <td><?php echo $position?>  </td>
            <td><?php echo $Email?></td>
            <td><?php echo $Phone?> </td>
            <td><?php echo $Salary?></td>
            <?php echo "
        <td>
            <a href='staff.php?id=$Staff_id'><button style='padding:5px;'>Delete</button></a>
            <a href='updateStaff.php?id=$Staff_id'><button style='padding:5px;'>Update</button></a>
        </td>";
}
?>


        </tr>
        
    </table>
</div>
</body>

</html>