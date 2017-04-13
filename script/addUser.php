<?php
include("recursive.php");

$user = $_REQUEST['username'];
$pass = $_REQUEST['password'];
$name = $_REQUEST['name'];

if (isset($_REQUEST['admin']))
    $admin = $_REQUEST['admin'];
else
    $admin = "no";

if (isset($_REQUEST['attivo']))
    $attivo = $_REQUEST['attivo'];
else
    $attivo = "no";

addUser($user, $pass, $name, $admin, $attivo);

header("location: ../admin/users");

?>