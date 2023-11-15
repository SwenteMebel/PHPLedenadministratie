
<?php
include_once "../controller/functions.php";

$query = "SELECT * FROM gebruiker WHERE id = '$_POST[id]'";;
$result = $pdo->query($query);

if(isset($_POST['wijzig']) && isset($_POST['id'])){
    $idDB = htmlspecialchars($_POST['id']);
    $query = "SELECT * FROM gebruiker WHERE id = $idDB";
    $result = queryMysql($query);
    

    header('Location: ../view/profiel.php');
}

