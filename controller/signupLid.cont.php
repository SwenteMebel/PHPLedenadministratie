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
    if(empty($_POST['gb_datum']) || empty($_POST['email']) || empty($_POST['naam'])){
        session_start();
        $_SESSION['message'][] = "Velden zijn niet juist gevuld.";
        header('Location: ../view/signupLid.php');
        exit();
    }
}
