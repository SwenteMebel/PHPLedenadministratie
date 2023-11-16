<?php

Class SignUp extends DB {

    private $naam;
    private $email;
    private $wachtwoord;
    private $wachtwoord_repeat;
    private $selectOption;
    private $hashpw;
    private $pdo;

    public function __construct($naam, $email, $wachtwoord, $wachtwoord_repeat, $selectOption, $hashpw, $pdo)
    {
        $this->naam = $naam;
        $this->email = $email;
        $this->wachtwoord = $wachtwoord;
        $this->wachtwoord_repeat = $wachtwoord_repeat;
        $this->selectOption = $selectOption;
        $this->hashpw = $hashpw;
        $this->pdo = $pdo;
    }
    public function signupUser( $naam, $email, $hashpw, $selectOption){
        $query = "INSERT INTO gebruiker VALUES(NULL, ?,?,?,?);";
        $stmt = $this->getPdo()->prepare($query);
        $stmt->bindParam(1, $naam, PDO::PARAM_STR, 20);
        $stmt->bindParam(2, $email, PDO::PARAM_STR, 50);
        $stmt->bindParam(3, $hashpw, PDO::PARAM_STR, 255);
        $stmt->bindParam(4, $selectOption, PDO::PARAM_STR, 30);
            
        $stmt->execute([$naam, $email, $hashpw, $selectOption]);
        header('Location: ../view/leden.php');
    }

    

}

?>