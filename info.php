<?php
include("script/recursive.php");

//info?utente=" . $book['utente'] . "&aula=" . $book['aula'] . "&dettagli=" . $book['dettagli'] . "&inizio=" . $book['inizio'] . "&fine=" . $book['fine'] . "'

$utente = $_REQUEST['utente'];
$aula = $_REQUEST['aula'];
$dettagli = $_REQUEST['dettagli'];
$inizio = $_REQUEST['inizio'];
$fine = $_REQUEST['fine'];

?>

<html>
<head>
    <title>
        Informazioni
    </title>
    <?php printHeader(); ?>
</head>

<body>
<!--- header --->
<?php printNavbar(false); ?>

<br>

<!--- body --->

<!--- create booking --->
<div class="container">
    <h1>Prenotazione</h1><br>

    <div class="row form-group">
        <div class="col-sm-2">
            <label for="aula">Aula: </label>
        </div>
        <div class="col-sm-4">
            <?php

            $result = rooms();

            if (isset($result) && $result != null) {
                while ($row = $result->fetch_assoc()) {
                    if ($row['numero'] == $aula) echo $row["nome"] . " Tipo: " . $row["type"];
                }
            }

            ?>
        </div>
        <div class="col-sm-2">
            <label for="date">Data: </label>
        </div>
        <div class="col-sm-4">
            <?php echo date("Y-m-d", strtotime($_REQUEST['inizio'])); ?>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-sm-2">
            <label for="descrizione">Descrizione: </label>
        </div>
        <div class="col-sm-4">
            <?php echo $dettagli; ?>
        </div>
        <div class="col-sm-2">
            <label for="descrizione">Creatore: </label>
        </div>
        <div class="col-sm-4">
            <?php

            $result = users();

            if (isset($result) && $result != null) {
                while ($row = $result->fetch_assoc()) {
                    if ($row['username'] == $utente) echo $row['nome'];
                }
            }

            ?>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-sm-2">
            <label for="orai">Ora inizio: </label>
        </div>
        <div class="col-sm-4">
            <?php echo date("H:i", strtotime($_REQUEST['inizio'])); ?>
        </div>
        <div class="col-sm-2">
            <label for="oraf">Ora fine: </label>
        </div>
        <div class="col-sm-4">
            <?php echo date("H:i", strtotime($_REQUEST['fine'])); ?>
        </div>
    </div>
</div>

</body>
</html>