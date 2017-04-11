<?php
	include("script/sql.php");
	
	$tipo = "Attrezzatura Informatica";
	if(isset($_REQUEST['tipo']))
		$tipo = $_REQUEST['tipo'];
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
		<?php printNavbar(false); ?>
	
		<br>
		
		<!--- body --->
		
		<!--- Class type --->
		<div class="container navbar ">
			<ul class="nav navbar-nav list-group-item-info">
				<li class="<?php if($tipo == "Attrezzatura Informatica") echo "alert-warning"; ?>"><a href="index?tipo=Attrezzatura%20Informatica">Attrezzatura Informatica</a></li>
				<li class="<?php if($tipo == "Aule speciali") echo "alert-warning"; ?>"><a href="index?tipo=Aule%20speciali">Aule-speciali</a></li>
				<li class="<?php if($tipo == "Piano Rialzato") echo "alert-warning"; ?>"><a href="index?tipo=Piano%20Rialzato">Piano Rialzato - Aule</a></li>
				<li class="<?php if($tipo == "Primo Piano") echo "alert-warning"; ?>"><a href="index?tipo=Primo%20Piano">Primo Piano - Aule</a></li>
				<li class="<?php if($tipo == "Secondo Piano") echo "alert-warning"; ?>"><a href="index?tipo=Secondo%20Piano">Secondo Piano - Aule</a></li>
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
		</div>	
	</body>
</html>