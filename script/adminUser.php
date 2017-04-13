<?php
include("sql.php");

if (isset($_REQUEST['user']))
    $user = $_REQUEST['user'];

$admin = $_REQUEST['admin'];

$attivo = "si";
if ($admin == "si")
    $attivo = "no";

adminUser($user, $attivo);

header("location: ../admin/users");

?>