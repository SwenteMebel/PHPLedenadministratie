<?php include_once "layout/header.php";?>
<?php include_once "../controller/functions.php";?>
<?php
    if(!isset($_SESSION['id'])){
        header('Location: login.php');
    } else {
    return; 
    }
?>




<form class='form'method='post' action='../model/signupLid.model.php'>
<h1>Nieuw lid toevoegen</h1>
<?php include_once "../controller/errormsg.php";?>

<label for='naam'>Voornaam:</label><br>
<input type="text" name="naam" placeholder='Gebruikersnaam' ><br>

<label for='email'>Email:</label><br>
<input type='email' name='email' placeholder="E-mail"><br>

<label for='geboortedatum'>Geboorte Datum:</label><br>
<input type='date' name='gb_datum'><br>

<label for='soort_lid'>Soort Lid:</label><br>
<select name="selectOption">
    <option value="Jeugd">Jeugd</option>
    <option value="Aspirant">Aspirant</option>
    <option value="Junior">Junior</option>
    <option value="Senior">Senior</option>
    <option value="Oudere">Oudere</option>
</select>

<br><br>
<input type='submit' value='Bevestigen'>
</form>

<?php include_once "layout/footer.php";?>


