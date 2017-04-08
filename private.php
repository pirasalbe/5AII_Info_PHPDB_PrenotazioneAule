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
		<?php printNavbar(); ?>
		
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
							$result = booking();
							
							if(isset($result) && $result != null) {
								while ($row = $result->fetch_assoc()) {
									echo "<tr>
										<td>" . $row["numero"] . "</td>
										<td>" . $row["nome"] . "</td>
										<td>" . $row["type"] . "</td>
										<td>" . $row["data"] . "</td>
										</tr>";
								}
							}
						?>
					</tbody>
				</table>
			</div>
		
		<!--- footer --->
			<div class="row">
				<div class="col-sm-2">
					<form action="">
						<input type="submit" class="btn btn-default" value="Richiedi Informazioni">
					</form>
				</div>
			</div>			
		</div>	
		
	</body>
</html>