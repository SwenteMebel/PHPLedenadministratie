<?php

include_once "../controller/functions.php";
include_once "../model/signupUser.model.php";

$signupUser = new signupUserMod();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $signupUser->signupuser();
}
?>