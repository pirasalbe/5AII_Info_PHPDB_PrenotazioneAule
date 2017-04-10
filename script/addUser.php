<?php
	include("sql.php");
	
	$user = $_REQUEST['username'];
	$pass = $_REQUEST['password'];
	$name = $_REQUEST['name'];
	
	if(isset($_REQUEST['admin']))
		$admin = $_REQUEST['admin'];
	else
		$admin = "no";

	addUser($user, $pass, $name, $admin);
	
	header("location: ../admin/users");
	
?>