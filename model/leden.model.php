<?php
include_once "../controller/functions.php";

$query = 'SELECT * FROM gebruiker';
$result = $pdo->query($query);

if(isset($_POST['delete']) && isset($_POST['id'])){
    $idDB = htmlspecialchars($_POST['id']);
    $query = "DELETE FROM gebruiker WHERE id = $idDB";
    $result = queryMysql($query);

    header('Location: ../view/leden.php');
}

