<?php
include_once "../model/db.connect.php";


function destroySession()
{
  $_SESSION=array();

  if (session_id() != "" || isset($_COOKIE[session_name()]))
    setcookie(session_name(), '', time()-2592000, '/');

  session_destroy();
}

//Queryt de database met de data
function queryMysql($query)
{
  global $pdo;
  return $pdo->query($query);
}


function sanitiseString($var)
{
  global $pdo;

  $var = strip_tags($var);
  $var = htmlentities($var);
  $var = stripslashes($var);

  $result = $pdo->quote($var);          // This adds single quotes
  return str_replace("'", "", $result); // So now remove them
}

function createTableLoginUser(){
  $query = "CREATE TABLE IF NOT EXISTS user (
    id_user SMALLINT NOT NULL AUTO_INCREMENT,
    naam VARCHAR(255) NOT NULL,
    wachtwoord VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_user)
)"; 
  queryMysql($query);
}

function createAdminUser($pdo){
  $user = 'Admin';
  $ww = 'Admin'; 
  $hashpw = password_hash($ww, PASSWORD_DEFAULT);

  $stmt = $pdo->prepare('INSERT INTO user VALUES(NULL, ?,?)');
  $stmt->bindParam(1, $user, PDO::PARAM_STR, 255);
  $stmt->bindParam(2, $hashpw, PDO::PARAM_STR, 255);

  $stmt->execute([$user, $hashpw]);
}

function createTableLid(){
  $query = "CREATE TABLE IF NOT EXISTS lid (
    id_lid SMALLINT NOT NULL AUTO_INCREMENT,
    naam VARCHAR(255) NOT NULL,
    id_familie SMALLINT NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    gb_datum DATE NOT NULL,
    soort_lid VARCHAR(50) NOT NULL,
    aangemaakt DATE DEFAULT CURRENT_TIMESTAMP,
    id_contributie SMALLINT NOT NULL,
    PRIMARY KEY (id_lid)
)"; 
  queryMysql($query);
}

function createTableFamilie(){
  $query = "CREATE TABLE IF NOT EXISTS familie (
    id_familie SMALLINT NOT NULL AUTO_INCREMENT,
    naam VARCHAR(255) NOT NULL UNIQUE,
    adres VARCHAR(255) NOT NULL UNIQUE,
    postcode VARCHAR(10) NOT NULL,
    PRIMARY KEY (id_familie)
)"; 
  queryMysql($query);
}

function createTableSoortLid(){
  $query = "CREATE TABLE IF NOT EXISTS soort (
    id_soort SMALLINT NOT NULL AUTO_INCREMENT,
    soort VARCHAR(50) NOT NULL,
  
    PRIMARY KEY (id_soort)
)"; 
  queryMysql($query);
}
function addSoortlid($pdo){
  $jeugd = 'Jeugd';
  $aspirant = 'Aspirant';
  $junior = 'Junior';
  $senior = 'Senior';
  $oudere = 'Oudere'; 
  

  $stmt = $pdo->prepare('INSERT INTO soort VALUES(NULL, ?)');
  $stmt->bindParam(1, $jeugd, PDO::PARAM_STR, 10);
  $stmt->execute([$jeugd]);

  $stmt = $pdo->prepare('INSERT INTO soort VALUES(NULL, ?)');
  $stmt->bindParam(1, $aspirant, PDO::PARAM_STR, 10);
  $stmt->execute([$aspirant]);

  $stmt = $pdo->prepare('INSERT INTO soort VALUES(NULL, ?)');
  $stmt->bindParam(1, $junior, PDO::PARAM_STR, 10);
  $stmt->execute([$junior]);

  $stmt = $pdo->prepare('INSERT INTO soort VALUES(NULL, ?)');
  $stmt->bindParam(1, $senior, PDO::PARAM_STR, 10);
  $stmt->execute([$senior]);

  $stmt = $pdo->prepare('INSERT INTO soort VALUES(NULL, ?)');
  $stmt->bindParam(1, $oudere, PDO::PARAM_STR, 10);
  $stmt->execute([$oudere]);
}



function createTableBoekjaar(){
  $query = "CREATE TABLE IF NOT EXISTS boekjaar (
    id_jaar SMALLINT NOT NULL AUTO_INCREMENT,
    jaar INT(4) NOT NULL,
    PRIMARY KEY (id_jaar)
)"; 
  queryMysql($query);
}

function createTablecontribute(){
  $query = "CREATE TABLE IF NOT EXISTS contributie (
    id_contributie SMALLINT NOT NULL AUTO_INCREMENT,
    id_soort SMALLINT NOT NULL, 
    id_lid SMALLINT NOT NULL,
    leeftijd_vanaf SMALLINT(100) NOT NULL,
    leeftijd_tm SMALLINT(100) NOT NULL,
    bedrag INT(100) NOT NULL,
    
    PRIMARY KEY (id_contributie)
)"; 
  queryMysql($query);
}


function leetijdCalculatie($gb_datum){
  $inputDate = $gb_datum;
  $huidigDate = Date("Y-m-d");
  $leeftijdberekening = date_diff(date_create($inputDate), date_create($huidigDate));   
  $leeftijd = $leeftijdberekening->format('%y');
  return $leeftijd;
}


function contributieBedrag($leeftijd){
  $contributie = 100;

  if($leeftijd < 8){
      $contributieBedrag = $contributie / 100 * 50;
      return $contributieBedrag;
      die();
  } elseif ($leeftijd >= 8 && $leeftijd <= 12) {
      $contributieBedrag = $contributie / 100 * 60;
      return $contributieBedrag;
      die();
  } elseif ($leeftijd >= 13 && $leeftijd <= 17 ){
      $contributieBedrag = $contributie / 100 * 75;
      return $contributieBedrag;
     die();
  } elseif ($leeftijd >= 18 && $leeftijd <= 50) {
      $contributieBedrag = $contributie / 100 * 100;
      return $contributieBedrag;
     die();
  } else {
      $contributieBedrag = $contributie / 100 * 55;
      return $contributieBedrag;
      die();
  }
}

