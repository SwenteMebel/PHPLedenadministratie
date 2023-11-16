<?php
include_once "functions.php";

// Controlleerd of alles is ingevuld dat ingevuld moet worden
if(empty($_POST['wachtwoord']) || empty($_POST['naam']) || empty($_POST['email'])){
    session_start();
    $_SESSION['message'][] = "Niet alle velden zijn ingevuld!";
    header('Location: ../view/signup.php');
    exit();
}

// Controlleerd of de Email al bestaad
function validateEmail($email){
    $queryEmail = queryMysql("SELECT email FROM gebruiker WHERE email = '$email' ;");
    $result = $queryEmail->fetch(PDO::FETCH_ASSOC);
    $emailval = $result['email'];
    
    if($emailval === $email){
        session_start();
        $_SESSION['message'][] = "Gebruik een andere Email, deze is al in gebruik";
        header('Location: ../view/signup.php');
        exit();
    } else {
        return;
    }
}

// Controlleerd of de wachtwoorden overeen komen.
function validateWachtwoord($wachtwoord, $wachtwoord_repeat){
    if ($wachtwoord === $wachtwoord_repeat){
        return;
    }   else {
        session_start();
        $_SESSION['message'][] = "Wachtwoorden komen niet overeen, probeer het opnieuw.";
        header('Location: ../view/signup.php');
        exit();
    }

    function gebruikerAangemaakt(){
        session_start();
        $_SESSION['message'][] = "Gebruiker is aangemaakt.";
        header('Location: ../view/leden.php');
        exit();
    }
}

?>