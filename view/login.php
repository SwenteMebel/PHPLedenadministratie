<?php include_once "layout/header.php";?>
<?php include "../controller/functions.php";?>
<?php include "../model/login.model.php";?>



<form method='post' action='../model/login.model.php'>
<?php include "../controller/errormsg.php";?>
<input type="text" name="naam" placeholder='gebruikersnaam'><br>
<input type='password' name='wachtwoord' placeholder='wachtwoord' ><br><br>

<input type='submit' value='Login'>
</form>



<?php include_once "layout/footer.php";?>
