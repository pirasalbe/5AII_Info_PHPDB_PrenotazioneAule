<?php
include("recursive.php");

$id = $_REQUEST['id'];

deleteMessage($id);

header("location: ../messages");

?>