<?php
include_once "../controller/functions.php";
include_once "../controller/boekjaar.cont.php";

$querybedrag = "SELECT SUM(bedrag) FROM contributie";
$resultbedrag = queryMysql($querybedrag);
$bedrag = $resultbedrag->fetch(PDO::FETCH_ASSOC);
$getyear = date('y');

checkyear($getyear, $bedrag, $pdo);

$quryUpdate =  "UPDATE boekjaar SET bedrag_jaar = '$bedrag' WHERE bedrag_jaar = '$bedrag';";


$query = "SELECT * FROM boekjaar";
$result = queryMysql($query);



