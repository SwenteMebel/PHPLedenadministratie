<?php
include_once "../controller/functions.php";

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
        $this->leeftijd = $result['leeftijd'];
        $this->soort_lid = $result['soort_lid'];
        $this->achternaam = $result['achternaam'];
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
                $updateAchternaam = sanitiseString($_POST['achternaam']);
                //update id_familie van lid table
                $queryNieuwFamid = "SELECT id_familie AS id FROM familie WHERE naam_familie = '$updateAchternaam';";
                $getNieuwFamid = queryMysql($queryNieuwFamid);
                $nieuwID = $getNieuwFamid->fetch(PDO::FETCH_ASSOC);
                $queryAchternaam = "UPDATE lid SET id_familie = '$nieuwID[id]' WHERE id_lid = '$id';";
                $resultAchternaam = queryMysql($queryAchternaam);

                session_start();
                $_SESSION['message'] [] = "Wijziging door gevoerd, controleer wijziging.";
                header("Location: ../view/profielLid.php?id=$id");
            }  else {
                header("Location: ../view/profielLid.php?id=$id");
            
            }

            if($_POST['email']){
                //update email van het lid en controlleert of die nog niet bestaad
                $updateEmail = sanitiseString($_POST['email']);
                $checkEmail = "SELECT * FROM lid WHERE email = '$updateEmail';";
                $check = queryMysql($checkEmail);
                $count = $check->rowCount();
                if($count > 0 ){
                    session_start();
                    $_SESSION['message'] [] = "Email adres is al in gebruik.";
                    header("Location: ../view/profielLid.php?id=$id");
                } 
                $queryEmail = "UPDATE lid SET email = '$updateEmail' WHERE email = '$email'";
                $resultEmail = queryMysql($queryEmail);
                session_start();
                $_SESSION['message'] [] = "Wijziging door gevoerd, controleer wijziging.";
                header("Location: ../view/profielLid.php?id=$id");
            }   

            if($_POST['gb_datum']){
                //wijzigt geboorte datum
                $updateGbDatum = sanitiseString($_POST['gb_datum']);
                $queryDatum = "UPDATE lid SET gb_datum = '$updateGbDatum' WHERE id_lid = '$id'";
                $resultDatum = queryMysql($queryDatum);
                
            ///berekend de leeftijd na de datum wijziging. 
                $huidigDate = Date("Y-m-d");
                $leeftijdberekening = date_diff(date_create($updateGbDatum), date_create($huidigDate));
                $leeftijd = $leeftijdberekening->format('%y');
                
                
            
                //wijzigt soort lid als leeftijd wijzigd.
                $role = roleSet($leeftijd);
                $getRole = "SELECT id_soort AS id FROM soort WHERE soort = '$role';";
                $getroleid = queryMysql($getRole);
                $nieuwRoleID = $getroleid->fetch(PDO::FETCH_ASSOC);
                $updateRole = "UPDATE lid SET id_soort = '$nieuwRoleID[id]' WHERE id_lid = '$id';";
                $resultRole = queryMysql($updateRole);

                session_start();
                $_SESSION['message'] [] = "Wijziging door gevoerd, controleer wijziging.";
                header("Location: ../view/profielLid.php?id=$id");
            }   else {
                header("Location: ../view/profielLid.php?id=$id");
            }
        }
    }
}
