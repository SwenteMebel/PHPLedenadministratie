<?php


// Controlleerd of de Email al bestaad
function validateEmail($email){
    $queryEmail = queryMysql("SELECT email FROM lid WHERE email = '$email' ;");
    $result = $queryEmail->fetch(PDO::FETCH_ASSOC);
    $emailval = $result['email'];
    
    if($emailval === $email){
        session_start();
        $_SESSION['message'][] = "Gebruik een andere Email, deze is al in gebruik";
        header('Location: ../view/signupLid.php');
        exit();
    } else {
        return;
    }
}

function emptyinputs(){
    if(empty($_POST['gb_datum']) || empty($_POST['email']) || empty($_POST['naam']) || empty($_POST['achternaam'])){
        session_start();
        $_SESSION['message'][] = "Velden zijn niet juist gevuld.";
        header('Location: ../view/signupLid.php');
        exit();
    }
}

function leetijdCalculatie($gb_datum){
    $inputDate = $gb_datum;
    $huidigDate = Date("Y-m-d");
    $leeftijd = date_diff(date_create($inputDate), date_create($huidigDate));
    return $leeftijd->format('%y'); 
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