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

$queryContributie = "SELECT * FROM contributie WHERE id_contributie = '$id';";
$opzetContributie = queryMysql($queryContributie);
$resultContributie - $opzetContributie->fetch();
$naam_lid = $resultContributie['naam_lid'];
$achternaam_lid = $resultContributie['achternaam_lid'];
$leeftijd_lid = $resultContributie['leeftijd'];
$contributie = $resultContributie['bedrag'];

include_once "../controller/wijzigLid.cont.php";
$queryLid = NULL;
exit();
?>