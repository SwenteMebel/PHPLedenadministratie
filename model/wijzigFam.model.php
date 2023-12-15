<?php
include_once "../controller/functions.php";

class wijzigFamModel extends DBConnect{

    private $wijzigFam;
    private $familie;
    private $adres;
    private $postcode;

    public function queryFam($id){
        
        $query = "SELECT * FROM familie WHERE id_familie = :id;";
        $this->wijzigFam = $this->pdo->prepare($query);
        $this->wijzigFam->bindParam(':id', $id);
        $this->wijzigFam->execute();
        $resultFam = $this->wijzigFam->fetch(PDO::FETCH_ASSOC);
       
        $this->familie = $resultFam['naam_familie'];
        $this->adres = $resultFam['adres'];
        $this->postcode = $resultFam['postcode'];
    }
    
    public function wijzigingFam($id){
                
        if(isset($_POST['naam']) || isset($_POST['postcode']) || isset($_POST['adres'])){
            //update familie naam.
            if(($_POST['naam'])){
                $updateFamNaam = $_POST['naam'];
                $updateNaam = "UPDATE familie SET naam_familie = :updateFamNaam WHERE id_familie = :id;"; 
                $stmt = $this->pdo->prepare($updateNaam);
                $stmt->bindParam(':updateFamNaam', $updateFamNaam);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                
                session_start();
                $_SESSION['message'] [] = "Wijziging door gevoerd, controleer wijziging.";
                header("Location: ../view/profielFam.php?id=$id");
            
            } else {
                header("Location: ../view/profielFam.php?id=$id");
                
            }
                //update postcode van familie
            if(($_POST['postcode'])){
                $updateFamPostcode = $_POST['postcode'];
                $updatePostcode = "UPDATE familie SET postcode = :updateFamPostcode WHERE postcode = :postcode;";
                $stmt = $this->pdo->prepare($updatePostcode);
                $stmt->bindParam(':updateFamPostcode', $updateFamPostcode);
                $stmt->bindParam(':postcode', $this->postcode);
                $stmt->execute();

                session_start();
                $_SESSION['message'] [] = "Wijziging door gevoerd, controleer wijziging.";
                header("Location: ../view/profielFam.php?id=$id");
            
            } else {
                header("Location: ../view/profielFam.php?id=$id");
            }


            if(($_POST['adres'])){
                $updateFamAdres = $_POST['adres'];
                $updateAdres = "UPDATE familie SET adres = :updateFamAdres WHERE adres = :adres;";
                $stmt = $this->pdo->prepare($updateAdres);
                $stmt->bindParam(':updateFamAdres', $updateFamAdres);
                $stmt->bindParam(':adres', $this->adres);
                $stmt->execute();

                session_start();
                $_SESSION['message'] [] = "Wijziging door gevoerd, controleer wijziging.";
                header("Location: ../view/profielFam.php?id=$id");
                
            } else {
                header("Location: ../view/profielFam.php?id=$id");
            
            }

        } 
    }

}

?>