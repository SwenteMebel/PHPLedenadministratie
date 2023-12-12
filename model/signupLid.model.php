<?php
include_once "../controller/functions.php";
include_once "../controller/signupLid.cont.php";


class SignUpLidMod extends DBConnect {

    

    public function __construct()
    {
        
    }



    public function Signuplid(){

        if (isset($_SESSION['user'])) destroySession();

        if(isset($_POST['naam']) && isset($_POST['email']) && isset($_POST['gb_datum']) && isset($_POST['achternaam'])){

            $naam = sanitiseString($_POST['naam']);
            $achternaam = sanitiseString($_POST['achternaam']);
            $email = sanitiseString($_POST['email']);
            $gb_datum = sanitiseString($_POST['gb_datum']);

        
            SignupLidCont::validateEmail($email);
            SignupLidCont::familieCheck($achternaam);
            $famID = SignupLidCont::getfamID($achternaam);
            $leeftijd = leetijdCalculatie($gb_datum);
            $role = roleSet($leeftijd);
            $contributie = SignupLidCont::contributieBedrag($leeftijd);
            $date = date('Y-m-d');
            
        
            //voegt de gemaakte lid toe aan lid table
            $stmt = $this->pdo->prepare("INSERT INTO lid VALUES(NULL, ?,?,?,?,?,?)");
            $stmt->bindParam(1, $naam, PDO::PARAM_STR, 255);
            $stmt->bindParam(2, $famID, PDO::PARAM_INT, 100);
            $stmt->bindParam(3, $email, PDO::PARAM_STR, 255);
            $stmt->bindParam(4, $gb_datum, PDO::PARAM_INT, 20);
            $stmt->bindParam(5, $role, PDO::PARAM_STR, 50);
            $stmt->bindParam(6, $date, PDO::PARAM_INT, 50);

            $stmt->execute([$naam, $famID, $email, $gb_datum, $role, $date]);
            $stmt = NULL;
            // voegt de gemaatke lid toe aan contributie table
            $lidID = SignupLidCont::getLidID($email);
            
            $stmt1= $this->pdo->prepare("INSERT INTO contributie VALUES(NULL, ?,?,?)");
            $stmt1->bindParam(1, $lidID, PDO::PARAM_INT, 100);
            $stmt1->bindParam(2, $role, PDO::PARAM_INT, 50);
            $stmt1->bindParam(3, $contributie, PDO::PARAM_INT, 200);
        
            $stmt1->execute([$lidID, $role, $contributie]);

            header('Location: ../view/leden.php');
            
        }

    }
    



}