<?php
include("recursive.php");

$user = $_REQUEST['username'];
$pass = $_REQUEST['password'];
$ripeti = $_REQUEST['ripeti'];
$name = $_REQUEST['name'];

if ($pass == $ripeti)
    signup($user, $pass, $name);

?>