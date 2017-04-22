<?php
include("recursive.php");

$_SESSION['user'] = $_REQUEST['username'];
$_SESSION['pass'] = hash("sha256", $_REQUEST['password']);

login();

if($logged==1)
	header("location: ../index");
else
	header("location: ../login");

?>