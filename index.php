<?php
include("script/recursive.php");

//tipo
$tipo = "Attrezzatura Informatica";
if (isset($_REQUEST['tipo']))
    $tipo = $_REQUEST['tipo'];

//visualizzazione
if (!isset($_SESSION['calendar']))
    $_SESSION['calendar'] = "day";
if (isset($_REQUEST['cal']))
    $_SESSION['calendar'] = $_REQUEST['cal'];

if ($_SESSION['calendar'] == "day") {
    $inizio = date("Y-m-d") . " 00:00:01";
    $fine = date("Y-m-d") . " 23:23:59";
    if (!isset($_SESSION['date']))
        $_SESSION['date'] = date("D d M Y");
} else if ($_SESSION['calendar'] == "week") {
    $inizio = date("Y-m-d", strtotime("monday this week")) . " 00:00:01";
    $fine = date("Y-m-d", strtotime("monday this week")) . " 23:23:59";
    if (!isset($_SESSION['date']))
        $_SESSION['date'] = date("D d M Y", strtotime("monday this week"));
} else {
    $_SESSION['calendar'] = "month";
}


//date
if (isset($_REQUEST['date'])) {
    if ($_REQUEST['date'] != "")
        $_SESSION['date'] = date("D d M Y", strtotime($_REQUEST['date']));
    $inizio = $_REQUEST['date'] . " 00:00:01";
    $fine = $_REQUEST['date'] . " 23:23:59";
}


if (!isset($_SESSION['aula']))
    $_SESSION['aula'] = "-1";
if (isset($_REQUEST['aula']))
    $_SESSION['aula'] = $_REQUEST['aula'];

$aula = $_SESSION['aula'];
$date = $_SESSION['date'];

$calendar = $_SESSION['calendar'];

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

<?php

if ($calendar == "day") {
    echo "<div class='container'>

    <div class='row'>
        <div class='col-sm-4'>
        </div>
        <div class='col-sm-4'>
            <h3>" . $date . "</h3>
        </div>
        <div class='col-sm-4'>
        </div>
    </div>

    <br>

    <div class='row'>
        <div class='col-sm-3'>
        </div>
        <form action='index''>
            <div class='col-sm-3'>
                <input type='date' name='date' class='form-control'>
            </div>
            <div class='col-sm-3'>
                <input type='submit' class='btn btn-default' value='Vai a'>
            </div>
        </form>
        <div class='col-sm-3'>
        </div>
    </div>

    <br>

    <div class='row'>
        <div class='col-sm-4'>
            <a href='index?date=" . date('Y-m-d', strtotime($date . ' -1 day')) . "'>Vai al giorno prima</a>
        </div>
        <div class='col-sm-4'>
            <a href='index?date=" . date("Y-m-d") . "'>Vai a oggi</a>
        </div>
        <div class='col-sm-4'>
            <a href='index?date=" . date('Y-m-d', strtotime($date . ' +1 day')) . "'>Vai al giorno successivo</a>
        </div>
    </div>
</div>

<br>

<div class='container'>

<div class='table-responsive'>
    <table class='table'>
        <thead>
        <tr>
            <th>Ora</th>";

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

    echo "</tr>
    </thead>

    <tbody>";

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
        if ($key + 1 >= count($hours)) continue;

        echo "<tr>";

        echo "<td>" . $hour . "</td>";

        foreach ($rooms as $room) {
            $null = true;
            foreach ($bookings as $book) {
                if ($room == $book['aula'])
                    if (date("H:i", strtotime($book['inizio'])) <= $hour && date("H:i", strtotime($book['fine'])) >= $hours[$key + 1]) {
                        echo "<td>" . $book['nome'] . ": " . $book['dettagli'] . "<td>";
                        $null = false;
                    }
            }

            if ($null)
                echo "<td><a href='book?inizio=" . $hour . "&fine=" . $hours[$key + 1] . "&data=" . date("Y-m-d", strtotime($inizio)) . "&aula=" . $room . "'><i class='fa fa-plus-circle' aria-hidden='true'></i></a></td>";
        }

        echo "</tr>";
    }

    echo "</tbody>
    </table>
    </div>
    </div>";
}
?>


<!--- Weeks --->

<?php

if ($calendar == "week") {
    echo "<div class='container navbar'>
    <ul class='nav navbar-nav list-group-item-info'>";

    //rooms
    $result = rooms();

    if (isset($result) && $result != null) {
        while ($row = $result->fetch_assoc()) {
            if ($row["type"] == $tipo) {
                $class = "";
                if ($aula == $row["numero"])
                    $class = "alert-warning";
                echo "<li class='" . $class . "''><a
                    href='index?&tipo=" . $tipo . "&aula=" . $row['numero'] . "'>" . $row['nome'] . "</a></li>";
            }
        }
    }


    echo "</ul>
</div>

<div class='container'>

    <div class='row'>
        <div class='col-sm-4'>
        </div>
        <div class='col-sm-4'>
            <h3>" . $date . "</h3>
        </div>
        <div class='col-sm-4'>
        </div>
    </div>

    <br>

    <div class='row'>
        <div class='col-sm-3'>
        </div>
        <form action='index''>
            <div class='col-sm-3'>
                <input type='week' name='date' class='form-control'>
            </div>
            <div class='col-sm-3'>
                <input type='submit' class='btn btn-default' value='Vai a'>
            </div>
        </form>
        <div class='col-sm-3'>
        </div>
    </div>

    <br>

    <div class='row'>
        <div class='col-sm-4'>
            <a href='index?date=" . date('Y-m-d', strtotime($date . "previous monday")) . "'>Vai alla settimana prima</a>
        </div>
        <div class='col-sm-4'>
            <a href='index?date=" . date("Y-m-d", strtotime("monday this week")) . "'>Vai alla settimana corrente</a>
        </div>
        <div class='col-sm-4'>
            <a href='index?date=" . date('Y-m-d', strtotime($date . "next monday")) . "'>Vai alla settimana successiva</a>
        </div>
    </div>
</div>

<br>

<div class='container'>

<div class='table-responsive'>
    <table class='table'>
        <thead>
        <tr>
            <th>Ora</th>";

    //days
    for ($i = 0; $i < 7; $i++)
        echo "<th>" . date("D d", strtotime($date . " + " . $i . "days")) . "</th>";

    echo "</tr>
    </thead>

    <tbody>";

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
        if ($key + 1 >= count($hours)) continue;

        echo "<tr>";

        echo "<td>" . $hour . "</td>";

        foreach ($rooms as $room) {
            $null = true;
            foreach ($bookings as $book) {
                if ($room == $book['aula'])
                    if (date("H:i", strtotime($book['inizio'])) <= $hour && date("H:i", strtotime($book['fine'])) >= $hours[$key + 1]) {
                        echo "<td>" . $book['nome'] . ": " . $book['dettagli'] . "<td>";
                        $null = false;
                    }
            }

            if ($null)
                echo "<td><a href='book?inizio=" . $hour . "&fine=" . $hours[$key + 1] . "&data=" . date("Y-m-d", strtotime($inizio)) . "&aula=" . $room . "'><i class='fa fa-plus-circle' aria-hidden='true'></i></a></td>";
        }

        echo "</tr>";
    }

    echo "</tbody>
    </table>
    </div>
    </div>";
}
?>

<!--- Months --->


</body>
</html>