<?php include_once "layout/header.php";?>
<?php include "../controller/functions.php";?>
<?php include "../model/login.model.php";?>



<form class='form' method='post' action='../model/login.model.php'>
<h1>Login</h1>
<?php include "../controller/errormsg.php";?>
<br>
<label>Gebruikersnaam:</label>
<input type="text" name="naam" placeholder='gebruikersnaam'><br>
<label>Wachtwoord:</label>
<input type='password' name='wachtwoord' placeholder='wachtwoord' ><br><br>

<input type='submit' value='Login'>
</form>



<?php include_once "layout/footer.php";?>
