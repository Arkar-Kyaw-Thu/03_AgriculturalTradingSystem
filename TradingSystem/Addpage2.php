<?php
include("connection.php");
$Title="";
$Body="";
$Color="";
$Img="";
if(isset($_GET['id']))
{
	$num=$_GET['id'];
	$sql = "SELECT * FROM  knowledge Where knowledgeTitle='$num'";
	$delete=$db->query($sql);
    $row1 = $delete->fetch();
    $Title=$row1->knowledgeTitle;
    $img=$row1->knowledgePhoto;
    $Body=$row1->knowledgeDescript;
    $Photo=$row1->knowledgePhoto;
    

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	<title></title>
	<style type="text/css">
		#title{
		text-align: center;
		width: 80%%;
		height: 100px;
		font-size: 40px;
		background: linear-gradient(, white);
		padding: 50px;
		border-radius: 20px;
		margin-top: -10px;
	}

		#body{
			margin-top: 30px;
			border-radius: 20px;
			padding: 30px;
		}
		#all{
			max-width: 100%;
			height: 100%;
			border: 1px solid white;
			margin-left: 30px;
			margin-right: 30px;
			 box-shadow:0 0 10px 2px silver;
			 border-radius: 20px;
		}
		

	</style>
</head>
<body id="ba">
	<div id="all">
	<div id="title">
		<p><h2><a href="knowledgepage.php" style="text-decoration: none; color: black;float: left;"><i class="fa-solid fa-arrow-left"></i></a></h2><?php echo $Title;?></p>
	</div>
	<div id="Photo">
		<img src="./images/<?=$img?>" width="100%" height="500px">
	</div>
	<div id="body">
		<?php echo $Body;?>
	</div>
	</div>

</body>
</html>
