<?php


Class SignupLidCont extends SignUpLidMod {

    
    // Controlleerd of de Email al bestaad
    public static function validateEmail($email){
        $queryEmail = queryMysql("SELECT email FROM lid WHERE email = '$email' ;");
        $result = $queryEmail->fetch();
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

    public static function familieCheck($achternaam){
        $query = queryMysql("SELECT * FROM familie WHERE naam_familie = '$achternaam';");
        $count = $query->rowCount();
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


    public static function roleSet($leeftijd){
        if($leeftijd < 8){
            $query = "SELECT * FROM soort WHERE id_soort = 1;";
            $resultQuery = queryMysql($query);
            $result = $resultQuery->fetch(PDO::FETCH_ASSOC);
            return $result['id_soort'];
            die();
        } elseif ($leeftijd >= 8 && $leeftijd <= 12) {
            $query = "SELECT * FROM soort WHERE id_soort = 2;";
            $resultQuery = queryMysql($query);
            $result = $resultQuery->fetch(PDO::FETCH_ASSOC);
            return $result['id_soort'];
        die();
        } elseif ($leeftijd >= 13 && $leeftijd <= 17 ){
            $query = "SELECT * FROM soort WHERE id_soort = 3;";
            $resultQuery = queryMysql($query);
            $result = $resultQuery->fetch(PDO::FETCH_ASSOC);
            return $result['id_soort'];
            die();
        } elseif ($leeftijd >= 18 && $leeftijd <= 50) {
            $query = "SELECT * FROM soort WHERE id_soort = 4;";
            $resultQuery = queryMysql($query);
            $result = $resultQuery->fetch(PDO::FETCH_ASSOC);
            return $result['id_soort'];
            die();
        } else {
            $query = "SELECT * FROM soort WHERE id_soort = 5;";
            $resultQuery = queryMysql($query);
            $result = $resultQuery->fetch(PDO::FETCH_ASSOC);
            return $result['id_soort'];
            die();
        }
    }


    public static function contributieBedrag($leeftijd){

        if($leeftijd < 8){
            $query = "SELECT * FROM soort WHERE id_soort = 1;";
            $resultQuery = queryMysql($query);
            $result = $resultQuery->fetch(PDO::FETCH_ASSOC);
            return $result['bedrag'];
            die();
        } elseif ($leeftijd >= 8 && $leeftijd <= 12) {
            $query = "SELECT * FROM soort WHERE id_soort = 2;";
            $resultQuery = queryMysql($query);
            $result = $resultQuery->fetch(PDO::FETCH_ASSOC);
            return $result['bedrag'];
            die();
        } elseif ($leeftijd >= 13 && $leeftijd <= 17 ){
            $query = "SELECT * FROM soort WHERE id_soort = 3;";
            $resultQuery = queryMysql($query);
            $result = $resultQuery->fetch(PDO::FETCH_ASSOC);
            return $result['bedrag'];
        die();
        } elseif ($leeftijd >= 18 && $leeftijd <= 50) {
            $query = "SELECT * FROM soort WHERE id_soort = 4;";
            $resultQuery = queryMysql($query);
            $result = $resultQuery->fetch(PDO::FETCH_ASSOC);
            return $result['bedrag'];
        die();
        } else {
            $query = "SELECT * FROM soort WHERE id_soort = 5;";
            $resultQuery = queryMysql($query);
            $result = $resultQuery->fetch(PDO::FETCH_ASSOC);
            return $result['bedrag'];
            die();
        }
    }

    public static function getfamID($achternaam){
        $queryFamId = "SELECT * FROM familie WHERE naam_familie = '$achternaam';";
        $result = queryMysql($queryFamId);
        $resultID = $result->fetch(PDO::FETCH_ASSOC);
        return $resultID['id_familie'];
        die();
    }

    public static function getLidID($email){
        $queryLidId = "SELECT * FROM lid WHERE email = '$email';";
        $result = queryMysql($queryLidId);
        $resultID = $result->fetch(PDO::FETCH_ASSOC);
        return $resultID['id_lid'];
        die();
    }


}