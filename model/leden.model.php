<?php
include_once "../controller/functions.php";

class ledenModel extends DBConnect  {
    public $resultlid;
    

    public function queryLid(){
        $this->resultlid = $this->pdo->query("SELECT * FROM lid JOIN familie ON lid.id_familie = familie.id_familie JOIN soort ON lid.id_soort = soort.id_soort;");
    }
    public function getResultLid(){
        return $this->resultlid;

    }

    public function deleteLid(){
        if(isset($_POST['delete']) && isset($_POST['idlid'])){
            $idDB = htmlspecialchars($_POST['idlid']);
            $query = "DELETE FROM lid WHERE id_lid = $idDB";
            $queryCont = "DELETE FROM contributie WHERE id_contributie = $idDB";
            
            $result = $this->pdo->prepare($query);
            $result->execute();
            $querydb = $this->pdo->prepare($queryCont);
            $querydb->execute();
    
            session_start();
            $_SESSION['message'] [] = "Gebruiker verwijderd.";
            header('Location: ../view/leden.php');
        }
      
    }

  
}



