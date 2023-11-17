<?php

function familiecheck($naam){
    $query = "SELECT naam FROM familie WHERE naam = '$naam';";
    $result = queryMysql($query);
    $count = $result->rowCount();

     if($count > 0){
        session_start(); 
            $_SESSION['message'] []= "Familie naam bestaat al.";
            header("Location: ../view/signupFam.php");
            exit();
     } else {
        return; 
     }

}


function adrescheck($adres){
    $query = "SELECT adres FROM familie WHERE naam = '$adres';";
    $result = queryMysql($query);
    $count = $result->rowCount();

     if($count > 0){
        session_start(); 
            $_SESSION['message'] []= "Adres bestaat al.";
            header("Location: ../view/signupFam.php");
            exit();
     } else {
        return; 
     }
}
?>