<?php
include_once "../controller/functions.php";

if (isset($_SESSION['user'])) destroySession();

if(isset($_POST['naam']) && isset($_POST['email']) && isset($_POST['wachtwoord'])){
    $naam = $_POST['naam'];
    $email =  $_POST['email'];
    $wachtwoord = $_POST['wachtwoord'];

    $hashpw = password_hash($wachtwoord, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare('INSERT INTO gebruiker VALUES(NULL, ?,?,?)');
    $stmt->bindParam(1, $naam, PDO::PARAM_STR, 20);
    $stmt->bindParam(2, $email, PDO::PARAM_STR, 50);
    $stmt->bindParam(3, $hashpw, PDO::PARAM_STR, 255);
        
    $stmt->execute([$naam, $email, $hashpw]);
    header('Location: ../view/login.php');
    die();
}