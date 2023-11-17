<?php
include_once "../controller/functions.php";

$query = 'SELECT * FROM lid';
$result = $pdo->query($query);

if(isset($_POST['delete']) && isset($_POST['id'])){
    $idDB = htmlspecialchars($_POST['id']);
    $query = "DELETE FROM lid WHERE id_lid = $idDB";
    $result = queryMysql($query);
    

    header('Location: ../view/leden.php');
}

