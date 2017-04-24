<?php
include("../script/recursive.php");

if ($logged == 0 || !admin()) {
    header("location: ../index");
}


$uvalue="";
if(isset($_REQUEST['user']))
	$uvalue=$_REQUEST['user'];
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

<!--- create user --->
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
            <div class="col-sm-1 checkbox">
                <input name="admin" value="si" type="checkbox" maxlength="20">
            </div>
            <div class="col-sm-2">
                <label for="attivo">Attivo: </label>
            </div>
            <div class="col-sm-1 checkbox">
                <input name="attivo" value="si" type="checkbox" maxlength="20">
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
	<p class="h1">Utenti</p><br>
	
	<div class="row form-group">
			<form action="users">
				<div class="col-sm-1">
					<label for="user">Utente</label>
				</div>
				<div class="col-sm-2">
					<input name="user" class="form-control" maxlength="20" value="<?php echo $uvalue; ?>">
				</div>
				<div class="col-sm-2">
					<button type="submit" class="form-control">Cerca</button>
				</div>
				
				<div class="col-sm-3">
					<a class="btn btn-default" href="users">Mostra tutti</a>
				</div>
			</form>
	</div>

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Username</th>
                <th>Password</th>
                <th>Admin</th>
                <th>Attivo</th>
            </tr>
            </thead>

            <tbody>
            <?php
			
			$user="-1";
			if(isset($_REQUEST['user']))
				$user=$_REQUEST['user'];
			
            $result = users($user);

            if (isset($result) && $result != null) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["nome"] . "</td>
                            <td>" . $row["username"] . "</td>
                            <td>**********</td>
                            <td><a href='../script/adminUser?user=" . $row["username"] . "&admin=" . $row["admin"] . "'>" . $row["admin"] . "</a></td>
                            <td><a href='../script/changeUser?user=" . $row["username"] . "&stato=" . $row["attivo"] . "'>" . $row["attivo"] . "</a></td>
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