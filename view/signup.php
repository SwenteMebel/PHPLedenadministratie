<?php include_once "layout/header.php";?>
<?php include_once "../controller/functions.php";?>


<?php include_once "../controller/errormsg.php";?>

<form class='form'method='post' action='../model/signup.model.php'>
<?php include_once "../controller/errormsg.php";?>
<label for='naam'>Voornaam:</label><br>
<input type="text" name="naam" placeholder='Gebruikersnaam' ><br>
<label for='email'>Email:</label><br>
<input type='email' name='email' placeholder='Email' ><br>
<label for='functie'>Functie:</label><br>
<select name='selectOption'>
    <option value='monteur'>Monteur</option>
    <option value='administratie' selected>Administratie</option>
    <option value='verkoper'>Verkoper</option>
</select><br>
<label for='wachtwoord'>Wachtwoord:</label><br>
<input type='password' name='wachtwoord' placeholder='Wachtwoord'><br>
<label for='herhaal_wachtwoord'>Herhal Wachtwoord:</label><br>
<input type='password' name='wachtwoordrep' placeholder='Hehaal wachtwoord' ><br><br>
<input type='submit' value='Bevestigen'>
</form>


<?php include_once "layout/footer.php";?>


