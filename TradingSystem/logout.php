<?php
	session_start();
	session_destroy();
	if(isset($_COOKIE['fullname'])){
		setcookie("fullname","$fullname",time()-(60*60));
    	setcookie("phone","$phone",time()-(60*60));
    	setcookie("country","$country",time()-(60*60));
    	setcookie("street","$street",time()-(60*60));
    	setcookie("email","$email",time()-(60*60));
	}
	header("Location: main.php");
?>