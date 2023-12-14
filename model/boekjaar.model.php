<?php
include_once "../controller/functions.php";
include_once "../controller/boekjaar.cont.php";

class boekjaarModel extends DBConnect {

    public $boekjaarBedrag; 
    private $tijdelijkbedrag;
    private $updateQuery;

    public function queryBoekjaar(){
        $stmt = $this->pdo->query("SELECT SUM(bedrag) AS totaal FROM contributie;");
        $bedrag = $stmt->fetch(PDO::FETCH_ASSOC);
        $bedragreslt = $bedrag['totaal'];
        $getyear = date('Y');
        boekjaarCont::updateyear($this->pdo, $getyear, $bedragreslt);
        boekjaarCont::updateBedrag($this->pdo, $getyear, $bedragreslt);
        

        $this->boekjaarBedrag = $this->pdo->query("SELECT * FROM boekjaar;");
        
    }
    
    public function getBoekjaar(){
        return $this->boekjaarBedrag;
    }
  

}





