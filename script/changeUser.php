<?php
include("recursive.php");

if (isset($_REQUEST['user']))
    $user = $_REQUEST['user'];

$stato = $_REQUEST['stato'];

$attivo = "si";
if ($stato == "si")
    $attivo = "no";

changeUser($user, $attivo);

header("location: ../admin/users");

?>