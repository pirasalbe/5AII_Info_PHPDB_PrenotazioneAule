<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "aule";
	
	//Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	$conn->close();
?>

<html>
	<head>
		<title>
			Aule
		</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="style/font-awesome/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>

	<body>	
		<!--- header --->
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php">Sistema Prenotazione Aule</a>
				</div>
				<ul class="nav navbar-nav">
					<li><a href="#"><input type="date" name="data"> Vai a</a></li>
					
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Visualizzazione<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Giorni</a></li>
							<li><a href="#">Settimane</a></li>
							<li><a href="#">Mesi</a></li>
						</ul>
					</li>
					
					<li><a href="#">Report</a></li>
					<li><a href="#">Login</a></li>
				</ul>
			</div>
		</nav>
	
		<br>
		
		<!--- body --->
		
		<!--- Class type --->
		<div class="container navbar ">
			<ul class="nav navbar-nav list-group-item-info">
				<li><a href="#">Attrezzatura Informatica</a></li>
				<li><a href="#">Aule-speciali</a></li>
				<li><a href="#">Piano Rialzato - Aule</a></li>
				<li><a href="#">Primo Piano - Aule</a></li>
				<li><a href="#">Secondo Piano - Aule</a></li>
			</ul>
		</div>
		
		<!--- Days --->
		<div class="container">
		
			<div class="row">
				<div class="col-sm-4">
				</div>
				<div class="col-sm-4">
					<a href="#"><h3>Martedi 4 Aprile 2017</h3></a>
				</div>
				<div class="col-sm-4">
				</div>
			</div>		
			
			<br>
		
			<div class="row">
				<div class="col-sm-4">
					<a href="#">Vai al giorno prima</a>
				</div>
				<div class="col-sm-4">
					<a href="#">Vai a oggi</a>
				</div>
				<div class="col-sm-4">
					<a href="#">Vai al giorno successivo</a>
				</div>
			</div>							
		</div>		
		
		<!--- Weeks --->
		<!--- Months --->
	
	
	
		<!--- Calendar --->
		<br>
		<div class="container">
		
			<div class="table-responsive">          
				<table class="table">
					<thead>
						<tr>
							<th>Ora</th>
							<th>Aula 1</th>
							<th>Aula 2</th>
							<th>Aula 3</th>
							<th>Aula 4</th>
							<th>Aula 5</th>
						</tr>
					</thead>
					
					<tbody>
						<tr>
							<td>07:45</td>
							<td><a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
							<td><a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
							<td><a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
							<td><a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
							<td><a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
						</tr>
					</tbody>
				</table>
			</div>
			
		</div>	
	</body>
</html>