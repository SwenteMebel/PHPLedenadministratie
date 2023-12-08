<?php
include_once "../controller/functions.php";
include_once "../controller/boekjaar.cont.php";

$querybedrag = "SELECT SUM(bedrag) FROM contributie";
$resultbedrag = queryMysql($querybedrag);
$bedrag = $resultbedrag->fetch(PDO::FETCH_ASSOC);
$getyear = date('y');

checkyear($getyear);

$stmt = $pdo->prepare("INSERT INTO boekjaar VALUES(NULL, ?,?);");
$stmt->bindParam(1, $getyear , PDO::PARAM_INT);
$stmt->bindParam(2, $bedrag, PDO::PARAM_INT);

$stmt->execute([$getyear, $bedrag]);

$query = "SELECT * FROM boekjaar";
$result = queryMysql($query);



