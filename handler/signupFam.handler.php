<?php
// Als er een familie wordt aangemaakt dan roept hij het volgende aan. 
include_once "../controller/functions.php";
include_once "../model/signupFam.model.php";

$signupFam = new SignUpFamMod();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $signupFam->SignupFam();
}
?>