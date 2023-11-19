<?php
include_once "../controller/functions.php";

$query = 'SELECT * FROM lid';
$result = $pdo->query($query);

if(isset($_POST['delete']) && isset($_POST['idlid'])){
    $idDB = htmlspecialchars($_POST['idlid']);
    $query = "DELETE FROM lid WHERE id_lid = $idDB";
    $result = queryMysql($query);
    

    header('Location: ../view/leden.php');
}

