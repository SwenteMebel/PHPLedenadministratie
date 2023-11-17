<?php
include_once "../controller/functions.php";
include_once "../controller/signupFam.cont.php";

if (isset($_SESSION['user'])) destroySession();

if(isset($_POST['naam']) && isset($_POST['adres']) && isset($_POST['postcode'])){
    
    $naam = sanitiseString($_POST['naam']);
    $adres = sanitiseString($_POST['adres']);
    $postcode = sanitiseString($_POST['postcode']);
    
    familiecheck($naam);
    adrescheck($adres);

    $stmt = $pdo->prepare('INSERT INTO familie VALUES(NULL, ?,?,?)');
    $stmt->bindParam(1, $naam, PDO::PARAM_STR, 255);
    $stmt->bindParam(2, $adres, PDO::PARAM_STR, 255);
    $stmt->bindParam(3, $postcode, PDO::PARAM_STR, 10);
        
    $stmt->execute([$naam, $adres, $postcode]);
    header('Location: ../view/leden.php');
    
}