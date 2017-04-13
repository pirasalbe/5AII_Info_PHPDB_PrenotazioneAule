<?php
include("script/recursive.php");

if ($logged == 0) {
    header("location: login");
}
?>

<html>
<head>
    <title>
        Prenota
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
    <h1>Prenotati</h1><br>
    <form action="script/book">

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
                <input type="date" value="<?php echo $_REQUEST['data']; ?>" name="date" class="form-control">
            </div>
        </div>

        <div class="row form-group">
            <div class="col-sm-2">
                <label for="descrizione">Descrizione: </label>
            </div>
            <div class="col-sm-10">
                <input name="descrizione" class="form-control" maxlength="50">
            </div>
        </div>

        <div class="row form-group">
            <div class="col-sm-2">
                <label for="orai">Ora inizio: </label>
            </div>
            <div class="col-sm-4">
                <select name="orai" class="form-control">
                    <?php

                    foreach ($hours as $hour) {
                        $selected = "";
                        if ($hour == $_REQUEST['inizio']) $selected = "selected";
                        echo "<option value='" . $hour . "' " . $selected . ">" . $hour . "</option>";
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

                    foreach ($hours as $hour) {
                        $selected = "";
                        if ($hour == $_REQUEST['fine']) $selected = "selected";
                        echo "<option value='" . $hour . "' " . $selected . ">" . $hour . "</option>";
                    }

                    ?>
                </select>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-sm-2">
                <button type="submit" class="form-control">
                    Richiedi
                </button>
            </div>
        </div>
    </form>
</div>

</body>
</html>