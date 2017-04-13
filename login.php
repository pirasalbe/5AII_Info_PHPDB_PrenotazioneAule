<?php
include("script/recursive.php");

if ($logged == 1) {
    session_destroy();
    header("location: index");
}
?>

<html>
<head>
    <title>
        Login
    </title>
    <?php printHeader(); ?>
</head>

<body>
<!--- header --->
<?php printNavbar(false); ?>

<br>

<!--- body --->

<!--- login --->
<form action="script/log.php" method="post">
    <div class="container">
        <h1>Accedi</h1><br>
        <div class="row form-group">
            <div class="col-sm-2">
                <label for="username">Username: </label>
            </div>
            <div class="col-sm-4">
                <input name="username" class="form-control">
            </div>
        </div>

        <br>

        <div class="row form-group">
            <div class="col-sm-2">
                <label for="password">Password: </label>
            </div>
            <div class="col-sm-4">
                <input type="password" name="password" class="form-control">
            </div>
        </div>

        <br>

        <div class="row form-group">
            <div class="col-sm-2">
                <button type="submit" class="btn btn-default">Log In</button>
            </div>
        </div>
    </div>

</form>

<br>

<!--- sign in --->
<form action="script/sign.php" method="post">
    <div class="container">
        <h1>Registrati</h1><br>
        <div class="row form-group">
            <div class="col-sm-2">
                <label for="username">Username: </label>
            </div>
            <div class="col-sm-4">
                <input name="username" class="form-control">
            </div>
        </div>

        <br>

        <div class="row form-group">
            <div class="col-sm-2">
                <label for="name">Nome: </label>
            </div>
            <div class="col-sm-4">
                <input name="name" class="form-control">
            </div>
        </div>

        <br>

        <div class="row form-group">
            <div class="col-sm-2">
                <label for="password">Password: </label>
            </div>
            <div class="col-sm-4">
                <input type="password" name="password" class="form-control">
            </div>
        </div>

        <br>

        <div class="row form-group">
            <div class="col-sm-2">
                <label for="ripeti">Ripeti password: </label>
            </div>
            <div class="col-sm-4">
                <input type="password" name="ripeti" class="form-control">
            </div>
        </div>

        <br>

        <div class="row form-group">
            <div class="col-sm-2">
                <button type="submit" class="btn btn-default">Sign Up</button>
            </div>
        </div>
    </div>

</form>

</body>
</html>