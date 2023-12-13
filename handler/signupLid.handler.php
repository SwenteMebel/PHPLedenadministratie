<?php

include_once "../controller/functions.php";
include_once "../model/signupLid.model.php";

$signupLid = new SignUpLidMod();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $signupLid->Signuplid();
}
?>