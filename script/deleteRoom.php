<?php
include("recursive.php");

$nr = $_REQUEST['numero'];

deleteRoom($nr);

header("location: ../admin/rooms");

?>