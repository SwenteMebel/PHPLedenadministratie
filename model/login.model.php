<?php
include_once "../controller/functions.php";
include_once "../controller/login.cont.php";


class Login extends DBConnect{

    public function login(){
      
        if(isset($_POST['naam'])){
            $naam = $_POST['naam'];
            $wachtwoord = $_POST['wachtwoord'];
            
            loginCont::emptycheck();

            $query = ("SELECT * FROM user WHERE naam ='$naam';");
            $result = $this->pdo->prepare($query);
            $result->execute();
            $count = $result->rowCount();
        
                if($count > 0 ){
                    $queryPW = $this->pdo->prepare("SELECT wachtwoord FROM user WHERE naam = :naam;");
                    $queryPW->bindParam(':naam', $naam);
                    $queryPW->execute();
                    $result = $queryPW->fetch(PDO::FETCH_ASSOC);
                    $hashed_pw = $result['wachtwoord'];
                    if (password_verify($wachtwoord, $hashed_pw)){
                        session_start();
                        $_SESSION['id'] = $naam;
                        header("Location: ../view/leden.php");
                        exit();
                    } else {
                        session_start(); 
                        $_SESSION['message'] [] = "Wachtwoord onjuist, probeer het opnieuw.";
                        header("Location: ../view/login.php");
                        exit();
                    }    
                    } else {
                    session_start(); 
                    $_SESSION['message'] []= "Gebruiksersnaam onjuist, probeer het opnieuw";
                    header("Location: ../view/login.php");
                    exit();
                }
        }
    }
}    





?>