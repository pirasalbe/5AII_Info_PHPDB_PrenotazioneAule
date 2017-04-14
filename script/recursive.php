<?php
session_start();

include("sql.php");

/*if ($_SERVER["HTTPS"] != "on") {
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}*/

$logged = 0;
if (isset($_SESSION['user']))
    $logged = '1';

function printNavbar($admin)
{
    global $logged;

    if ($admin)
        $admin = "../";
    else
        $admin = "";

    $user = "Area Riservata";
    $log = "Login";

    if ($logged == 1) {
        $log = "Logout";
        $user = $_SESSION['user'];
        if(admin()){
            $result = booking(true);
            $cont = 0;

            if (isset($result) && $result != null) {
                while ($row = $result->fetch_assoc()) {
                    if ($row["attiva"] == "no")
                        $cont++;
                }
            }

            $result = users();

            if (isset($result) && $result != null) {
                while ($row = $result->fetch_assoc()) {
                    if ($row["attivo"] == "no")
                        $cont++;
                }
            }

            $user = $user . " <span class='badge'>" . $cont . "</span>";
        }
    }

    echo "<!--- header --->
			<nav class='navbar navbar-default'>
				<div class='container-fluid'>
					<div class='navbar-header'>
						<a class='navbar-brand' href='" . $admin . "index.php'>Sistema Prenotazione Aule</a>
					</div>
					<ul class='nav navbar-nav'>
						<li class='dropdown'>
							<a class='dropdown-toggle' data-toggle='dropdown' href='#'>Visualizzazione<span class='caret'></span></a>
							<ul class='dropdown-menu'>
								<li><a href='" . $admin . "index?cal=day'>Giorni</a></li>
								<li><a href='" . $admin . "index?cal=week'>Settimane</a></li>
								<li><a href='" . $admin . "index?cal=month'>Mesi</a></li>
							</ul>
						</li>
						
						<li><a href='" . $admin . "report'>Report</a></li>
						<li><a href='" . $admin . "private'>" . $user . "</a></li>
						<li><a href='" . $admin . "login'>" . $log . "</a></li>
					</ul>
				</div>
			</nav>";
}


function printHeader()
{
    echo "<meta charset='utf-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
		<link rel='stylesheet' href='style/font-awesome/css/font-awesome.min.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js'></script>
		<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>";
}

?>