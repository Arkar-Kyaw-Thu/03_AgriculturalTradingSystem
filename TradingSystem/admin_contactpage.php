<!DOCTYPE html>
<html>
<?php include 'config.php';?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/admin.css">

		<link rel="stylesheet" href="css/design.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>
<?php include "admin_header.php"; ?>
	  <main class="main--container">
      <?php if(isset($_SESSION['user_id'])){ ?>
  		<div style="display: flex;align-items: center;justify-content: center;min-height: 75vh;margin-top: -1%;">
				<div class="wrapper chating">
    			<section class="chat-area">
    				<header>
        			<?php
        				$user_id = $_GET['user_id'];
        				$sql = mysqli_query($conn, "SELECT * FROM user_form WHERE uid = $user_id");
        				if (mysqli_num_rows($sql) > 0) {
          				$row = mysqli_fetch_assoc($sql);
          				$name= $row['name'];
          				$img = $row['image'];
        				}
        		?>
        			<a href="admin_chat.php" class="back-icon"><i class="fas fa-arrow-left" style="color:black;"></i></a>
        			<img src="images/<?=$img?>" alt="">
        			<div class="details">
          				<span><?=$name?></span>
        			</div>
    				</header>
    				<div class="chat-box">
      			</div>
      			<form action="#" class="typing-area" style="width: 100%;" enctype="multipart/form-data">
        			<input type="text" class="incoming_id" name="incoming_id" value="<?=$user_id?>" hidden>
        			<label for="images-field" style="width: 45px;height: 45px;border: 1px solid black;padding: 10px 13px;border-radius: 50%;margin-right: 3%;"><i class="fa-solid fa-camera" style="color: black;"></i></label>
            	<input type="file" name="uploadfile" class="images-field" id="images-field" style="display:none;">
        			<input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        			<button><i class="fab fa-telegram-plane"></i></button>
      			</form>
      		</section>
      	</div>
  		</div>
      <script src="javascript/chat.js"></script>
<?php }
?>
     </main>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
    <!-- Custom JS -->
  <script src="javascript/scripts.js"></script>
</body>
</html>