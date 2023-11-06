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
            $_SESSION['naam'] = $naam;
            $_SESSION['wachtwoord'] = $wachtwoord;

            die("<div class='center'>You are now logged in. Please
             <a data-transition='slide'
               href='../view/home.php?view=$naam'>click here</a>
               to continue.</div></div></body></html>");
        }
    } 
}

?>