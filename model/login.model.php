<?php
include_once "../controller/functions.php";


if(isset($_POST['naam'])){
    $naam = sanitiseString($_POST['naam']);
    $wachtwoord = sanitiseString($_POST['wachtwoord']);
    

    if (empty($_POST['naam']) || empty($_POST['wachtwoord'])){
        session_start(); 
        $_SESSION['message'] [] = "De velden zijn niet juist ingevuld";
        header("Location: ../view/login.php");
        exit();
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
                exit();
            } else {
                session_start(); 
                $_SESSION['message'] [] = "Onjuist wachtwoord.";
                header("Location: ../view/login.php");
                exit();
            }    
        } else {
            session_start(); 
            $_SESSION['message'] []= "Onjuiste gebruikersnaam, probeer het opnieuw";
            header("Location: ../view/login.php");
            exit();
        }
    }
}


?>