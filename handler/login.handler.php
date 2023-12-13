<?php
// Als een gebruiker zich aanmeld dan roept hij de Login Class aan met de functie. 
include_once "../controller/functions.php";
include_once "../model/login.model.php";

$login = new Login();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login->login();
}
?>