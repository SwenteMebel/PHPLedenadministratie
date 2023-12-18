<?php
include_once "../controller/functions.php";
include_once "../controller/wijzigLid.cont.php";

class wijzigLidModel extends DBConnect {

    private $wijzigLid;
    private $lid;
    private $email;
    private $gb_datum;
    private $leeftijd; 
    private $soort_lid;
    private $achternaam;
  


    public function queryLid($id)
    {
        $query = "SELECT * FROM lid JOIN familie ON lid.id_familie = familie.id_familie JOIN soort ON lid.id_soort = soort.id_soort WHERE lid.id_lid = :id;";
        $this->wijzigLid = $this->pdo->prepare($query);
        $this->wijzigLid->bindParam(':id', $id, PDO::PARAM_INT);
        $this->wijzigLid->execute();
        $result = $this->wijzigLid->fetch(PDO::FETCH_ASSOC);

        $this->lid = $result['naam_lid'];
        $this->email= $result['email'];
        $this->gb_datum = $result['gb_datum'];
      
    }

    public function wijzigingLid($id){

            
        if(isset($_POST['naam']) || isset($_POST['email']) || isset($_POST['gb_datum']) || isset($_POST['achternaam'])){

            if($_POST['naam']){
                //update de leden naam
                $updateLid = $_POST['naam'];
                //Update lid naam in lid table
                $queryLid = "UPDATE lid SET naam_lid = '$updateLid' WHERE id_lid = :id ;";
                $stmt = $this->pdo->prepare($queryLid);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
            
                session_start();
                $_SESSION['message'] [] = "Wijziging door gevoerd, controleer wijziging.";
                header("Location: ../view/profielLid.php?id=$id");
            }  else {
                header("Location: ../view/profielLid.php?id=$id");
            
            }

            if($_POST['achternaam']){
                //update de leden achternaam
                $updateAchternaam = $_POST['achternaam'];
                //update id_familie van lid table
                $queryNieuwFamid = "SELECT id_familie AS id FROM familie WHERE naam_familie = :updateAchternaam;";
                $stmt = $this->pdo->prepare($queryNieuwFamid);
                $stmt->bindParam(':updateAchternaam', $updateAchternaam);
                $stmt->execute();
                $count = $stmt->rowCount();

                if($count > 0 ){
                    $nieuwID = $stmt->fetch(PDO::FETCH_ASSOC);
                    $queryAchternaam = "UPDATE lid SET id_familie = '$nieuwID[id]' WHERE id_lid = :id;";
                    $stmt = $this->pdo->prepare($queryAchternaam);
                    $stmt->bindParam(':id', $id);
                    $stmt->execute();
    
                    session_start();
                    $_SESSION['message'] [] = "Wijziging door gevoerd, controleer wijziging.";
                    header("Location: ../view/profielLid.php?id=$id");
                } else {
                    session_start();
                    $_SESSION['message'] [] = "Familie naam bestaad nog niet, maak eerst een familie.";
                    header("Location: ../view/profielLid.php?id=$id");
                }
            }  else {
                //header("Location: ../view/profielLid.php?id=$id");
            
            }

            if($_POST['email']){
                //update email van het lid en controlleert of die nog niet bestaad
                $updateEmail = $_POST['email'];
                $checkEmail = "SELECT * FROM lid WHERE email = :updateEmail;";
                $stmt = $this->pdo->prepare($checkEmail);
                $stmt->bindParam(':updateEmail', $updateEmail);
                $stmt->execute();

                $count = $stmt->rowCount();
                if($count > 0 ){
                    session_start();
                    $_SESSION['message'] [] = "Email adres is al in gebruik.";
                    header("Location: ../view/profielLid.php?id=$id");
                } else {
                    $queryEmail = "UPDATE lid SET email = :updateEmail WHERE email = :email";
                    $stmt = $this->pdo->prepare($queryEmail);
                    $stmt->bindParam(':updateEmail', $updateEmail);
                    $stmt->bindParam(':email', $this->email);
                    $stmt->execute();
                
                    session_start();
                    $_SESSION['message'] [] = "Wijziging door gevoerd, controleer wijziging.";
                    header("Location: ../view/profielLid.php?id=$id");
                }
               
            }   

            if($_POST['gb_datum']){
                //wijzigt geboorte datum
                $updateGbDatum = $_POST['gb_datum'];
                $queryDatum = "UPDATE lid SET gb_datum = :updateGbDatum WHERE id_lid = :id;";
                $stmt = $this->pdo->prepare($queryDatum);
                $stmt->bindParam(':updateGbDatum', $updateGbDatum);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                
                
                //berekend de leeftijd na de datum wijziging. 
                $huidigDate = Date("Y-m-d");
                $leeftijdberekening = date_diff(date_create($updateGbDatum), date_create($huidigDate));
                $leeftijd = $leeftijdberekening->format('%y');
              
                //wijzigt soort lid als leeftijd wijzigd.
                $rol = wijzigLidCont::roleSet($leeftijd);
                echo " de Rol uit de functie $rol <br>";
                $getRole = "SELECT id_soort AS id FROM soort WHERE soort = :rol;";
                $stmt = $this->pdo->prepare($getRole);
                $stmt->bindParam(':rol', $rol);
                $stmt->execute();
                $nieuwRoleID = $stmt->fetch(PDO::FETCH_ASSOC)['id'];
                echo "$nieuwRoleID is het ID van role id uit de db ";
                
                $updateRole = "UPDATE lid SET id_soort = :nieuwRoleID WHERE id_lid = :id;";
                $stmt = $this->pdo->prepare($updateRole);
                $stmt->bindParam(':nieuwRoleID', $nieuwRoleID);
                $stmt->bindParam(':id', $id);
                $stmt->execute();

                session_start();
                $_SESSION['message'] [] = "Wijziging door gevoerd, controleer wijziging.";
                header("Location: ../view/profielLid.php?id=$id");
            }   else {
                header("Location: ../view/profielLid.php?id=$id");
            }
        }
    }
}
