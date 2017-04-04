<?php
	include("recursive.php");

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "aule";
	
	//Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$user = $_REQUEST['username'];
	$pass = $_REQUEST['password'];

	$sql = "SELECT username, password FROM utenti where username=? and password=?";
	
	if ($stmt = $conn->prepare($sql)) {

		/* bind parameters for markers */
		$stmt->bind_param("ss", $user, $pass);

		/* execute query */
		$stmt->execute();

		/* bind result variables */
		$stmt->bind_result($user, $pass);

		/* fetch value */
		if($stmt->fetch()){
			$_SESSION['user'] = $user;
			echo "Logged";
			header("location: ../index");
		} else {
			echo "Wrong password";
			header("location: ../login");
		}

		/* close statement */
		$stmt->close();
	}
	
	$conn->close();
	
	//header("location: /index.php");
	
?>