<?php
	include("sql.php");
	
	$nr = $_REQUEST['numero'];

	deleteRoom($nr);
	
	header("location: ../admin/rooms");
	
?>