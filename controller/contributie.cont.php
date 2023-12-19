<?php
// niet geintergreerd 
// Zoekfunctie in contributie overzicht
function emptyZoekopdracht(){
    if(empty($_POST['zoekopdracht'])){
        session_start();
        $_SESSION['message'] [] = 'Kon geen zoekopdracht vinden.';
        header('Location: ../view/contributie.php');
        exit();
    }

}
   

?>