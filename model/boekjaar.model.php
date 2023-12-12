<?php
include_once "../controller/functions.php";
include_once "../controller/boekjaar.cont.php";

$querybedrag = "SELECT SUM(bedrag) AS totaal FROM contributie";
$resultbedrag = queryMysql($querybedrag);
$bedrag = $resultbedrag->fetch(PDO::FETCH_ASSOC);

$getyear = date('Y');

updateyear($pdo, $getyear, $bedrag);

//controlleert elke keer als de pagina boekjaar wordt geopent of er wijzigingen zijn in het contributie bedrag
$updateQuery = "UPDATE boekjaar SET bedrag_jaar = '$bedrag[totaal]' WHERE jaar = '$getyear';";
queryMysql($updateQuery);
$updateQuery = NULL; 

$query = "SELECT * FROM boekjaar";
$result = queryMysql($query);



