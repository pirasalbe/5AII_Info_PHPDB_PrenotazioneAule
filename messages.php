<?php
include("script/recursive.php");

if ($logged == 0) {
    header("location: login");
}
?>

<html>
<head>
    <title>
        Area Riservata
    </title>
    <?php printHeader(); ?>
</head>

<body>
<!--- header --->
<?php printNavbar(false); ?>

<br>

<!--- body --->

<!--- Send new message --->
<div class="container">
    <form action="script/sendMessage">

        <div class="row form-group">
            <div class="col-sm-2">
                <label for="username">Destinatario: </label>
            </div>
            <div class="col-sm-4">
                <select name="username" class="form-control">
                    <?php

                    $result = users();

                    if (isset($result) && $result != null) {
                        while ($row = $result->fetch_assoc()) {
							if($row['attivo']=="si")
								echo "<option value='" . $row["username"] . "'>" . $row["username"] . "</option>";
                        }
                    }

                    ?>
                </select>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-sm-2">
                <label for="messaggio">Messaggio: </label>
            </div>
            <div class="col-sm-8">
                <input name="messaggio" class="form-control" maxlength="100">
            </div>
        </div>

        <div class="row form-group">
            <div class="col-sm-2">
                <button type="submit" class="form-control">
                    <i class="fa fa-paper-plane"></i> Invia
                </button>
            </div>
        </div>
    </form>
</div>

<br>

<!--- Messages --->
<div class="container">
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Data</th>
                <th>Mittente</th>
                <th>Destinatario</th>
                <th>Messaggio</th>
            </tr>
            </thead>

            <tbody>
            <?php
            $result = messages();

            if (isset($result) && $result != null) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["timestamp"] . "</td>
                            <td>" . $row['primo'] . "</td>
                            <td>" . $row["secondo"] . "</td>
                            <td>" . $row["messaggio"] . "</td>
                            <td><a href='script/deleteMessage?id=" . $row["id"] . "'>Elimina</a></td>
                        </tr>";
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>