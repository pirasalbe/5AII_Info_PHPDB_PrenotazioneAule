<?php
	session_start();
	
	$logged = 0;
	if(isset($_SESSION['user']))
		$logged='1';
	
	function printNavbar(){
		global $logged;
		
		$log = "Login";
		if($logged == 1)
			$log = "Logout";
		
		echo "<!--- header --->
			<nav class='navbar navbar-default'>
				<div class='container-fluid'>
					<div class='navbar-header'>
						<a class='navbar-brand' href='index.php'>Sistema Prenotazione Aule</a>
					</div>
					<ul class='nav navbar-nav'>
						<li><a href='#'><input type='date' name='data'> Vai a</a></li>
						
						<li class='dropdown'>
							<a class='dropdown-toggle' data-toggle='dropdown' href='#'>Visualizzazione<span class='caret'></span></a>
							<ul class='dropdown-menu'>
								<li><a href='#'>Giorni</a></li>
								<li><a href='#'>Settimane</a></li>
								<li><a href='#'>Mesi</a></li>
							</ul>
						</li>
						
						<li><a href='report'>Report</a></li>
						<li><a href='#'>Admin</a></li>
						<li><a href='login'>" . $log . "</a></li>
					</ul>
				</div>
			</nav>";
	}
	

	function printHeader(){
		echo "<meta charset='utf-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
		<link rel='stylesheet' href='style/font-awesome/css/font-awesome.min.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js'></script>
		<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>";
	}	
	
?>