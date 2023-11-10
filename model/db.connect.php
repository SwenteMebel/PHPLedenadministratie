<?php
$host = 'localhost'; // URL of IP adres van de DB
$user = 'root'; // Gebruikersnaam van de DB gebruiker (admin)
$pass = '';   // Wachtwoord van de DB gebruiker
$dbname = 'phpeindopdracht'; //DATABASE naam
$chrs = 'utf8mb4';
$attr = "mysql: host=$host;dbname=$dbname;chrs=$chrs";
$opts = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try{
    $pdo = new PDO($attr, $user, $pass, $opts);
    createDB();
    createTableUser();
}
catch (PDOException $e){
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

if(!$attr){
echo "Kon helaas geen verbinding maken met de database.";
}