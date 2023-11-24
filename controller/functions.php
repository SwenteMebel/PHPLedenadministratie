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

function createTableLid(){
  $query = "CREATE TABLE IF NOT EXISTS lid (
    id_lid SMALLINT NOT NULL AUTO_INCREMENT,
    naam VARCHAR(255) NOT NULL,
    achternaam VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    gb_datum DATE NOT NULL,
    leeftijd INT(50) NOT NULL,
    soort_lid VARCHAR(50) NOT NULL,
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
    soort VARCHAR(50) NOT NULL ,
    PRIMARY KEY (id_soort)
)"; 
  queryMysql($query);
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
    leeftijd SMALLINT(100) NOT NULL,
    soortlid VARCHAR(50) NOT NULL,
    bedrag DECIMAL(20,2) NOT NULL,
    PRIMARY KEY (id_contributie)
)"; 
  queryMysql($query);
}


