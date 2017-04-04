<?php
	include("script/recursive.php");
?>

<html>
	<head>
		<title>
			Login
		</title>
		<?php printHeader(); ?>
	</head>

	<body>	
		<!--- header --->
		<?php printNavbar(); ?>
		
		<br>
		
		<!--- body --->
		
		<!--- login --->
		<form action="" method="post">
			<div class="container">
				<div class="row form-group">
					<div class="col-sm-2">
						<label for="username">Username: </label>
					</div>
					<div class="col-sm-4">
						<input name="username" class="form-control">
					</div>
				</div>		
				
				<br>
				
				<div class="row form-group">
					<div class="col-sm-2">
						<label for="password">Password: </label>
					</div>
					<div class="col-sm-4">
						<input type="password" name="password" class="form-control">
					</div>
				</div>		
				
				<br>
				
				<div class="row form-group">
					<div class="col-sm-2">
						<button type="submit" class="btn btn-default">Log In</button>
					</div>
				</div>		
			</div>		
			
		</form>
		
	</body>
</html>