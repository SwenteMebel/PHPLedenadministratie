<?php

class signupUserCont {
    
    // Controlleerd of alles is ingevuld dat ingevuld moet worden
    public static function emptycheck (){
        if(empty($_POST['wachtwoord']) || empty($_POST['naam'])){
            session_start();
            $_SESSION['message'][] = "Niet alle velden zijn ingevuld!";
            header('Location: ../view/signupUser.php');
            exit();
        }
    }

    // Controlleerd of de wachtwoorden overeen komen.
    public static function validateWachtwoord($wachtwoord, $wachtwoord_repeat){
        if ($wachtwoord === $wachtwoord_repeat){
            return;
        }   else {
            session_start();
            $_SESSION['message'][] = "Wachtwoorden komen niet overeen, probeer het opnieuw.";
            header('Location: ../view/signupUser.php');
            exit();
        }
    }


}



