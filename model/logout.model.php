<?php
session_start();
session_unset();
header('Location: ../view/home.php');

?>