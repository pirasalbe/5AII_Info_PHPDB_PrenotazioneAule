<?php
include("script/sql.php");

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
                <label for="username">Username: </label>
            </div>
            <div class="col-sm-4">
                <input name="username" class="form-control" maxlength="20">
            </div>
            <div class="col-sm-2">
                <label for="password">Password: </label>
            </div>
            <div class="col-sm-4">
                <input name="password" class="form-control" maxlength="20">
            </div>
        </div>

        <div class="row form-group">
            <div class="col-sm-2">
                <label for="name">Nome: </label>
            </div>
            <div class="col-sm-4">
                <input name="name" class="form-control" maxlength="20">
            </div>
            <div class="col-sm-2">
                <label for="admin">Admin: </label>
            </div>
            <div class="col-sm-1 checkbox">
                <input name="admin" value="si" type="checkbox" maxlength="20">
            </div>
            <div class="col-sm-2">
                <label for="attivo">Attivo: </label>
            </div>
            <div class="col-sm-1 checkbox">
                <input name="attivo" value="si" type="checkbox" maxlength="20">
            </div>
        </div>

        <br>

        <div class="row form-group">
            <div class="col-sm-4">
                <button type="submit" class="form-control">
                    Aggiungi/Aggiorna
                </button>
            </div>
        </div>
    </form>
</div>

</body>
</html>