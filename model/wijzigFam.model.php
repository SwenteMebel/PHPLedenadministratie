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
            $updateFamNaam = trim($_POST['naam'], " ");
            $updateFamAdres = trim($_POST['adres'], " ");
            $updateFamPostcode = trim($_POST['postcode'], " ");

            if(!empty($updateFamNaam) || !empty($updateFamAdres) || !empty($updateFamPostcode)){

                if(($_POST['naam'])){
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
                if(($_POST['adres']) && $_POST['postcode']){
                    
    
                    $query = "SELECT adres FROM familie WHERE adres = :adres;";
                    $stmt = $this->pdo->prepare($query);
                    $stmt->bindParam(':adres', $updateFamAdres);
                    $stmt->execute();
                    $count = $stmt->rowCount();
                    if($count > 0){
                        session_start();
                        $_SESSION['message'] [] = "Adres bestaat al.";
                        header("Location: ../view/profielFam.php?id=$id");
                    } else {
                        $updateAdres = "UPDATE familie SET adres = :updateFamAdres WHERE adres = :adres;";
                        $stmt = $this->pdo->prepare($updateAdres);
                        $stmt->bindParam(':updateFamAdres', $updateFamAdres);
                        $stmt->bindParam(':adres', $this->adres);
                        $stmt->execute();
        
                        session_start();
                        $_SESSION['message'] [] = "Wijziging door gevoerd, controleer wijziging.";
                        header("Location: ../view/profielFam.php?id=$id");
    
                        $updatePostcode = "UPDATE familie SET postcode = :updateFamPostcode WHERE postcode = :postcode;";
                        $stmt = $this->pdo->prepare($updatePostcode);
                        $stmt->bindParam(':updateFamPostcode', $updateFamPostcode);
                        $stmt->bindParam(':postcode', $this->postcode);
                        $stmt->execute();
                    }
                } else {
                    session_start();
                    $_SESSION['message'] [] = "Adres en Postcode moeten allebei gewijzigd worden.";
                    header("Location: ../view/profielFam.php?id=$id");
                }
            } else {
                session_start();
                $_SESSION['message'] [] = "Velden mogen niet leeg zijn.";
                header("Location: ../view/profielFam.php?id=$id");
            }
        } 
    }

}

?>