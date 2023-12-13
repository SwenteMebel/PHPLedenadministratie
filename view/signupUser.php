<?php include_once "layout/header.php";?>
<?php include_once "../controller/functions.php";?>
<?php
    if(!isset($_SESSION['id'])){
        header('Location: login.php');
    } 
?>




<form class='form'method='post' action='../handler/signupUser.handler.php'>
<h1>Login user aanmaken</h1>
<?php include_once "../controller/errormsg.php";?>
<label for='naam'>Voornaam:</label><br>
<input type="text" name="naam" placeholder='Gebruikersnaam' ><br>
<label for='wachtwoord'>Wachtwoord:</label><br>
<input type='password' name='wachtwoord' placeholder='Wachtwoord'><br>
<label for='herhaal_wachtwoord'>Herhal Wachtwoord:</label><br>
<input type='password' name='wachtwoordrep' placeholder='Hehaal wachtwoord' ><br><br>
<input type='submit' value='Bevestigen'>
</form>

<?php include_once "layout/footer.php";?>


