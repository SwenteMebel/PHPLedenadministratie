<?php include_once "layout/header.php";?>
<?php include_once "../model/leden.model.php";?>

<div class="overzicht">
    <h1>Leden Overzicht</h1>

    <?php include_once "../controller/errormsg.php";?>

    <?php
        while($data = $result->fetch()) {
            $id = $data['id_lid'];
            $gebruikersnaam = $data['naam'];
            $geboorteDatum = $data['gb_datum'];
            $soortLid = $data['soort_lid'];

            echo <<<_END
            <br>
            <div class="gebruiker">
                <div class="gegevens">
                    ID = $id <br>
                    Gebruikersnaam: <a href='profiel.php'>$gebruikersnaam.</a><br>
                    Geboorte Datum: $geboorteDatum <br>
                    Soort lid: $soortLid <br>

                </div>
                <div class="knop">
                    <form method='post' action='../model/leden.model.php'>
                    <input type='hidden' name='delete'>
                    <input type='hidden' name='id' value='$id'>
                    <input type='submit' value='verwijderen'>
                    </form>
                    <form method='post' action='../model/wijzig.model.php'>
                    <input type='hidden' name='wijzig'>
                    <input type='hidden' name='id' value='$id'>
                    <input type='submit' value='wijzigen'>
                    </form>
                </div>

            </div>
            _END;
        } 
    ?>


</div>
    



<?php include_once "layout/footer.php";?>
