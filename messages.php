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
		
		<!--- Messages --->
		<div class="container">
		
			<div class="row form-group">
				<div class="col-sm-2">
					<label for="username">Destinatario: </label>
				</div>
				<div class="col-sm-4">
					<select name="username" class="form-control">
						<?php 
						
							$result = users();
							
							if(isset($result) && $result != null) {
								while ($row = $result->fetch_assoc()) {
									echo "<option value='" . $row["username"] . "'>" . $row["username"] . "</option>";
								}
							}
						
						?>
					</select>
				</div>
			</div>						
		</div>	
		
	</body>
</html>