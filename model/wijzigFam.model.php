<?php
include_once "../controller/functions.php";


$id = $_GET['id'];
$queryFam = "SELECT * FROM familie WHERE id_familie = '$id';";
$opzetFam = queryMysql($queryFam);
$resultFam = $opzetFam->fetch();
$familie = $resultFam['naam_familie'];
$adres = $resultFam['adres'];
$postcode = $resultFam['postcode'];

include_once "../controller/wijzigFam.cont.php";
$queryFam = NULL;
exit();
?>