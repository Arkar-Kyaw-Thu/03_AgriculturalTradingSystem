<?php 
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	<title>လုပ်ဆောင်ခဲ့သောအရာများ</title>
   <style type="text/css">
         body{
         font-family: 'Times New Roman', Times, serif;
         }
       .tab {
        background-color:black;
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 0px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:nth-child(odd) {
            background-color: #e6f7ff;
        }
        tr:hover {
            background-color: #ddd;
        }

        .para{
            font-weight: bolder;
            text-align: center;
            font-size: 30px;

        }

        a{text-decoration: none;
         color: black;}

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
      button{
        width: 40%;
        height: 40px;
         font-family: 'Georgia', Times, serif;
      }
   </style>
</head><body>
<?php
if (isset($_SESSION['user_id'])) {
    $useremail = $_SESSION['user_id'];
    $select = mysqli_query($conn, "SELECT * FROM `customer` WHERE uid = '$useremail'") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        $fetch = mysqli_fetch_assoc($select);
        if ($fetch) {
            $selectDates = mysqli_query($conn, "SELECT DISTINCT month FROM customer WHERE uid = '$useremail'");
            ?>
            <table class="tab">
                <tr>
                    <th colspan="2">
                        <h3 class="para">
                            <a href="profile.php" style="text-decoration: none; color: black;float: left;"><i class="fa-solid fa-arrow-left"></i></a>
                            လုပ်ဆောင်ခဲ့သောအရာများ
                        </h3>
                    </th>
                </tr>
                <?php
                while ($dateRow = mysqli_fetch_assoc($selectDates)) {
                    $userDate = $dateRow['month'];

                    $selectDetails = mysqli_query($conn, "SELECT *
                          FROM customer
                          WHERE uid = '$useremail' AND month = '$userDate'");
                    while($fetchDetails = mysqli_fetch_assoc($selectDetails)){
                        if ($fetchDetails) {
                        ?>
                        <tr>
                            <td>
                                    <?php
                                    echo "ရက်စွဲ." .$fetchDetails['day'] ."/". $fetchDetails['month'] ."/". $fetchDetails['year']. "<br>";
                                    echo "၀ယ်ယူသူနာမည်: " . htmlspecialchars($fetchDetails['customerName']) . "<br>";
                                    echo "စုစုပေါင်းကုန်ကျငွေ: " . htmlspecialchars($fetchDetails['price']) . "<br>";
                                    $_SESSION['date'] = $fetchDetails['month'];
                                    ?></td><td><center><a href="historyDetail.php?cuid=<?=$fetchDetails['cuid']?>">
                                    <button>ပိုမိုသိရှိရန်...</button></center>
                                </a>
                            </td>
                        </tr>
                        <?php
                        } else {
                        echo "ရလဒ်ရှာမတွေ့ပါ......";
                        }
                    }
                } ?>
            </table>
            <?php
        }
    } else {
        $message[] = 'ရလဒ်ရှာမတွေ့ပါ!';
        ?>
        <center>
            <?php
            if (isset($message)) {
                foreach ($message as $message) {
                    echo '<div class="message">' . $message . '</div>';
                }
            }
            ?>
        </center>
        <?php
    }
} else {
    echo "ရလဒ်ရှာမတွေ့ပါ";
}
?>

</body>
</html>