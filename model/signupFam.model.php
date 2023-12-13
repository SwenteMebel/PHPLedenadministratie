<?php
include_once "../controller/functions.php";
include_once "../controller/signupFam.cont.php";


class SignUpFamMod extends DBConnect {
    
    public function SignupFam(){
        SignupFamCont::emptycheck();
        if(isset($_POST['naam']) && isset($_POST['adres']) && isset($_POST['postcode'])){
        
            $naam = $_POST['naam'];
            $adres = $_POST['adres'];
            $postcode = $_POST['postcode'];
            
            // familie adres check
            
            SignupFamCont::adrescheck($adres, $this->pdo);
    
            $query = 'INSERT INTO familie VALUES(NULL, ?,?,?);';
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(1, $naam, PDO::PARAM_STR, 255);
            $stmt->bindParam(2, $adres, PDO::PARAM_STR, 255);
            $stmt->bindParam(3, $postcode, PDO::PARAM_STR, 10);
                
            $stmt->execute([$naam, $adres, $postcode]);
            $stmt = NULL;
            header('Location: ../view/leden.php');
            
        }
    }

   
}

