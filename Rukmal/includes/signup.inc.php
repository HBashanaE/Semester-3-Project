<?php
	include_once 'includes/dph.inc.php';
	$first = $_POST['first'];
	$last = $_POST['last'];
	$email = $_POST['email'];
	$uid = $_POST['uid'];
	$pwd = $_POST['pwd'];
	$sql="insert into users (user_first,user_last,user_email,user_uid,user_pwd) VALUES ('Rukmal','Senavirathe','rukmal@gmail.com','Admin','test123');";
	mysqli_query($conn,$sql);
	header("Location: ../databaseconect.php?signup=success");
		
	
