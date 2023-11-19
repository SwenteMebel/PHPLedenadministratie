<?php
include_once "../controller/functions.php";

$queryFam = "SELECT * FROM familie";
$resultFam = $pdo->query($queryFam);

if(isset($_POST['delete']) && isset($_POST['idfam'])){
    $idDB = htmlspecialchars($_POST['idfam']);
    $query = "DELETE FROM familie WHERE id_familie = $idDB";
    $result = queryMysql($query);
    

    header('Location: ../view/leden.php');
}
