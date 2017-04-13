<?php
include("../script/sql.php");

if ($logged == 0 || !admin()) {
    header("location: ../index");
}

//user
$user = "all";
if (isset($_REQUEST['username']))
    $user = $_REQUEST['username'];
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
<div class="container">

    <!--- Users --->
    <div class="row form-group">
        <form action="booking.php" method="post">
            <div class="col-sm-2">
                <label for="username">Utente: </label>
            </div>
            <div class="col-sm-4">
                <select name="username" class="form-control">
                    <option value="all">Tutti</option>
                    <?php

                    $result = users();

                    if (isset($result) && $result != null) {
                        while ($row = $result->fetch_assoc()) {
                            if ($user == "all" || $user == $row["username"])
                                echo "<option value='" . $row["username"] . "'>" . $row["username"] . "</option>";
                        }
                    }

                    ?>
                </select>
            </div>
            <div class="col-sm-2">
                <button type="submit" class="form-control">Seleziona</button>
            </div>
        </form>
    </div>

    <br>

    <!--- prenotazioni --->
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Utente</th>
                <th>Nr</th>
                <th>Aula</th>
                <th>Tipo</th>
                <th>Inizio</th>
                <th>Fine</th>
                <th>Attiva</th>
            </tr>
            </thead>

            <tbody>
            <?php
            $result = booking(true);

            if (isset($result) && $result != null) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
									<form action='../script/deleteBooking?user=" . $row["utente"] . "&aula=" . $row["numero"] . "&stato=" . $row["attiva"] . "&link=admin'>
										<td>" . $row["utente"] . "</td>
										<td>" . $row["numero"] . "</td>
										<td>" . $row["nome"] . "</td>
										<td>" . $row["type"] . "</td>
										<td>" . $row["inizio"] . "</td>
										<td>" . $row["fine"] . "</td>
										<td><a href='../script/changeBooking?user=" . $row["utente"] . "&aula=" . $row["numero"] . "&stato=" . $row["attiva"] . "'>" . $row["attiva"] . "</a></td>
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

    <!--- Messages --->
    <form action="../messages">
        <div class="row">
            <div class="col-sm-4">
                <input type="submit" class="btn btn-default" value="Manda un messaggio">
                <span class="badge">
						<?php

                        $result = messages();
                        $cont = 0;

                        if (isset($result) && $result != null) {
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