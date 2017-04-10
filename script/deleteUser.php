<?php
	include("sql.php");
	
	$user = $_REQUEST['username'];

	deleteUser($user);
	
	header("location: ../admin/users");
	
?>