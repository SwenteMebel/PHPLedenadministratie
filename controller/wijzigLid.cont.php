<?php

if(isset($_POST['naam']) || isset($_POST['email']) || isset($_POST['gb_datum']) || isset($_POST['selectOption'])){

    if($_POST['naam']){
        $updateLid = sanitiseString($_POST['naam']);
        $queryLid = "UPDATE lid SET naam= '$updateLid' WHERE naam = '$lid';";
        $resultLid = queryMysql($queryLid);
        session_start();
        $_SESSION['message'] [] = "Wijziging door gevoerd, controleer wijziging.";
        header("Location: ../view/profielLid.php?id=$id");
    }  else {
        header("Location: ../view/profielLid.php?id=$id");
    
    }

    if($_POST['email']){
        $updateEmail = sanitiseString($_POST['email']);
        $checkEmail = "SELECT * FROM lid WHERE email = '$updateEmail';";
        $check = queryMysql($checkEmail);
        $count = $check->rowCount();
        if($count > 0 ){
            session_start();
            $_SESSION['message'] [] = "Email adres is al in gebruik.";
            header("Location: ../view/profielLid.php?id=$id");
        } 
        $queryEmail = "UPDATE lid SET email = '$updateEmail' WHERE email = '$email';";
        $resultEmail = queryMysql($queryEmail);
        session_start();
        $_SESSION['message'] [] = "Wijziging door gevoerd, controleer wijziging.";
        header("Location: ../view/profielLid.php?id=$id");
    }   

    if($_POST['gb_datum']){
        $updateGbDatum = sanitiseString($_POST['gb_datum']);
        $queryDatum = "UPDATE lid SET gb_datum = '$updateGbDatum' WHERE gb_datum = '$gb_datum';";
        $resultDatum = queryMysql($queryDatum);
        session_start();
        $_SESSION['message'] [] = "Wijziging door gevoerd, controleer wijziging.";
        header("Location: ../view/profielLid.php?id=$id");
    }   else {
        header("Location: ../view/profielLid.php?id=$id");
    }

    if($_POST['selectOption']){
        $updateSoort = sanitiseString($_POST['selectOption']);
        $querySoort = "UPDATE lid SET soort_lid= '$updateSoort' WHERE soort_lid = '$soort_lid';";
        $resultSoort = queryMysql($querySoort);
        session_start();
        $_SESSION['message'] [] = "Wijziging door gevoerd, controleer wijziging.";
        header("Location: ../view/profielLid.php?id=$id");
    }   else {
        header("Location: ../view/profielLid.php?id=$id");
    }

}


?>