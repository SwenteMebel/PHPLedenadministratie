<?php

if(isset($_POST['naam']) || isset($_POST['email']) || isset($_POST['gb_datum']) || isset($_POST['achternaam'])){

    if($_POST['naam']){
        //update de leden naam
        $updateLid = sanitiseString($_POST['naam']);
        //Update lid naam in lid table
        $queryLid = "UPDATE lid SET naam_lid = '$updateLid' WHERE id_lid = '$id';";
        $resultLid = queryMysql($queryLid);
        // update lid naam in contributie table
        $contquery = "UPDATE contributie SET naam_lid = '$updateLid' WHERE id_contributie = '$id';";
        $resultcont = queryMysql($contquery);

        session_start();
        $_SESSION['message'] [] = "Wijziging door gevoerd, controleer wijziging.";
        header("Location: ../view/profielLid.php?id=$id");
    }  else {
        header("Location: ../view/profielLid.php?id=$id");
    
    }

    if($_POST['achternaam']){
        //update de leden achternaam
        $updateAchternaam = sanitiseString($_POST['achternaam']);
        //update achternaam van lid table
        $queryAchternaam = "UPDATE lid SET achternaam= '$updateAchternaam' WHERE id_lid = '$id';";
        $resultAchternaam = queryMysql($queryAchternaam);
        // update achternaam naam in contributie table
        $contquery = "UPDATE contributie SET achternaam_lid = '$updateAchternaam' WHERE id_contributie = '$id';";
        $resultcont = queryMysql($contquery);

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
        $updateRole = "UPDATE lid SET soort_lid = '$role' WHERE id_lid = '$id';";
        $resultRole = queryMysql($updateRole);
        
        //contributie wijzigen in contributie table 
        $updatecontRole = "UPDATE contributie SET soort_lid = '$role' WHERE id_contributie = '$id';";
        $resultcontRole = queryMysql($updatecontRole);

        session_start();
        $_SESSION['message'] [] = "Wijziging door gevoerd, controleer wijziging.";
        header("Location: ../view/profielLid.php?id=$id");
    }   else {
        header("Location: ../view/profielLid.php?id=$id");
    }

  
}


function roleSet($leeftijd){
    $role = ['Jeugd', 'Aspirant', 'Junior', 'Senior','Oudere'];
    
    if($leeftijd < 8){
        return $role[0];
        die();
    } elseif ($leeftijd >= 8 && $leeftijd <= 12) {
       return $role[1];
       die();
    } elseif ($leeftijd >= 13 && $leeftijd <= 17 ){
        return $role[2];
        die();
    } elseif ($leeftijd >= 18 && $leeftijd <= 50) {
        return $role[3];
        die();
    } else {
      return $role[4];
      die();
    }
  }

?>