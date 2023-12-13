<?php
include_once "../controller/functions.php";
include_once "../controller/signupUser.cont.php";

class signupUserMod extends DBConnect{


    public function signupuser(){
        signupUserCont::emptycheck();
        if (isset($_SESSION['user'])) functions::destroySession();

        if(isset($_POST['naam']) && isset($_POST['wachtwoord'])){
            $naam = $_POST['naam'];
            $wachtwoord = $_POST['wachtwoord'];
            $wachtwoord_repeat = $_POST['wachtwoordrep'];
            
            signupUserCont::validateWachtwoord($wachtwoord, $wachtwoord_repeat);
    
            $hashpw = password_hash($wachtwoord, PASSWORD_DEFAULT);
    
            $stmt = $this->pdo->prepare('INSERT INTO user VALUES(NULL, ?,?)');
            $stmt->bindParam(1, $naam, PDO::PARAM_STR, 255);
            $stmt->bindParam(2, $hashpw, PDO::PARAM_STR, 255);
        
                
            $stmt->execute([$naam, $hashpw]);
            $stmt = NULL;
            header('Location: ../view/leden.php');
            
        }
    }
   
}

