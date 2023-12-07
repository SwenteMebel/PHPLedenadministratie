<?php


// Controlleerd of de Email al bestaad
function validateEmail($email){
    $queryEmail = queryMysql("SELECT email FROM lid WHERE email = '$email' ;");
    $result = $queryEmail->fetch();
    $emailval = $result;
    
    if($emailval === $email){
        session_start();
        $_SESSION['message'][] = "Gebruik een andere Email, deze is al in gebruik";
        header('Location: ../view/signupLid.php');
        exit();
    } else {
        return;
    }
}

function familieCheck($achternaam){
    $query = queryMysql("SELECT * FROM familie WHERE naam = '$achternaam';");
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

function emptyinputs(){
    if(empty($_POST['gb_datum']) || empty($_POST['email']) || empty($_POST['naam']) || empty($_POST['achternaam'])){
        session_start();
        $_SESSION['message'][] = "Velden zijn niet juist gevuld.";
        header('Location: ../view/signupLid.php');
        exit();
    }
}


function roleSet($leeftijd){
    if($leeftijd < 8){
        $query = "SELECT id_soort FROM soort WHERE id_soort = 1;";
        $resultQuery = queryMysql($query);
        $result = $resultQuery->fetch(PDO::FETCH_BOTH);
        return $result;
        die();
    } elseif ($leeftijd >= 8 && $leeftijd <= 12) {
        $query = "SELECT id_soort FROM soort WHERE id_soort = 2;";
        $resultQuery = queryMysql($query);
        $result = $resultQuery->fetch(PDO::FETCH_BOTH);
        return $result;
       die();
    } elseif ($leeftijd >= 13 && $leeftijd <= 17 ){
        $query = "SELECT id_soort FROM soort WHERE id_soort = 3;";
        $resultQuery = queryMysql($query);
        $result = $resultQuery->fetch(PDO::FETCH_BOTH);
        return $result;
        die();
    } elseif ($leeftijd >= 18 && $leeftijd <= 50) {
        $query = "SELECT id_soort FROM soort WHERE id_soort = 4;";
        $resultQuery = queryMysql($query);
        $result = $resultQuery->fetch(PDO::FETCH_BOTH);
        return $result;
        die();
    } else {
        $query = "SELECT id_soort FROM soort WHERE id_soort = 5;";
        $resultQuery = queryMysql($query);
        $result = $resultQuery->fetch(PDO::FETCH_BOTH);
        return $result;
        die();
    }
}


function contributieBedrag($leeftijd){

    if($leeftijd < 8){
        $query = "SELECT bedrag FROM soort WHERE id_soort = 1;";
        $resultQuery = queryMysql($query);
        $result = $resultQuery->fetch(PDO::FETCH_BOTH);
        return $result;
        die();
    } elseif ($leeftijd >= 8 && $leeftijd <= 12) {
        $query = "SELECT bedrag FROM soort WHERE id_soort = 2;";
        $resultQuery = queryMysql($query);
        $result = $resultQuery->fetch(PDO::FETCH_BOTH);
        return $result;
        die();
    } elseif ($leeftijd >= 13 && $leeftijd <= 17 ){
        $query = "SELECT bedrag FROM soort WHERE id_soort = 3;";
        $resultQuery = queryMysql($query);
        $result = $resultQuery->fetch(PDO::FETCH_BOTH);
        return $result;
       die();
    } elseif ($leeftijd >= 18 && $leeftijd <= 50) {
        $query = "SELECT bedrag FROM soort WHERE id_soort = 4;";
        $resultQuery = queryMysql($query);
        $result = $resultQuery->fetch(PDO::FETCH_BOTH);
        return $result;
       die();
    } else {
        $query = "SELECT bedrag FROM soort WHERE id_soort = 5;";
        $resultQuery = queryMysql($query);
        $result = $resultQuery->fetch(PDO::FETCH_BOTH);
        return $result;
        die();
    }
  }

function getfamID($achternaam){
    $queryFamId = "SELECT id_familie FROM familie WHERE naam = '$achternaam';";
    $result = queryMysql($queryFamId);
    $resultID = $result->fetchAll(PDO::FETCH_BOTH);
    return $resultID;
    die();
}

function getLidID($email){
    $queryLidId = "SELECT id_Lid FROM lid WHERE email = '$email';";
    $result = queryMysql($queryLidId);
    $resultID = $result->fetchAll(PDO::FETCH_BOTH);
    return $resultID;
    
}
