<?php
	include("sql.php");
	
	if(isset($_REQUEST['user']))
		$user=$_REQUEST['user'];
	else
		$user=$_SESSION['user'];
	$aula = $_REQUEST['aula'];

	deleteBooking($user, $aula);
	
	header("location: ../private");
	
?>