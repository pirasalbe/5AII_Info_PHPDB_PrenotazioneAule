<?php
	include("../script/sql.php");
	
	if($logged == 0){
		header("location: ../login");
	}
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
		<?php printNavbar(true); ?>
		
		<br>
		
		<!--- body --->
		
		<!--- Create room --->
		<div class="container">
			<form action="../script/addRoom">
		
				<div class="row form-group">
					<div class="col-sm-2">
						<label for="numero">Numero: </label>
					</div>
					<div class="col-sm-4">
						<input name="numero" type="number" value="1" class="form-control" min="1">
					</div>
					<div class="col-sm-2">
						<label for="name">Nome: </label>
					</div>
					<div class="col-sm-4">
						<input name="name" class="form-control" maxlength="20">
					</div>
				</div>					

				<div class="row form-group">
					<div class="col-sm-2">
						<label for="descrizione">Descrizione: </label>
					</div>
					<div class="col-sm-4">
						<input name="descrizione" class="form-control" maxlength="20">
					</div>
					<div class="col-sm-2">
						<label for="type">Tipo: </label>
					</div>
					<div class="col-sm-4">
						<select name="type" class="form-control">
							<option value="Attrezzatura Informatica">Attrezzatura Informatica</option>
							<option value="Aule speciali">Aule speciali</option>
							<option value="Piano Rialzato">Piano Rialzato</option>
							<option value="Primo Piano">Primo Piano</option>
							<option value="Secondo Piano">Secondo Piano</option>
						</select>
					</div>
				</div>				

				<div class="row form-group">
					<div class="col-sm-4">
						<button type="submit" class="form-control">
							Aggiungi/Aggiorna
						</button>	
					</div>
				</div>	
			</form>
		</div>	
		
		<br>
		
		<!--- Users --->
		<div class="container">
			<div class="table-responsive">          
				<table class="table">
					<thead>
						<tr>
							<th>Numero</th>
							<th>Nome</th>
							<th>Descrizione</th>
							<th>Tipo</th>
						</tr>
					</thead>
					
					<tbody>
						<?php
							$result = rooms();
							
							if(isset($result) && $result != null) {
								while ($row = $result->fetch_assoc()) {
									echo "<tr>
											<td>" . $row["numero"] . "</td>
											<td>" . $row['nome'] . "</td>
											<td>" . $row["descrizione"] . "</td>
											<td>" . $row["type"] . "</td>
											<td><a href='../script/deleteRoom?numero=" . $row["numero"] . "'>Elimina</a></td>
										</tr>";
								}
							}
						?>
					</tbody>
				</table>
			</div>
		</div>	
		
	</body>
</html>