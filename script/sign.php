<?php
include("recursive.php");

$user = $_REQUEST['username'];
$pass = $_REQUEST['password'];
$ripeti = $_REQUEST['ripeti'];
$name = $_REQUEST['name'];

if ($pass == $ripeti)
    signup($user, hash("sha256", $pass), $name);

header("location: ../login?sign=si");

?>