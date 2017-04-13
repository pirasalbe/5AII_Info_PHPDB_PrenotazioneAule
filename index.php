<?php
include("script/sql.php");

$hours = array("07:45", "08:40", "09:35", "10:30",
    "11:40", "12:35", "13:30", "14:00",
    "15:00", "16:00", "17:00", "18:00",
    "18:30", "19:20", "20:10", "21:10",
    "22:00", "22:50", "23:40");

$tipo = "Attrezzatura Informatica";
if (isset($_REQUEST['tipo']))
    $tipo = $_REQUEST['tipo'];

$inizio = date("Y-m-d") . " 00:00:01";
$fine = date("Y-m-d") . " 23:23:59";
$date = date("D d M Y");
if (isset($_REQUEST['date'])) {
    $date = date("D d M Y", strtotime($_REQUEST['date']));
    $inizio = $_REQUEST['date'] . " 00:00:01";
    $fine = $_REQUEST['date'] . " 23:23:59";
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
<?php printNavbar(false); ?>

<br>

<!--- body --->

<!--- Class type --->
<div class="container navbar ">
    <ul class="nav navbar-nav list-group-item-info">
        <li class="<?php if ($tipo == "Attrezzatura Informatica") echo "alert-warning"; ?>"><a
                    href="index?tipo=Attrezzatura%20Informatica">Attrezzatura Informatica</a></li>
        <li class="<?php if ($tipo == "Aule speciali") echo "alert-warning"; ?>"><a href="index?tipo=Aule%20speciali">Aule-speciali</a>
        </li>
        <li class="<?php if ($tipo == "Piano Rialzato") echo "alert-warning"; ?>"><a href="index?tipo=Piano%20Rialzato">Piano
                Rialzato - Aule</a></li>
        <li class="<?php if ($tipo == "Primo Piano") echo "alert-warning"; ?>"><a href="index?tipo=Primo%20Piano">Primo
                Piano - Aule</a></li>
        <li class="<?php if ($tipo == "Secondo Piano") echo "alert-warning"; ?>"><a href="index?tipo=Secondo%20Piano">Secondo
                Piano - Aule</a></li>
    </ul>
</div>

<!--- Days --->
<div class="container">

    <div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
            <a href="#"><h3><?php echo $date ?></h3></a>
        </div>
        <div class="col-sm-4">
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-sm-3">
        </div>
        <form action="index">
            <div class="col-sm-3">
                <input type="date" name="date" class="form-control">
            </div>
            <div class="col-sm-3">
                <input type="submit" class="btn btn-default" value="Vai a">
            </div>
        </form>
        <div class="col-sm-3">
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-sm-4">
            <a href="index?date=<?php echo date( 'Y-m-d', strtotime( $date . ' -1 day' ) ); ?>">Vai al giorno prima</a>
        </div>
        <div class="col-sm-4">
            <a href="index?date=<?php echo date("Y-m-d"); ?>">Vai a oggi</a>
        </div>
        <div class="col-sm-4">
            <a href="index?date=<?php echo date( 'Y-m-d', strtotime( $date . ' +1 day' ) ); ?>">Vai al giorno successivo</a>
        </div>
    </div>
</div>

<!--- Weeks --->
<!--- Months --->


<!--- Calendar --->
<br>
<div class="container">

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Ora</th>
                <?php

                $rooms = array();

                //save rooms
                $result = rooms();

                if (isset($result) && $result != null) {
                    while ($row = $result->fetch_assoc()) {
                        if ($row["type"] == $tipo) {
                            echo "<th>" . $row["nome"] . "</th>";
                            array_push($rooms, $row["numero"]);
                        }
                    }
                }

                ?>
            </tr>
            </thead>

            <tbody>
            <?php

            $bookings = array();

            //save bookings
            $result = bookings($inizio, $fine, $tipo);

            if (isset($result) && $result != null) {
                while ($row = $result->fetch_assoc()) {
                    if ($row["attiva"] == "si")
                        array_push($bookings, $row);
                }
            }

            foreach ($hours as $key => $hour) {
                echo "<tr>";

                echo "<td>" . $hour . "</td>";

                foreach ($rooms as $room) {
                    $null = true;
                    foreach ($bookings as $book) {
                        if ($room == $row['aula'])
                            if ($row['inizio'] >= $hour && $row['fine'] <= $hours[$key - 1]) {
                            }
                        echo "<td>" . $row['descrizioni'] . " " . $row['utenti.nome'] . "<td>";
                        $null = false;
                    }

                    if ($null)
                        echo "<td><a href='#'><i class='fa fa-plus-circle' aria-hidden='true'></i></a></td>";
                }

                echo "</tr>";
            }

            ?>
            </tbody>
        </table>
    </div>

</div>
</div>
</body>
</html>