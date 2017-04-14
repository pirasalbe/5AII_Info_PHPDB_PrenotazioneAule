<?php
include("script/recursive.php");

if (isset($_REQUEST['ok'])) {
    $aula = "";
    if (isset($_REQUEST['aula']))
        $aula = $_REQUEST['aula'];

    $data = date("Y-m-d", strtotime("today"));
    if (isset($_REQUEST['date']))
        $data = $_REQUEST['date'];

    $orai = "00:00:01";
    if (isset($_REQUEST['orai']))
        if ($_REQUEST['orai'] != "")
            $orai = $_REQUEST['orai'];

    $oraf = "23:23:59";
    if (isset($_REQUEST['oraf']))
        if ($_REQUEST['oraf'] != "")
            $oraf = $_REQUEST['oraf'];


    $descrizione = "";
    if (isset($_REQUEST['descrizione']))
        $descrizione = $_REQUEST['descrizione'];

    $utente = "";
    if (isset($_REQUEST['utente']))
        $utente = $_REQUEST['utente'];

    $ordine = "sala";
    if (isset($_REQUEST['ordine']))
        $ordine = $_REQUEST['ordine'];

    $inizio = $data . " " . $orai;
    $fine = $data . " " . $oraf;

    $report = report($utente . "%", $descrizione . "%", $aula . "%", $inizio, $fine, $ordine);
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

<div class="container">
    <div class="page-header">
        <h1>
            Report meetings
        </h1>
    </div>

    <!--- Report form --->
    <form action="report" method="post">
        <div class="row form-group">
            <div class="col-sm-2">
                <label for="aula">Aula: </label>
            </div>
            <div class="col-sm-4">
                <select name="aula" class="form-control">
                    <?php

                    $result = rooms();

                    echo "<option value=''>Tutte</option>";

                    if (isset($result) && $result != null) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['numero'] . "'>" . $row["nome"] . " Tipo: " . $row["type"] . "</option>";
                        }
                    }

                    ?>
                </select>
            </div>
            <div class="col-sm-2">
                <label for="date">Data: </label>
            </div>
            <div class="col-sm-4">
                <input type="date" value="<?php echo date("Y-m-d", strtotime("today")); ?>" name="date"
                       class="form-control">
            </div>
        </div>

        <br>

        <div class="row form-group">
            <div class="col-sm-2">
                <label for="orai">Ora inizio: </label>
            </div>
            <div class="col-sm-4">
                <select name="orai" class="form-control">
                    <?php

                    echo "<option value=''>Tutto il giorno</option>";

                    foreach ($hours as $hour) {
                        echo "<option value='" . $hour . "' " . ">" . $hour . "</option>";
                    }

                    ?>
                </select>
            </div>
            <div class="col-sm-2">
                <label for="oraf">Ora fine: </label>
            </div>
            <div class="col-sm-4">
                <select name="oraf" class="form-control">
                    <?php

                    echo "<option value=''>Tutto il giorno</option>";

                    foreach ($hours as $hour) {
                        echo "<option value='" . $hour . "' " . ">" . $hour . "</option>";
                    }

                    ?>
                </select>
            </div>
        </div>

        <br>

        <div class="row form-group">
            <div class="col-sm-2">
                <label for="descrizione">Descrizione: </label>
            </div>
            <div class="col-sm-4">
                <input name="descrizione" class="form-control" maxlength="50">
            </div>
            <div class="col-sm-2">
                <label for="utente">Creato da: </label>
            </div>
            <div class="col-sm-4">
                <select name="utente" class="form-control">
                    <?php

                    $result = users();

                    echo "<option value=''>Tutti</option>";

                    if (isset($_SESSION['user']))
                        echo "<option value='" . $_SESSION['user'] . "' " . ">Me</option>";

                    if (isset($result) && $result != null) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["username"] . "' " . ">" . $row["nome"] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </div>

        <br>

        <div class="row form-group">
            <div class="col-sm-2">
                <label for="ordine">Ordina per: </label>
            </div>
            <div class="col-sm-2">
                <label class="radio-inline">
                    <input type="radio" name="ordine" value="aula" checked>Sala
                </label>
            </div>
            <div class="col-sm-2">
                <label class="radio-inline">
                    <input type="radio" name="ordine" value="inizio">Data
                </label>
            </div>
        </div>

        <br>

        <div class="row form-group">
            <div class="col-sm-2">
                <button type="submit" name="ok" class="btn btn-default">Report</button>
            </div>
        </div>

    </form>

    <!--- Risultati report --->
    <?php
    $result = array();

    if (isset($report) && $report != null) {
        while ($row = $report->fetch_assoc()) {
            array_push($result, $row);
        }

        echo "<br><br><h1>Risultati </h1>";
    }

    $aula = -1;
    $date = -1;
    foreach ($result as $row) {
        if ($ordine == "aula") {
            if ($row['aula'] != $aula) {
                echo "<h2> Aula " . $row['aula'] . ": " . $row['nome'] . "</h2>";
                $aula = $row['aula'];
            }
        } else {
            if (date("Y-m-d", strtotime($row['inizio'])) != $date) {
                echo "<h2> Giorno " . date("Y-m-d", strtotime($row['inizio'])) . "</h2>";
                $date = date("Y-m-d", strtotime($row['inizio']));
            }
        }

        echo "<hr><b>Inizio:</b> " . $row['inizio'] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "<b>Fine:</b> " . $row['fine'] . "<br><br>";

        if ($ordine == "inizio")
            echo "<b>Aula:</b> " . $row['aula'] . ": " . $row['nome'] . "<br><br>";


        echo "<b>Dettagli:</b> " . $row['dettagli'] . "<br><br>";

        echo "<a href='info?utente=" . $row['utente'] . "&aula=" . $row['aula'] . "&dettagli=" . $row['dettagli'] . "&inizio=" . $row['inizio'] . "&fine=" . $row['fine'] . "'>Informazioni <i class='fa fa-address-card-o' aria-hidden='true'></i></a>";
    }

    ?>

</div>
</body>
</html>