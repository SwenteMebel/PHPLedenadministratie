<?php include_once "layout/header.php";?>
<?php include_once "../controller/functions.php";?>


<?php include_once "../controller/errormsg.php";?>
<form method='post' action='../model/signup.model.php'>
<input type="text" name="naam" placeholder='Gebruikersnaam' ><br>
<input type='email' name='email' placeholder='Email' ><br>
<input type='password' name='wachtwoord' placeholder='Wachtwoord'><br>
<input type='password' name='wachtwoordrep' placeholder='Hehaal wachtwoord' ><br><br>
<input type='submit' value='Bevestigen'>
</form>


<?php include_once "layout/footer.php";?>


