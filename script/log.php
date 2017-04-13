<?php
include("recursive.php");

$user = $_REQUEST['username'];
$pass = $_REQUEST['password'];

login($user, $pass);

?>