<?php
	include("script/recursive.php");

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
		<?php printHeader(); ?>
	</head>

	<body>	
		<!--- header --->
		<?php printNavbar(); ?>
	
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
							<td>07:45 - 08:40</td>
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
		
		<!--- Legenda --->
		<div class="container">
		
			<div class="row">
				<div class="col-sm-2 alert-success">
					Interno
				</div>
				<div class="col-sm-1">
				
				</div>
				<div class="col-sm-2 alert-info">
					Esterno
				</div>
			</div>		
			</div>							
		</div>	
	</body>
</html>