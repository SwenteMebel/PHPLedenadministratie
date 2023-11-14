<?php
include_once "../controller/functions.php";

if(isset($_POST['naam'])){
    $naam = sanitiseString($_POST['naam']);
    $wachtwoord = sanitiseString($_POST['wachtwoord']);
    $hashedWachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);

    if ($naam == "" || $wachtwoord == ""){
        $error = "De velden zijn niet juist ingevuld";
        echo $error;
    } else {
        
        $result = queryMysql("SELECT * FROM gebruiker WHERE naam= ?;");
        $count = $result->rowCount();

        if($count > 0 ){
            if(password_verify())
            session_start();
            $_SESSION['id'] = $naam;
            header("Location: ../view/home.php");
            exit();
        } else {
            $error = "Onjuist wachtwoord/gebruikersnaam, probeer het opnieuw";
            echo $error;
        }
    } 
}

?>