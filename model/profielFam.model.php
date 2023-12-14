<?php
include_once "../controller/functions.php";

class profielfamMod extends DBConnect  {
    public $famProfiel;
   

    public function queryFamprofiel($id){
   
        $query  = "SELECT * FROM familie WHERE id_familie = :id;";
        $this->famProfiel = $this->pdo->prepare($query);
        $this->famProfiel->bindParam(':id', $id, PDO::PARAM_INT);
        $this->famProfiel->execute();

    }

    public function getFamprofiel(){
        return $this->famProfiel;
      
    }

}