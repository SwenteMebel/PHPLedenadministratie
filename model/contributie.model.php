<?php
include_once "../controller/functions.php";
include_once "../controller/contributie.cont.php";

class ContributieModel extends DBConnect {

    public $opzetcontributie;

    public function queryCont(){
        $this->opzetcontributie = $this->pdo->query( "SELECT * FROM lid JOIN familie ON lid.id_familie= familie.id_familie JOIN soort ON lid.id_soort = soort.id_soort;");
    }
    
    public function getCont(){
        return $this->opzetcontributie;
    }
   



}
    
   




?>