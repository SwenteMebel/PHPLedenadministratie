<?php include_once "layout/header.php";?>

<?php
include "../controller/functions.php";
session_unset();


echo <<<_END
<form method='post' action='../model/login.model.php'>
<input type="text" name="naam" placeholder='gebruikersnaam'><br>
<input type='password' name='wachtwoord' placeholder='wachtwoord'><br><br>
<input type='submit' value='Login'>

</form>
_END;
?>

<?php include_once "layout/footer.php";?>
