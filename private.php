<?php
	include("script/sql.php");
	
	if($logged == 0){
		header("location: login");
	}
?>

<html>
	<head>
		<title>
			Area Riservata
		</title>
		<?php printHeader(); ?>
	</head>

	<body>	
		<!--- header --->
		<?php printNavbar(false); 
		if(admin())
			echo "<div class='container navbar '>
			<ul class='nav navbar-nav list-group-item-info'>
				<li><a href='#'>Tool amministratore: </a></li>
				<li><a href='admin/booking'>Prenotazioni</a></li>
				<li><a href='admin/users'>Utenti</a></li>
				<li><a href='admin/rooms'>Aule</a></li>
			</ul>
		</div>";
			
		?>
		
		<br>
		
		<!--- body --->
		<div class="container">
		
		<!--- prenotazioni --->
		<div class="table-responsive">          
			<table class="table">
				<thead>
					<tr>
						<th>Nr</th>
						<th>Aula</th>
						<th>Tipo</th>
						<th>Data</th>
					</tr>
				</thead>
				
				<tbody>
					<?php
						$result = booking(false);
						
						if(isset($result) && $result != null) {
							while ($row = $result->fetch_assoc()) {
								echo "<tr>
									<form action='script/deleteBooking'>
										<td name='aula'>" . $row["numero"] . "</td>
										<td>" . $row["nome"] . "</td>
										<td>" . $row["type"] . "</td>
										<td>" . $row["data"] . "</td>
										<td><input type='submit' value='Elimina'></td>
									</form>
									</tr>";
							}
						}
					?>
				</tbody>
			</table>
		</div>
		
		<br>
		
		<!--- footer --->
			<form action="messages">
				<div class="row">
					<div class="col-sm-4">
						<input type="submit" class="btn btn-default" value="Manda un messaggio">
						<span class="badge">
						<?php
						
							$result = messages();
							$cont = 0;
								
							if(isset($result) && $result != null) {
								while ($row = $result->fetch_assoc()) {
									$cont++;
								}
							}
							
							echo $cont;
						
						?>
						</span>
					</div>
				</div>	
			</form>		
		</div>	
		
	</body>
</html>