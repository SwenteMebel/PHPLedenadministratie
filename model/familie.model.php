<?php
include_once "../controller/functions.php";

class familieModel extends DBConnect {
    public $resultfam;
    


    public function queryFam(){
        $this->resultfam = $this->pdo->query('SELECT * FROM familie');
       
    }
    public function getResultFam(){
        return $this->resultfam;
    }

    public function deleteFam(){

        if(isset($_POST['delete']) && isset($_POST['idfam'])){
            $idDB = htmlspecialchars($_POST['idfam']);
        
            $query = "SELECT * FROM lid WHERE id_familie = $idDB"; 
            $result = $this->pdo->prepare($query);
            $result->execute();
            $count = $result->rowCount();
        
            if($count > 0 ){
                session_start(); 
                $_SESSION['message'] [] = "Verwijder eerst de leden van de familie.";
                header("Location: ../view/leden.php");
                exit();
            } else{
                $query = "DELETE FROM familie WHERE id_familie = $idDB";
                $result = $this->pdo->prepare($query);
                $result->execute();
                session_start();
                $_SESSION['message'] [] = "Familie verwijderd.";
                header('Location: ../view/leden.php');
                die();
            }
        }
    }
}


