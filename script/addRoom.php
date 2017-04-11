<?php
	include("sql.php");
	
	$nr = $_REQUEST['numero'];
	$name = $_REQUEST['name'];
	$descrizione = $_REQUEST['descrizione'];
	$type = $_REQUEST['type'];

	addRoom($nr, $name, $descrizione, $type);
	
	header("location: ../admin/rooms");
	
?>