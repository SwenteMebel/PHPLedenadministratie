<?php


// Controlleerd of alles is ingevuld dat ingevuld moet worden
if(empty($_POST['wachtwoord']) || empty($_POST['naam'])){
    session_start();
    $_SESSION['message'][] = "Niet alle velden zijn ingevuld!";
    header('Location: ../view/signupUser.php');
    exit();
}


// Controlleerd of de wachtwoorden overeen komen.
function validateWachtwoord($wachtwoord, $wachtwoord_repeat){
    if ($wachtwoord === $wachtwoord_repeat){
        return;
    }   else {
        session_start();
        $_SESSION['message'][] = "Wachtwoorden komen niet overeen, probeer het opnieuw.";
        header('Location: ../view/signupUser.php');
        exit();
    }
}


