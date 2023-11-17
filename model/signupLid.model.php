<?php
include_once "../controller/functions.php";
include_once "../controller/signupLid.cont.php";

if (isset($_SESSION['user'])) destroySession();

if(isset($_POST['naam']) && isset($_POST['email']) && isset($_POST['selectOption']) && isset($_POST['gb_datum'])){

    $naam = sanitiseString($_POST['naam']);
    $email = sanitiseString($_POST['email']);
    $gb_datum = sanitiseString($_POST['gb_datum']);
    $selectOption = sanitiseString($_POST['selectOption']);

    emptyinputs();
    validateEmail($email);


    $stmt = $pdo->prepare('INSERT INTO lid VALUES(NULL, ?,?,?,?)');
    $stmt->bindParam(1, $naam, PDO::PARAM_STR, 255);
    $stmt->bindParam(2, $email, PDO::PARAM_STR, 255);
    $stmt->bindParam(3, $gb_datum, PDO::PARAM_INT, 10);
    $stmt->bindParam(4, $selectOption, PDO::PARAM_STR, 50);
 
        
    $stmt->execute([$naam, $email, $gb_datum, $selectOption]);
    header('Location: ../view/leden.php');
    
}