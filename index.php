<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "aule";
	/* Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	
	$conn->close();*/
?>

<html>
	<head>
		<title>
			Aule
		</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>

	<body>
            <div class="table-responsive">
			
				<form action="" method="post">
				    
				    <div class="container">
    					
    					<div class="row">
    						<div class="jumbotron text-center"><h2>Query Musicisti</h2></div>
    					</div>
				
						<div class="row">
							<div class="col-sm-2">
								<label for="cat">Categoria:</label>
							</div>
							<div class="col-sm-4">
									<input type="text" class="form-control" name="cat">
							</div>
							<div class="col-sm-2">
									<input class="btn btn-default" align="center" type="submit" name="categoria" value="Query Categoria">
							</div>
                        </div>	
						
						<br>
						
						<div class="row">
							<div class="col-sm-2">
								<label for="str">Strumenti:</label>
							</div>
							<div class="col-sm-4">
									<input type="number" class="form-control" name="str">
							</div>
							<div class="col-sm-2">
									<input class="btn btn-default" align="center" type="submit" name="strumenti" value="Query Strumenti">
							</div>
                        </div>
						
						<br>
						
						<div class="row">
							<div class="col-sm-2">
								<label for="mus">Musicisti:</label>
							</div>
							<div class="col-sm-4">
									<input type="number" class="form-control" name="mus">
							</div>
							<div class="col-sm-2">
									<input class="btn btn-default" align="center" type="submit" name="musicisti" value="Query Musicisti">
							</div>
                        </div>
						
						<br>
						
						<div class="row">
							<div class="col-sm-2">
								<label for="login">Sesso:</label>
							</div>
							<div class="col-sm-2">
									<input type="checkbox" class="form-control" name="mas" checked>
							</div>
							<div class="col-sm-2">
									<input type="checkbox" class="form-control" name="fem">
							</div>
							<div class="col-sm-2">
									<input class="btn btn-default" align="center" type="submit" name="sesso" value="Query Sesso">
							</div>
                        </div>
						
						<br>
						
						<div class="row">
							<div class="col-sm-2">
								<label for="login">Risultato query:</label>
							</div>
							<div class="col-sm-4">
							</div>
                        </div>
						
    				</div>		
				
				</form>
			
            </div>
	</body>
</html>