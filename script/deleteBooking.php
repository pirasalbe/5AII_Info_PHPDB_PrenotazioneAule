<?php
include("recursive.php");

$link = $_REQUEST['link'];

if (isset($_REQUEST['user']))
    $user = $_REQUEST['user'];
else
    $user = $_SESSION['user'];
$aula = $_REQUEST['aula'];

deleteBooking($user, $aula);

if ($link == "admin") $link = "admin/booking";

header("location: ../" . $link);

?>