<?php
	include("recursive.php");
	
	function init() {
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
		
		return $conn;
	}

	//perform login
	function login($user, $pass){
		$sql = "SELECT username, password FROM utenti where username=? and password=?";
		
		$conn = init();
		
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
		
		close($conn);
	}
	
	//am i an admin
	function admin(){
		$sql = "SELECT admin FROM utenti where username=?";
		
		$conn = init();
		
		if ($stmt = $conn->prepare($sql)) {

			/* bind parameters for markers */
			$stmt->bind_param("s", $_SESSION['user']);

			/* execute query */
			$stmt->execute();

			/* bind result variables */
			$stmt->bind_result($admin);

			/* fetch value */
			$stmt->fetch();

			/* close statement */
			$stmt->close();
		}
		
		close($conn);
		
		if($admin == "si") return true;
		return false;
	}
	
	//look for my prenotazioni
	function booking(){
		$sql = "SELECT numero, nome, type, data 
			FROM prenotazioni p inner join aula a on a.aula=p.numero 
			where utente=?";
		
		$conn = init();
		
		$result = null;
		
		if ($stmt = $conn->prepare($sql)) {

			/* bind parameters for markers */
			$stmt->bind_param("s", $_SESSION['user']);

			/* execute query */
			$stmt->execute();

			/* instead of bind_result: */
			$result = $stmt->get_result();
		}
		
		close($conn);
		
		return $result;
	}
	
	//user list
	function users(){
		$sql = "SELECT username 
			FROM utenti
			where username<>?";
		
		$conn = init();
		
		$result = null;
		
		if ($stmt = $conn->prepare($sql)) {

			/* bind parameters for markers */
			$stmt->bind_param("s", $_SESSION['user']);

			/* execute query */
			$stmt->execute();

			/* instead of bind_result: */
			$result = $stmt->get_result();
		}
		
		close($conn);
		
		return $result;
	}
	
	//user list
	function messages(){
		$sql = "SELECT * 
			FROM messages
			where primo=? || secondo=?
			order by secondo, timestamp";
		
		$conn = init();
		
		$result = null;
		
		if ($stmt = $conn->prepare($sql)) {

			/* bind parameters for markers */
			$stmt->bind_param("ss", $_SESSION['user'], $_SESSION['user']);

			/* execute query */
			$stmt->execute();

			/* instead of bind_result: */
			$result = $stmt->get_result();
		}
		
		close($conn);
		
		return $result;
	}
	
	//send message
	function sendMessage($user, $messaggio){
		$sql = "insert into messages 
				values(?,?,?,?)";
		
		$conn = init();
		
		$result = null;
		
		if ($stmt = $conn->prepare($sql)) {

			/* bind parameters for markers */
			$stmt->bind_param("ssss", $_SESSION['user'], $user, $messaggio, date("Y-m-d H:i:s"));

			/* execute query */
			$stmt->execute();
		}
		
		close($conn);
	}
	
	//delete booking
	function deleteBooking($user, $aula){
		$sql = "delete from prenotazioni 
				where aula=? and utente=?";
		
		$conn = init();
		
		$result = null;
		
		if ($stmt = $conn->prepare($sql)) {

			/* bind parameters for markers */
			$stmt->bind_param("ss", $user, $aula);

			/* execute query */
			$stmt->execute();
		}
		
		close($conn);
	}
	
	//close sql 
	function close($conn){
		$conn->close();
	}
	
?>