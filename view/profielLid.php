<?php include_once "layout/header.php";?>
<?php include_once "../model/leden.model.php";?>
<?php include_once "../model/profielLid.model.php"?>
<?php
    if(!isset($_SESSION['id'])){
        header('Location: login.php');
        exit();
    } 
?>

<?php

$id = $_GET['id'];

$sanitizedId = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

$querylid = new profielLidMod();
$querylid->queryLidprofiel($sanitizedId);
$stmt = $querylid->getLidprofiel();

$lidProfiel = $stmt->fetch(PDO::FETCH_ASSOC);

// Controleer of de elementen bestaan voordat je ze toewijst
$gebruikersnaam = isset($lidProfiel['naam_lid']) ? $lidProfiel['naam_lid'] : '';
$achternaam = isset($lidProfiel['naam_familie']) ? $lidProfiel['naam_familie'] : '';
$email = isset($lidProfiel['email']) ? $lidProfiel['email'] : '';
$geboorteDatum = isset($lidProfiel['gb_datum']) ? $lidProfiel['gb_datum'] : '';
$soort_lid = isset($lidProfiel['soort']) ? $lidProfiel['soort'] : '';


echo <<<_END
<div class="profiel">
    <h1>Profiel van  $gebruikersnaam</h1>

    <div class="profielgegevens">
        <div class="gegevens">
            Gebruikersnaam: $gebruikersnaam $achternaam<br>
            Email: $email <br>
            Geboorte datum: $geboorteDatum <br>
            Soort lid : $soort_lid <br>
        </div>
        <div class="knop">
            <form method='post' action='../model/leden.model.php'>
            <input type='hidden' name='delete'>
            <input type='hidden' name='idlid' value='$id'>
            <input type='submit' value='Verwijder $gebruikersnaam'>
            </form>
        </div>
    </div>
    <br>
    <a href='leden.php'><button class='button'>Terug</button></a>
</div>



<div class="wijziging">
_END;
include_once "../controller/errormsg.php";
echo <<<_END
<h1>Wijziging van $gebruikersnaam</h1>
    <div class="profielgegevens">
        <form method='post' action='../model/wijzigLid.model.php?id=$id'>
            <label for='naam'>Naam wijzigen: $gebruikersnaam</label><br>
            <input type='text' name='naam' placeholder="Wijzig gebruikersnaam"><br><br>
            <label for='naam'>Achternaam wijzigen: $achternaam</label><br>
            <input type='text' name='achternaam' placeholder="Wijzig achternaam"><br><br>
            <label>Email wijzigen: $email</label><br>
            <input type='email' name='email' placeholder="Wijzig email"><br><br>
            <label>Geboorte datum Wijzigen: $geboorteDatum</label><br>
            <input type='date' name='gb_datum' placeholder="Wijzig de geboortedatum"><br><br>
            <label>Soort lid: $soort_lid</label><br>
            <br>
            <input type='submit' value='Wijzigen'>
        </form>
    </div>
</div>
_END;
?>
    



<?php include_once "layout/footer.php";?>
