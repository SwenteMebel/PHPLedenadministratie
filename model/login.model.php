<?php
include_once "../controller/functions.php";

if(isset($_POST['naam'])){
    $naam = sanitiseString($_POST['naam']);
    $wachtwoord = sanitiseString($_POST['wachtwoord']);


    if ($naam == "" || $wachtwoord == ""){
        $error = "De velden zijn niet juist ingevuld";
        echo $error;
    } else {
        $query = ("SELECT * FROM gebruiker WHERE naam ='$naam';");
        $result = queryMysql($query);
        $count = $result->rowCount();

        if($count > 0 ){
            $queryPW = queryMysql("SELECT wachtwoord FROM gebruiker WHERE naam = '$naam';");
            $result = $queryPW->fetch(PDO::FETCH_ASSOC);
            $hashed_pw = $result['wachtwoord'];
            if (password_verify($wachtwoord, $hashed_pw)){
                session_start();
                $_SESSION['id'] = $naam;
                header("Location: ../view/home.php");
            } else {
                $error= "Onjuist wachtwoord.";
                echo $error;
            }    
        } else {
            $error = "Onjuiste gebruikersnaam, probeer het opnieuw";
            echo $error;
           
        }
    } 
}

?>