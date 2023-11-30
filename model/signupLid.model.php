<?php
include_once "../controller/functions.php";
include_once "../controller/signupLid.cont.php";

if (isset($_SESSION['user'])) destroySession();

if(isset($_POST['naam']) && isset($_POST['email']) && isset($_POST['gb_datum']) && isset($_POST['achternaam'])){

    $naam = sanitiseString($_POST['naam']);
    $achternaam = sanitiseString($_POST['achternaam']);
    $email = sanitiseString($_POST['email']);
    $gb_datum = sanitiseString($_POST['gb_datum']);

    emptyinputs();
    validateEmail($email);
    familieCheck($achternaam);
    $leeftijd = leetijdCalculatie($gb_datum);
    $role = roleSet($leeftijd);
    $contributie = contributieBedrag($leeftijd);

    //voegt de gemaakte lid toe aan lid table
    $stmt = $pdo->prepare("INSERT INTO lid VALUES(NULL, ?,?,?,?,?)");
    $stmt->bindParam(1, $naam, PDO::PARAM_STR, 255);
    $stmt->bindParam(2, $achternaam, PDO::PARAM_STR, 255);
    $stmt->bindParam(3, $email, PDO::PARAM_STR, 255);
    $stmt->bindParam(4, $gb_datum, PDO::PARAM_INT, 10);
    $stmt->bindParam(5, $role, PDO::PARAM_STR, 50);

    $stmt->execute([$naam, $achternaam, $email, $gb_datum, $role]);
    
    // voegt de gemaatke lid toe aan contributie table
    $stmt1= $pdo->prepare("INSERT INTO contributie VALUES(NULL, ?,?,?,?)");
    $stmt1->bindParam(1, $naam, PDO::PARAM_STR, 255);
    $stmt1->bindParam(2, $achternaam, PDO::PARAM_STR, 255);
    $stmt1->bindParam(3, $role, PDO::PARAM_STR, 50);
    $stmt1->bindParam(4, $contributie, PDO::PARAM_INT, 100);

    $stmt1->execute([$naam, $achternaam, $role, $contributie]);


    header('Location: ../view/leden.php');
    
}