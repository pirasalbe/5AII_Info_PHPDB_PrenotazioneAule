<?php
	include("../script/sql.php");
	
	if($logged == 0){
		header("location: ../login");
	}
?>

<html>
	<head>
		<title>
			Utenti
		</title>
		<?php printHeader(); ?>
	</head>

	<body>	
		<!--- header --->
		<?php printNavbar(true); ?>
		
		<br>
		
		<!--- body --->
		
		<!--- Send new message --->
		<div class="container">
			<form action="../script/addUser">
		
				<div class="row form-group">
					<div class="col-sm-2">
						<label for="username">Username: </label>
					</div>
					<div class="col-sm-4">
						<input name="username" class="form-control" maxlength="20">
					</div>
					<div class="col-sm-2">
						<label for="password">Password: </label>
					</div>
					<div class="col-sm-4">
						<input name="password" class="form-control" maxlength="20">
					</div>
				</div>					

				<div class="row form-group">
					<div class="col-sm-2">
						<label for="name">Nome: </label>
					</div>
					<div class="col-sm-4">
						<input name="name" class="form-control" maxlength="20">
					</div>
					<div class="col-sm-2">
						<label for="admin">Admin: </label>
					</div>
					<div class="col-sm-4 class="checkbox"">
						<input name="admin" value="si" type="checkbox" maxlength="20">
					</div>
				</div>				

				<div class="row form-group">
					<div class="col-sm-2">
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
							<th>Username</th>
							<th>Password</th>
							<th>Admin</th>
							<th>Nome</th>
						</tr>
					</thead>
					
					<tbody>
						<?php
							$result = users();
							
							if(isset($result) && $result != null) {
								while ($row = $result->fetch_assoc()) {
									echo "<tr>
											<td>" . $row["username"] . "</td>
											<td>" . $row['password'] . "</td>
											<td>" . $row["admin"] . "</td>
											<td>" . $row["nome"] . "</td>
											<td><a href='../script/deleteUser?username=" . $row["username"] . "'>Elimina</a></td>
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