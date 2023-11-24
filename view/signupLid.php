<?php include_once "layout/header.php";?>
<?php include_once "../controller/functions.php";?>
<?php
    if(!isset($_SESSION['id'])){
        header('Location: login.php');
    } 

?>




<form class='form'method='post' action='../model/signupLid.model.php'>
<h1>Nieuw lid toevoegen</h1>
<?php include_once "../controller/errormsg.php";?>

<label for='naam'>Voornaam:</label><br>
<input type="text" name="naam" placeholder='Gebruikersnaam....'><br>

<label for='naam'>Achternaam:</label><br>
<input type="text" name="achternaam" placeholder='Achternaam....'><br>

<label for='email'>Email:</label><br>
<input type='email' name='email' placeholder="E-mail...."><br>

<label for='geboortedatum'>Geboorte Datum:</label><br>
<input type='date' name='gb_datum'><br>

<br><br>
<input type='submit' value='Bevestigen'>
</form>

<?php include_once "layout/footer.php";?>


