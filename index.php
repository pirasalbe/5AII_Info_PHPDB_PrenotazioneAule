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

    //date
    if (isset($_REQUEST['date'])) {
        if ($_REQUEST['date'] != "")
            $_SESSION['date'] = date("D d M Y", strtotime($_REQUEST['date']));
        $inizio = $_REQUEST['date'] . " 00:00:01";
        $fine = $_REQUEST['date'] . " 23:23:59";
    }
} else if ($_SESSION['calendar'] == "week") {
    $inizio = date("Y-m-d", strtotime("monday this week")) . " 00:00:01";
    $fine = date("Y-m-d", strtotime("sunday this week")) . " 23:23:59";
    if (!isset($_SESSION['date']))
        $_SESSION['date'] = date("D d M Y", strtotime("monday this week"));

    //date
    if (isset($_REQUEST['date'])) {
        if ($_REQUEST['date'] != "")
            $_SESSION['date'] = date("D d M Y", strtotime($_REQUEST['date']));
        $inizio = date("Y-m-d", strtotime($_SESSION['date'] . "monday this week")) . " 00:00:01";
        $fine = date("Y-m-d", strtotime($_SESSION['date'] . "sunday this week")) . " 23:23:59";
    }
} else {
    $inizio = date("Y-m-d", strtotime("first day of this month")) . " 00:00:01";
    $fine = date("Y-m-d", strtotime("last day of this month")) . " 23:23:59";
    if (!isset($_SESSION['date']))
        $_SESSION['date'] = date("D d M Y", strtotime("first day of this month"));

    //date
    if (isset($_REQUEST['date'])) {
        if ($_REQUEST['date'] != "")
            $_SESSION['date'] = date("D d M Y", strtotime($_REQUEST['date']));
        $inizio = date("Y-m-1", strtotime($_SESSION['date'])) . " 00:00:01";
        $fine = date("Y-m-t", strtotime($_SESSION['date'])) . " 23:23:59";
    }
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
                        echo "<td><a href='info?utente=" . $book['utente'] . "&aula=" . $book['aula'] . "&dettagli=" . $book['dettagli'] . "&inizio=" . $book['inizio'] . "&fine=" . $book['fine'] . "'><i class='fa fa-address-card-o' aria-hidden='true'></i></a><td>";
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

        for ($i = 0; $i < 7; $i++) {
            $null = true;
            foreach ($bookings as $book) {
                if ($aula == $book['aula'])
                    if (date("Y-m-d", strtotime($date . " + " . $i . "days")) == date("Y-m-d", strtotime($book['inizio'])))
                        if (date("H:i", strtotime($book['inizio'])) <= $hour && date("H:i", strtotime($book['fine'])) >= $hours[$key + 1]) {
                            echo "<td><a href='info?utente=" . $book['utente'] . "&aula=" . $book['aula'] . "&dettagli=" . $book['dettagli'] . "&inizio=" . $book['inizio'] . "&fine=" . $book['fine'] . "'><i class='fa fa-address-card-o' aria-hidden='true'></i></a></td>";
                            $null = false;
                        }
            }

            if ($null)
                echo "<td><a href='book?inizio=" . $hour . "&fine=" . $hours[$key + 1] . "&data=" . date("Y-m-d", strtotime($inizio)) . "&aula=" . $aula . "'><i class='fa fa-plus-circle' aria-hidden='true'></i></a></td>";
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

<?php

if ($calendar == "month") {
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
                <input type='month' name='date' class='form-control'>
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
            <a href='index?date=" . date('Y-m-d', strtotime($date . "first day of previous month")) . "'>Vai al mese precedente</a>
        </div>
        <div class='col-sm-4'>
            <a href='index?date=" . date("Y-m-d", strtotime("first day of this month")) . "'>Vai al mese corrente</a>
        </div>
        <div class='col-sm-4'>
            <a href='index?date=" . date('Y-m-d', strtotime($date . "first day of next month")) . "'>Vai al prossimo mese</a>
        </div>
    </div>
</div>

<br>

<div class='container'>

<div class='table-responsive'>
    <table class='table'>
        <thead>
        <tr>";

    //days
    for ($i = 0; $i < 7; $i++)
        echo "<th>" . date("D", strtotime("Monday " . " + " . $i . "days")) . "</th>";

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

    for ($k = 1; $k <= date("t", strtotime($date)); $k++) {
        if (date("N", strtotime(date("Y-m-", strtotime($date)) . $k)) == 1)
        echo "<tr>";
        if ($k == 1)
            for ($j = 1; $j < date("N", strtotime(date("Y-m-", strtotime($date)) . $k)); $j++)
                echo "<td></td>";


                echo "<td>";

        foreach ($bookings as $book) {
            if ($aula == $book['aula']) {
                if (date("Y-m-d", strtotime(date("Y-m-", strtotime($date)) . $k)) == date("Y-m-d", strtotime($book['inizio'])))
                    echo "<a href='info?utente=" . $book['utente'] . "&aula=" . $book['aula'] . "&dettagli=" . $book['dettagli'] . "&inizio=" . $book['inizio'] . "&fine=" . $book['fine'] . "'><i class='fa fa-address-card-o' aria-hidden='true'></i></a> ";
            }
        }

        echo "<a href='book?inizio=" . $hours[0] . "&fine=" . $hours[1] . "&data=" . date("Y-m-d", strtotime($inizio)) . "&aula=" . $aula . "'><i class='fa fa-plus-circle' aria-hidden='true'></i></a></td>";

        if (date("N", strtotime(date("Y-m-", strtotime($date)) . $k)) == 7)
            echo "</tr>";
    }

    echo "</tbody>
    </table>
    </div>
    </div>";
}
?>

<!--- Legenda --->
<div class="container">

    <div class="row">
        <div class="col-sm-2 alert-success">
            Non prenotato <i class='fa fa-plus-circle' aria-hidden='true'></i>
        </div>
        <div class="col-sm-1">

        </div>
        <div class="col-sm-2 alert-info">
            Prenotato <i class='fa fa-bookmark' aria-hidden='true'></i>
        </div>
    </div>
</div>

<br>

</body>
</html>