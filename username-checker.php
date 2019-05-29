<?php
include "dbh.php";
if(isset($_POST["username"]))
{
    $db=dbh::getDataBase();
	$username = filter_var($_POST["username"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
	
	$statement = $db->prepare("SELECT username FROM members WHERE username=?");
	$statement->bind_param('s', $username);
	$statement->execute();
	$statement->bind_result($username);
	if($statement->fetch()){
		die('<img src="not-available.png" />');
	}else{
		die('<img src="available.png" />');
	}
}