<?php
include_once "../controller/functions.php";


$id = $_GET['id'];
$queryLid = "SELECT * FROM lid WHERE id_lid = '$id';";
$opzetLid = queryMysql($queryLid);
$resultLid = $opzetLid->fetch();
$lid = $resultLid['naam'];
$email = $resultLid['email'];
$gb_datum = $resultLid['gb_datum'];
$leeftijd = $resultLid['leeftijd'];
$soort_lid = $resultLid['soort_lid'];


include_once "../controller/wijzigLid.cont.php";
$queryLid = NULL;
exit();
?>