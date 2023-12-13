<?php

Class SignupLidCont extends SignUpLidMod {

    
    // Controlleerd of de Email al bestaad
    public static function validateEmail($email, $pdo){
        $query = "SELECT email FROM lid WHERE email = :email ;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $emailval = $result['email'];
        
        if($emailval === $email){
            session_start();
            $_SESSION['message'][] = "Gebruik een andere Email, deze is al in gebruik";
            header('Location: ../view/signupLid.php');
            exit();
        } else {
            return;
        }
    }

    public static function familieCheck($achternaam, $pdo){
        $query = "SELECT * FROM familie WHERE naam_familie = :achternaam;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':achternaam', $achternaam);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 0){
            session_start();
            $_SESSION['message'][] = "Familie naam bestaad nog niet, maak eerst een familie aan.";
            header('Location: ../view/signupLid.php');
            exit();
        } else {
            return;
        }
    }

    public static function emptyinputs(){
        if(empty($_POST['gb_datum']) || empty($_POST['email']) || empty($_POST['naam']) || empty($_POST['achternaam'])){
            session_start();
            $_SESSION['message'][] = "Velden zijn niet juist gevuld.";
            header('Location: ../view/signupLid.php');
            exit();
        }
    }


    public static function roleSet($leeftijd, $pdo){
        if($leeftijd < 8){
            $query = "SELECT * FROM soort WHERE id_soort = 1;";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['id_soort'];
            die();
        } elseif ($leeftijd >= 8 && $leeftijd <= 12) {
            $query = "SELECT * FROM soort WHERE id_soort = 2;";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['id_soort'];
        die();
        } elseif ($leeftijd >= 13 && $leeftijd <= 17 ){
            $query = "SELECT * FROM soort WHERE id_soort = 3;";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['id_soort'];
            die();
        } elseif ($leeftijd >= 18 && $leeftijd <= 50) {
            $query = "SELECT * FROM soort WHERE id_soort = 4;";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['id_soort'];
            die();
        } else {
            $query = "SELECT * FROM soort WHERE id_soort = 5;";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['id_soort'];
            die();
        }
    }


    public static function contributieBedrag($leeftijd, $pdo){

        if($leeftijd < 8){
            $query = "SELECT * FROM soort WHERE id_soort = 1;";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['bedrag'];
            die();
        } elseif ($leeftijd >= 8 && $leeftijd <= 12) {
            $query = "SELECT * FROM soort WHERE id_soort = 2;";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['bedrag'];
            die();
        } elseif ($leeftijd >= 13 && $leeftijd <= 17 ){
            $query = "SELECT * FROM soort WHERE id_soort = 3;";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['bedrag'];
        die();
        } elseif ($leeftijd >= 18 && $leeftijd <= 50) {
            $query = "SELECT * FROM soort WHERE id_soort = 4;";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['bedrag'];
        die();
        } else {
            $query = "SELECT * FROM soort WHERE id_soort = 5;";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['bedrag'];
            die();
        }
    }

    public static function getfamID($achternaam, $pdo){
        $queryFamId = "SELECT * FROM familie WHERE naam_familie = :achternaam;";
        $stmt = $pdo->prepare($queryFamId);
        $stmt->bindParam(':achternaam', $achternaam);
        $stmt->execute();
        $resultID = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultID['id_familie'];
        die();
    }

    public static function getLidID($email, $pdo){
        $query = "SELECT * FROM lid WHERE email = :email;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $resultID = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultID['id_lid'];
        die();
    }


}