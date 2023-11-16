<?php 
session_start()
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>LedenAdministratie Scheffer Keukens</title>

    <!--Style-->
    <link href='/css/main.css' rel='stylesheet'>
</head>

<body>
<header>
    <div >
        <ul class="navbar">
            <div class="logo">
                <img src='#' alt='Logo'>
            </div>

            <div class="navlinks">
            
                <?php
                    if(!isset( $_SESSION['id'])){
                        echo "<li><a href='login.php'>Login</a></li>";
                    } else {
                        echo "Ingelogd als $_SESSION[id]";
                        echo "<li><a href='home.php'>Home</a></li>"; 
                        echo "<li><a href='leden.php'>Leden</a></li>"; 
                        echo "<li><a href='signup.php'>Registreer</a></li>";
                        echo "<li><a href='../model/logout.model.php'>Logout</a></li>";
                    }
                ?>
    
            </div>
        </ul>  
    </div>
</header>
<main>
    <div class='container'>
  

