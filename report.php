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
                <label for="datai">Data inizio: </label>
            </div>
            <div class="col-sm-4">
                <input type="date" name="datai" class="form-control">
            </div>

            <div class="col-sm-2">
                <label for="dataf">Data fine: </label>
            </div>
            <div class="col-sm-4">
                <input type="date" name="dataf" class="form-control">
            </div>
        </div>

        <br>

        <div class="row form-group">
            <div class="col-sm-2">
                <label for="area">Area: </label>
            </div>
            <div class="col-sm-4">
                <input name="area" class="form-control">
            </div>
            <div class="col-sm-2">
                <label for="stanza">Stanza: </label>
            </div>
            <div class="col-sm-4">
                <input name="stanza" class="form-control">
            </div>
        </div>

        <br>

        <div class="row form-group">
            <div class="col-sm-2">
                <label for="area">Tipo: </label>
            </div>
            <div class="col-sm-2">
                <label class="radio-inline">
                    <input type="radio" name="interno" value="0">Esterno
                </label>
            </div>
            <div class="col-sm-2">
                <label class="radio-inline">
                    <input type="radio" name="interno" value="1">Interno
                </label>
            </div>
            <div class="col-sm-2">
                <label for="autore">Creato da: </label>
            </div>
            <div class="col-sm-4">
                <input name="autore" class="form-control">
            </div>
        </div>

        <br>

        <div class="row form-group">
            <div class="col-sm-2">
                <label for="breve">Descrizione breve: </label>
            </div>
            <div class="col-sm-4">
                <input name="breve" class="form-control">
            </div>
            <div class="col-sm-2">
                <label for="completa">Descrizione completa: </label>
            </div>
            <div class="col-sm-4">
                <input name="completa" class="form-control">
            </div>
        </div>

        <br>

        <div class="row form-group">
            <div class="col-sm-2">
                <label for="area">Includi: </label>
            </div>
            <div class="col-sm-2">
                <label class="radio-inline">
                    <input type="radio" name="sommario" value="0">Solo Report
                </label>
            </div>
            <div class="col-sm-2">
                <label class="radio-inline">
                    <input type="radio" name="sommario" value="1">Solo Raggruppamento
                </label>
            </div>
            <div class="col-sm-2">
                <label class="radio-inline">
                    <input type="radio" name="sommario" value="2">Entrambi
                </label>
            </div>
        </div>

        <br>

        <div class="row form-group">
            <div class="col-sm-2">
                <label for="area">Ordina per: </label>
            </div>
            <div class="col-sm-2">
                <label class="radio-inline">
                    <input type="radio" name="ordine" value="0">Sala
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
                <label for="area">Mostra: </label>
            </div>
            <div class="col-sm-2">
                <label class="radio-inline">
                    <input type="radio" name="mostra" value="0">Durata
                </label>
            </div>
            <div class="col-sm-2">
                <label class="radio-inline">
                    <input type="radio" name="mostra" value="1">Termine
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
                    <input type="radio" name="raggruppamento" value="0">Descrizione
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