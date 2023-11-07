<?php
include_once "../controller/functions.php";

if(isset($_POST['naam'])){
    $naam = sanitiseString($_POST['naam']);
    $wachtwoord = sanitiseString($_POST['wachtwoord']);


    if ($naam == "" || $wachtwoord == ""){
        $error = "De velden zijn niet juist ingevuld";
        echo $error;
    } else {
        $result = queryMysql("SELECT naam, wachtwoord FROM gebruiker WHERE naam='$naam' AND wachtwoord='$wachtwoord'");

        if(!$result->rowCount() == 0 ){
            $error = "Onjuist wachtwoord/gebruikersnaam, probeer het opnieuw";
            echo $error;
        } else {
            session_start();
            $_SESSION['id'] = $naam;
            header("Location: ../view/home.php");
            exit();
           
        }
    } 
}

?>