<?php
	include("sql.php");
	
	$user = $_REQUEST['username'];
	$messaggio = $_REQUEST['messaggio'];

	sendMessage($user, $messaggio);
	
	header("location: ../messages");
	
?>