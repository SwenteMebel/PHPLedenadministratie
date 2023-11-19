<?php include_once "layout/header.php";?>
<?php include_once "../model/leden.model.php";?>
<?php include_once "../model/familie.model.php";?>

<div class="overzichtalles">
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
                        Gebruikersnaam: <a href='profiel.php'>$gebruikersnaam</a><br>
                        Geboorte Datum: $geboorteDatum <br>
                        Soort lid: $soortLid <br>

                    </div>
                    <div class="knop">
                        <form method='post' action='../model/leden.model.php'>
                        <input type='hidden' name='delete'>
                        <input type='hidden' name='idlid' value='$id'>
                        <input type='submit' value='Verwijder Lid'>
                        </form>
                        <form method='post' action='../model/wijzig.model.php'>
                        <input type='hidden' name='wijzig'>
                        <input type='hidden' name='idlid' value='$id'>
                        <input type='submit' value='Wijzig Lid'>
                        </form>
                    </div>

                </div>
                _END;
            } 
        ?>
    </div>

    <div class="overzicht">
        <h1>Familie Overzicht</h1>
        <?php include_once "../controller/errormsg.php";?>
            <?php
            while($famData = $resultFam->fetch()){
                $famID = $famData['id_familie'];
                $famNaam = $famData['naam'];
                $famAdres = $famData['adres'];
                $famPostcode = $famData['postcode'];

                echo <<<_END
                <br>
                <div class="gebruiker">
                    <div class="gegevens">
                        Familie: <a href='profiel.php/user=.$famID'>$famNaam.</a><br>
                        Adres: $famAdres <br>
                        Postcode: $famPostcode <br>

                    </div>
                    <div class="knop">
                        <form method='post' action='../model/familie.model.php'>
                        <input type='hidden' name='delete'>
                        <input type='hidden' name='idfam' value='$famID'>
                        <input type='submit' value='Verwijder Familie'>
                        </form>
                        <form method='post' action='../model/wijzig.model.php'>
                        <input type='hidden' name='wijzig'>
                        <input type='hidden' name='idfam' value='$famID'>
                        <input type='submit' value='Wijzigen Familie'>
                        </form>
                    </div>

                </div>
                _END;

            }
            

            
            
            ?>


    </div>

</div>
    



<?php include_once "layout/footer.php";?>
