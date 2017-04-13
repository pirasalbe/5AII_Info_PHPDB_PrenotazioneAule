<?php
include("recursive.php");

$user = $_REQUEST['username'];
$messaggio = $_REQUEST['messaggio'];

sendMessage($user, $messaggio);

header("location: ../messages");

?>