<?php include_once "layout/header.php";?>
<?php include_once "../controller/functions.php";?>
<?php
    if(!isset($_SESSION['id'])){
        header('Location: login.php');
    } 
?>




<form class='form'method='post' action='../model/signupFam.model.php'>
<h1>Nieuwe Familie toevoegen</h1>
<?php include_once "../controller/errormsg.php";?>
<label for='naam'>Familie naam:</label><br>
<input type="text" name="naam" placeholder='Naam'><br>
<label for='Adres'>Adres:</label><br>
<input type='text' name='adres' placeholder='Adres'><br>
<label for='Postcode'>Postcode:</label><br>
<input type='text' name='postcode' placeholder='Postcode'><br>
<br>
<input type='submit' value='Bevestigen'>
<br>
</form>

<?php include_once "layout/footer.php";?>


