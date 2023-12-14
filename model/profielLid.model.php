<?php
include_once "../controller/functions.php";

class profielLidMod extends DBConnect  {
    public $lidProfiel;
   

    public function queryLidprofiel($id){
   
        $query = "SELECT * FROM lid JOIN familie ON lid.id_familie = familie.id_familie JOIN soort ON lid.id_soort = soort.id_soort WHERE lid.id_lid = :id";
        $this->lidProfiel = $this->pdo->prepare($query);
        $this->lidProfiel->bindParam(':id', $id, PDO::PARAM_INT);
        $this->lidProfiel->execute();

    }

    public function getLidprofiel(){
        return $this->lidProfiel;
      
    }

}



