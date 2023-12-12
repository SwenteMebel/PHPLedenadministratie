<?php
include_once "../controller/functions.php";

$query = 'SELECT * FROM lid JOIN familie ON lid.id_familie = familie.id_familie JOIN soort ON lid.id_soort = soort.id_soort; ';
$resultlid = $pdo->query($query);

if(isset($_POST['delete']) && isset($_POST['idlid'])){
    $idDB = htmlspecialchars($_POST['idlid']);
    $query = "DELETE FROM lid WHERE id_lid = $idDB";
    $queryCont = "DELETE FROM contributie WHERE id_contributie = $idDB";
    
    $result = queryMysql($query);
    $querydb = queryMysql($queryCont);

    header('Location: ../view/leden.php');
}


