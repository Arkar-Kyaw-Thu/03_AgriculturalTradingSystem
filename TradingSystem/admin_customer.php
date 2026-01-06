<?php 
include 'config.php';
include ("admin_header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
            background-color: #fff;
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
    <div class="main--container">
<?php

    $select = mysqli_query($conn, "SELECT * FROM customer") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        $fetch = mysqli_fetch_assoc($select);
        if ($fetch) {
            $selectDates = mysqli_query($conn, "SELECT DISTINCT month FROM customer");
            ?>
            <table class="tab">
                <tr>
                    <th colspan="2"><h3 class="para">လုပ်ဆောင်ခဲ့သောအရာများ</h3></th>
                </tr>
                <?php
                while ($dateRow = mysqli_fetch_assoc($selectDates)) {
                    $userDate = $dateRow['month'];

                    $selectDetails = mysqli_query($conn, "SELECT *
                          FROM customer
                          WHERE  month = '$userDate' and not status='uncomfrim' order by cuid desc");
                    while($fetchDetails = mysqli_fetch_assoc($selectDetails)){
                        if ($fetchDetails) {
                            $status = $fetchDetails['status'];
                        ?>
                            <tr>
                                
                                <td style="position: relative;">
                                    <?php if($status=="delivery"){ ?>
                                        <img src="images/photo.jpg" style="background:transparent; position: absolute;width: 30%; height:100%;">
                                    <?php }else if ($status=="cancel"){ ?>
                                        <img src="images/cancel.jpg" style="background:transparent; position: absolute;width: 30%; height:100%;">
                                    <?php } ?>
                                    <div style="position: relative;">
                                    <?php
                                    echo "ရက်စွဲ." .$fetchDetails['day'] ."/". $fetchDetails['month'] ."/". $fetchDetails['year']. "<br>";
                                    echo "၀ယ်ယူသူနာမည်: " . htmlspecialchars($fetchDetails['customerName']) . "<br>";
                                    echo "စုစုပေါင်းကုန်ကျငွေ: " . htmlspecialchars($fetchDetails['price']) . "<br>";
                                    ?>
                                    </div>
                                </td>
                                <td>
                                    <center>
                                        <a href="admin_customerDetail.php?cuid=<?=$fetchDetails['cuid']?>">
                                            <button>ပိုမိုသိရှိရန်...</button>
                                        </a>
                                    </center>
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


?>

</body>
</html>