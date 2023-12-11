<?php
include_once "../controller/functions.php";
include_once "../controller/boekjaar.cont.php";

$querybedrag = "SELECT SUM(bedrag) AS total FROM contributie";
$resultbedrag = queryMysql($querybedrag);
$bedrag = $resultbedrag->fetch(PDO::FETCH_ASSOC);

$getyear = date('Y');

updateyear($pdo, $getyear, $bedrag);

$updateQuery = "UPDATE boekjaar SET bedrag_jaar = '$bedrag[total]' WHERE jaar = '$getyear';";
queryMysql($updateQuery);
$updateQuery = NULL; 

$query = "SELECT * FROM boekjaar";
$result = queryMysql($query);



