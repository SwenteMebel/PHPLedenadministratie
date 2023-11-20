<?php include_once "layout/header.php";?>
<?php include_once "../model/leden.model.php";?>


<?php
$id = $_GET['id'];
$queryLid = "SELECT * FROM lid WHERE id_lid = '$id';";
$opzetlid = queryMysql($queryLid);
$resultLid = $opzetlid->fetch();
$gebruikersnaam = $resultLid['naam'];
$email = $resultLid['email'];
$geboorteDatum = $resultLid['gb_datum'];
$soort_lid = $resultLid['soort_lid'];

echo <<<_END
<div class="profiel">
    <h1>Profiel van  $gebruikersnaam</h1>

    <div class="profielgegevens">
        <div class="gegevens">
            Gebruikersnaam: $gebruikersnaam <br>
            Email: $email <br>
            Geboorte datum: $geboorteDatum <br>
            Soort lid: $soort_lid <br>
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
<h1>Wijziging van $gebruikersnaam</h1>
    <div class="profielgegevens">
        <form method='post' action='..model/wijzigLid.model.php'>
            <label for='naam'>Familie naam: $gebruikersnaam</label><br>
            <input type='text' name='naam' placeholder="Wijzig gebruikersnaam"><br>
            <label>Adres wijzigen: $email</label><br>
            <input type='email' name='email' placeholder="Wijzig email"><br>
            <label>Postcode Wijzigen: $geboorteDatum</label><br>
            <input type='date' name='gb_datum' placeholder="Wijzig de geboortedatum"><br>
            <label>Adres wijzigen: $soort_lid</label><br>
            <input type='text' name='soort_lid' placeholder="Wijzig soort lid"><br>
            <br>
            <input type='submit' value='Wijzigen'>
        </form>
    </div>
</div>
_END;
?>
    



<?php include_once "layout/footer.php";?>
