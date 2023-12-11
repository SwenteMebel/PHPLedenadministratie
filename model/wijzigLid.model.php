<?php
include_once "../controller/functions.php";


$id = $_GET['id'];
$queryLid = "SELECT * FROM lid JOIN familie ON lid.id_familie = familie.id_familie JOIN soort ON lid.id_soort = soort.id_soort WHERE lid.id_lid = $id;";
$opzetLid = queryMysql($queryLid);
$resultLid = $opzetLid->fetch();
$lid = $resultLid['naam_lid'];
$email = $resultLid['email'];
$gb_datum = $resultLid['gb_datum'];
$leeftijd = $resultLid['leeftijd'];
$soort_lid = $resultLid['soort_lid'];
$achternaam = $resultLid['naam_familie'];


include_once "../controller/wijzigLid.cont.php";
$queryLid = NULL;
exit();
?>