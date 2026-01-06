<?php 
include ("admin_header.php");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if(isset($_POST['submit'])){
    $data = 0;
    $selectedMonth = $_POST['month'];
    $query = "SELECT sum(price) as total_spent FROM customer WHERE month = $selectedMonth ;";
    $result = mysqli_query($connect, $query);
    if($result){
        while($fetch = mysqli_fetch_assoc($result)){
            $data += $fetch['total_spent'];
        }
        $query = "UPDATE account set sale='$data' WHERE month='$selectedMonth'";
        $result = mysqli_query($connect, $query);
    }
}
$query = "SELECT * FROM account";
$result = mysqli_query($connect, $query);

$chart_data = '';
while($row = mysqli_fetch_array($result)) {
    $chart_data .= "{ month:'".$row["month"]."',sale:".$row["sale"]."}, ";
}

$chart_data = substr($chart_data, 0, -2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body class="body">
    
    <div class="main--container">
            <div class="section--title">
                <h3 class="title">Welcome back, Admin</h3>
            </div>
            <div class="container" style="width:900px;">
                <h3 align="center">Sale data chart</h3>
   <br /><br />

   <div id="chart"></div><!-- chart -->

   <hr>
   <br><br>
   <h2 align="center">Sale Data</h2><br><br>

   <center><form id="monthForm" action=" " method="post" >
    <select id="monthSelect" name="month">
        <option value="1">January</option>
        <option value="2">February</option>
        <option value="3">March</option>
        <option value="4">April</option>
        <option value="5">May</option>
        <option value="6">June</option>
        <option value="7">July</option>
        <option value="8">August</option>
        <option value="9">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
    </select>
    <button name="submit">Submit</button>
</form></center><br>
 <br>
<hr>
<table class="tab">
    <tr>
        <th>Customer Name</th>
        <th>Customer Phone</th>
        <th>Customer Email</th>
        <th>Customer Address</th>
        <th>Items</th>
        <th>date</th>
        <th>Quantity</th>
        <th>Price</th>



    </tr>
<?php 
if(isset($_POST['submit'])){
    $selectedMonth=$_POST['month'];
    $total = 0;

        $query = "SELECT *
    FROM customer
    WHERE month = $selectedMonth -- Replace 2 with the selected month number
    GROUP BY customerName, customerPhone, customerEmail, region, township, detailAddress, customerBoughtItems;
    ";


    $result = mysqli_query($connect, $query);
    if ($result) {
    $data = 0; 
    while ($fetch = mysqli_fetch_assoc($result)) {
        $n = $fetch['customerName'];
        $p = $fetch['customerPhone'];
        $e = $fetch['customerEmail'];
        $r = $fetch['region'];
        $t = $fetch['township'];
        $d = $fetch['detailAddress'];
        $b = $fetch['customerBoughtItems'];
        $q = $fetch['itemsQuantity'];
        $c = $fetch['price'];
        $day = $fetch['day'];
        $month = $fetch['month'];
        $year = $fetch['year'];
        $total += $c;
    
?>
        <tr>
            <td><?php echo $n; ?></td>
            <td><?php echo $p; ?></td>
            <td><?php echo $e; ?></td>
            <td class="y"><?php echo $r . " " . $t . $d; ?></td>
            <td><?php echo $b; ?></td>
            <td><?php echo $day . " " . $month . $year; ?></td>
            <td><?php echo $q; ?></td>
            <td><?php echo $c; ?></td>

        </tr>
<?php
    }
?>
        <tr>
            <td>Total Sale</td>
            <td colspan='8' class='tt' style='text-align: right;'><?php echo $total; ?></td>
        </tr>
<?php
} else {
    echo "there is no record.";
}
?></table>
<?php
}?>
  </div>
  <div id="chart"></div>
        </div>
    </section>
    <script src="assets/js/main.js"></script>
    <script>
    Morris.Bar({
        element: 'chart',
        data: [<?php  echo $chart_data; ?>],
        xkey: 'month',
        ykeys: ['sale'],
        labels: ['Sale'],
        hideHover: 'auto',
        stacked: true,
        
    });
</script>
</body>
</html>