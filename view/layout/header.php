<?php 
session_start()
?>

<!DOCTYPE html>
<head>
    <title>LedenAdministratie Scheffer Keukens</title>
    <link href='../css/main.css' alt='stylesheet'>
</head>

<body>
<header>
    <div class="navbar">

    <div class="logo">
        <img src='#' alt='Logo'>
    </div>
    <div class="navlinks">
    <?php
            if(!isset( $_SESSION['id'])){
                echo "<li><a href='login.php'>Login</a></li>";
            } else {
                echo "Ingelogd als $_SESSION[id]";
                echo "<li><a href='#'>Leden</a></li>"; 
                echo "<li><a href='#'>Registreer</a></li>";
                echo "<li><a href='../model/logout.model.php'>Logout</a></li>";
            }
        ?>
   
    </div>
       

    </div>
    

</header>

