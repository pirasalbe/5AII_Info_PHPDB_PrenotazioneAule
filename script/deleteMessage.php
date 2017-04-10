<?php
	include("sql.php");
	
	$id = $_REQUEST['id'];

	deleteMessage($id);
	
	header("location: ../messages");
	
?>