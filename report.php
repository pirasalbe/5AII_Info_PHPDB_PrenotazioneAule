<?php
include("script/recursive.php");

if (isset($_REQUEST['ok'])) {
    $aula = "";
    if (isset($_REQUEST['aula']))
        $aula = $_REQUEST['aula'];

    $data = date("Y-m-d", strtotime("today"));
    if (isset($_REQUEST['date']))
        $data = $_REQUEST['date'];

    $orai = "";
    if (isset($_REQUEST['orai']))
        $orai = $_REQUEST['orai'];

    $oraf = "";
    if (isset($_REQUEST['oraf']))
        $oraf = $_REQUEST['oraf'];


    $descrizione = "";
    if (isset($_REQUEST['descrizione']))
        $descrizione = $_REQUEST['descrizione'];

    $utente = "";
    if (isset($_REQUEST['utente']))
        $utente = $_REQUEST['utente'];

    $ordine = "";
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
                    <input type="radio" name="ordine" value="0" checked>Sala
                </label>
            </div>
            <div class="col-sm-2">
                <label class="radio-inline">
                    <input type="radio" name="ordine" value="1">Data
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
    }

    foreach ($result as $row) {
        echo "<h1>" . $row['aula'] . "</h1>";
    }

    ?>

</div>
</body>
</html>