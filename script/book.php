<?php
include("recursive.php");

$user = $_SESSION['user'];
$aula = $_REQUEST['aula'];
$date = date("Y-m-d", strtotime($_REQUEST['date']));
$descrizione = $_REQUEST['descrizione'];
$orai = date("H:i", strtotime($_REQUEST['orai']));
$oraf = date("H:i", strtotime($_REQUEST['oraf']));

if(orai<=oraf) header("location: ../?inizio=" . $orai . "&fine=" . $orai . "&data=" . $date . "&aula=" . $aula);

requestBooking($user, $messaggio);

header("location: ../index");

?>