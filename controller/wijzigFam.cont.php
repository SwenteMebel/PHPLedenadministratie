<?php


if(isset($_POST['naam']) || isset($_POST['postcode']) || isset($_POST['adres'])){
            //update familie naam.
        if(($_POST['naam'])){
            $updateFamNaam = sanitiseString($_POST['naam']);
            $updateNaam = "UPDATE familie SET naam='$updateFamNaam' WHERE naam='$familie';"; 
            $result = queryMysql($updateNaam);
            session_start();
            $_SESSION['message'] [] = "Wijziging door gevoerd, controleer wijziging.";
            header("Location: ../view/profielFam.php?id=$id");
           
        } else {
            header("Location: ../view/profielFam.php?id=$id");
            
        }
            //update postcode van familie
        if(($_POST['postcode'])){
            $updateFamPostcode = sanitiseString($_POST['postcode']);
            $updatePostcode = "UPDATE familie SET postcode='$updateFamPostcode' WHERE postcode='$postcode';";
            $result = queryMysql($updatePostcode);
            session_start();
            $_SESSION['message'] [] = "Wijziging door gevoerd, controleer wijziging.";
            header("Location: ../view/profielFam.php?id=$id");
           
        } else {
            header("Location: ../view/profielFam.php?id=$id");
        }
        
 
        if(($_POST['adres'])){
            $updateFamAdres = sanitiseString($_POST['adres']);
            $updateAdres = "UPDATE familie SET adres='$updateFamAdres' WHERE adres='$adres';";
            $result = queryMysql($updateAdres);
    
            session_start();
            $_SESSION['message'] [] = "Wijziging door gevoerd, controleer wijziging.";
            header("Location: ../view/profielFam.php?id=$id");
            
        } else {
            header("Location: ../view/profielFam.php?id=$id");
          
        }

    header("Location: ../view/profielFam.php?id=$id");
    exit();
} 



