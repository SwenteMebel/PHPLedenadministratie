<?php
include_once "../controller/functions.php";
include_once "../controller/signupUser.cont.php";

if (isset($_SESSION['user'])) destroySession();

if(isset($_POST['naam']) && isset($_POST['wachtwoord'])){
    $naam = sanitiseString($_POST['naam']);
    $wachtwoord = sanitiseString($_POST['wachtwoord']);
    $wachtwoord_repeat = sanitiseString($_POST['wachtwoordrep']);
    
    validateWachtwoord($wachtwoord, $wachtwoord_repeat);

    $hashpw = password_hash($wachtwoord, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare('INSERT INTO user VALUES(NULL, ?,?)');
    $stmt->bindParam(1, $naam, PDO::PARAM_STR, 255);
    $stmt->bindParam(2, $hashpw, PDO::PARAM_STR, 255);
 
        
    $stmt->execute([$naam, $hashpw]);
    header('Location: ../view/leden.php');
    
}