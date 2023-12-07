<?php
include_once "../controller/functions.php";

$queryFam = "SELECT * FROM familie";
$resultFam = $pdo->query($queryFam);

if(isset($_POST['delete']) && isset($_POST['idfam'])){
    $idDB = htmlspecialchars($_POST['idfam']);

    
    $query = "SELECT * FROM lid WHERE id_familie = $idDB"; 
    $result = queryMysql($query);
    $count = $result->rowCount();

    if($count > 0 ){
        session_start(); 
        $_SESSION['message'] [] = "Verwijder eerst de leden van de familie.";
        header("Location: ../view/leden.php");
        exit();
    } else{
        $query = "DELETE FROM familie WHERE id_familie = $idDB";
        $result = queryMysql($query);
        header('Location: ../view/leden.php');
        die();
    }

    
}
