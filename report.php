<?php
include("script/recursive.php");
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
    <form action="" method="post">
        <div class="row form-group">
            <div class="col-sm-2">
                <label for="aula">Aula: </label>
            </div>
            <div class="col-sm-4">
                <select name="aula" class="form-control">
                    <?php

                    $result = rooms();

                    if (isset($result) && $result != null) {
                        while ($row = $result->fetch_assoc()) {
                            $selected = "";
                            if ($row['numero'] == $_REQUEST['aula']) $selected = "selected";
                            echo "<option value='" . $row['numero'] . "' " . $selected . ">" . $row["nome"] . " Tipo: " . $row["type"] . "</option>";
                        }
                    }

                    ?>
                </select>
            </div>
            <div class="col-sm-2">
                <label for="date">Data: </label>
            </div>
            <div class="col-sm-4">
                <input type="date" value="<?php echo date("Y-m-d", strtotime($_REQUEST['data'])); ?>" name="date" class="form-control">
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
                <label for="autore">Creato da: </label>
            </div>
            <div class="col-sm-4">
                <select name="oraf" class="form-control">
                    <?php

                    $result = users();

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
                <label for="area">Ordina per: </label>
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
                <label for="area">Raggruppa per: </label>
            </div>
            <div class="col-sm-2">
                <label class="radio-inline">
                    <input type="radio" name="raggruppamento" value="0" checked>Descrizione
                </label>
            </div>
            <div class="col-sm-2">
                <label class="radio-inline">
                    <input type="radio" name="mostra" value="1">Creatore
                </label>
            </div>
        </div>

        <br>

        <div class="row form-group">
            <div class="col-sm-2">
                <button type="submit" class="btn btn-default">Report</button>
            </div>
        </div>

    </form>
</div>
</body>
</html>