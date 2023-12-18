<?php

class DBConnect {

    protected $host = 'localhost'; // URL of IP adres van de DB
    protected $user = 'root'; // Gebruikersnaam van de DB gebruiker (admin)
    protected $pass = '';   // Wachtwoord van de DB gebruiker
    protected $dbname = 'ledenadministratie'; //DATABASE naam
    protected $chrs = 'utf8mb4';
    protected $opts = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
    protected $pdo;
    protected $attr;

    public function __construct(){
        $this->attr = "mysql:host={$this->host};dbname={$this->dbname};chrs={$this->chrs}"; 

        try{
            $this->pdo = new PDO($this->attr, $this->user, $this->pass, $this->opts);
            $this->createTableLoginUser();
            $this->createAdminUser();
            $this->createTableLid();
            $this->createTableFamilie();
            $this->createTableSoortLid();
            $this->addSoortlid();
            $this->createTableBoekjaar();
            $this->createTablecontribute();
        }
        catch (PDOException $e){
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
        
    }

    protected function createTableLoginUser(){
        $query ="CREATE TABLE IF NOT EXISTS user (
            id_user SMALLINT NOT NULL AUTO_INCREMENT,
            naam VARCHAR(255) NOT NULL,
            wachtwoord VARCHAR(255) NOT NULL,
            PRIMARY KEY (id_user))";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
    }

    protected function createAdminuser(){
        $query = "SELECT * FROM user WHERE naam = 'Admin';";
        $result = $this->pdo->prepare($query);
        $result->execute();
        $count = $result->rowCount();
      
        if($count == 0 ){
          $user = 'Admin';
          $ww = 'Admin'; 
          $hashpw = password_hash($ww, PASSWORD_DEFAULT);
      
          $stmt = $this->pdo->prepare('INSERT INTO user VALUES(NULL, ?,?)');
          $stmt->bindParam(1, $user, PDO::PARAM_STR, 255);
          $stmt->bindParam(2, $hashpw, PDO::PARAM_STR, 255);
      
          $stmt->execute([$user, $hashpw]);
        } else {
          return;
        }
    }

    protected function createTableLid(){
        $query = "CREATE TABLE IF NOT EXISTS lid (
            id_lid SMALLINT NOT NULL AUTO_INCREMENT,
            naam_lid VARCHAR(255) NOT NULL,
            id_familie SMALLINT NOT NULL,
            email VARCHAR(255) NOT NULL UNIQUE,
            gb_datum DATE NOT NULL,
            id_soort SMALLINT NOT NULL,
            aangemaakt DATE DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id_lid)
        )"; 
          $stmt = $this->pdo->prepare($query);
          $stmt->execute();
    }

    protected function createTableFamilie(){
        $query = "CREATE TABLE IF NOT EXISTS familie (
            id_familie SMALLINT NOT NULL AUTO_INCREMENT,
            naam_familie VARCHAR(255) NOT NULL UNIQUE,
            adres VARCHAR(255) NOT NULL UNIQUE,
            postcode VARCHAR(10) NOT NULL,
            PRIMARY KEY (id_familie)
        )"; 
           $stmt = $this->pdo->prepare($query);
           $stmt->execute();
    }

    protected function createTableSoortLid(){
        $query = "CREATE TABLE IF NOT EXISTS soort (
            id_soort SMALLINT NOT NULL AUTO_INCREMENT,
            soort VARCHAR(50) NOT NULL,
            leeftijd_vanaf SMALLINT(100) NOT NULL,
            leeftijd_tm SMALLINT(100) NOT NULL,
            bedrag INT(100) NOT NULL,
            PRIMARY KEY (id_soort)
        )"; 
          $stmt = $this->pdo->prepare($query);
          $stmt->execute();
    }

    protected function addSoortlid(){
        $query = "SELECT * FROM soort;";
        $result = $this->pdo->prepare($query);
        $result->execute();
        $count = $result->rowCount();
        
        if($count == 0 ){
          $query= "INSERT INTO `soort` (`id_soort`, `soort`, `leeftijd_vanaf`, `leeftijd_tm`, `bedrag`) VALUES (NULL, 'Jeugd', '0', '8', '50'), 
          (NULL, 'Aspirant', '9', '12', '60'), 
          (NULL, 'Junior', '13', '17', '75'), 
          (NULL, 'Senior', '18', '50', '100'), 
          (NULL, 'Oudere', '51', '150', '55');";
         
         $stmt = $this->pdo->prepare($query);
         $stmt->execute();
        } else {
          return; 
        }
    }

    protected function createTableBoekjaar(){
        $query = "CREATE TABLE IF NOT EXISTS boekjaar (
            id_jaar SMALLINT NOT NULL AUTO_INCREMENT,
            jaar INT(4) NOT NULL,
            bedrag_jaar BIGINT NOT NULL,
            PRIMARY KEY (id_jaar)
        )"; 
           $stmt = $this->pdo->prepare($query);
           $stmt->execute();
    }

    protected function createTablecontribute(){
        $query = "CREATE TABLE IF NOT EXISTS contributie (
            id_contributie SMALLINT NOT NULL AUTO_INCREMENT,
            id_lid SMALLINT NOT NULL, 
            id_soort SMALLINT NOT NULL, 
            bedrag INT(200) NOT NULL,
            PRIMARY KEY (id_contributie)
        )"; 
           $stmt = $this->pdo->prepare($query);
           $stmt->execute();
    }

}

$connectDB = new DBconnect();