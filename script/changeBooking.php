<?php
include("sql.php");

if (isset($_REQUEST['user']))
    $user = $_REQUEST['user'];

$aula = $_REQUEST['aula'];

$stato = $_REQUEST['stato'];

$attivo = "si";
if ($stato == "si")
    $attivo = "no";

changeBooking($user, $aula, $attivo);

header("location: ../admin/booking");

?>