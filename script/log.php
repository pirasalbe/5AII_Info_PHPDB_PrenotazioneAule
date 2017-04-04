<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "aule";
	
	//Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	
	
	$conn->close();
	
?>