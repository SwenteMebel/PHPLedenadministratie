<?php

class loginCont {

    public static function emptycheck(){
        if (empty($_POST['naam']) || empty($_POST['wachtwoord'])){
            session_start(); 
            $_SESSION['message'] [] = "De velden zijn niet juist ingevuld";
            header("Location: ../view/login.php");
            exit();
        }
    }

}
