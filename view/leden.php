<?php include_once "layout/header.php";?>
<?php include_once "../model/leden.model.php";?>
<?php include_once "../model/familie.model.php";?>
<?php
    if(!isset($_SESSION['id'])){
        header('Location: login.php');
    } 
?>
<div class="overzichtalles">
    <div class="overzicht">
        <h1>Leden Overzicht</h1>

        <?php include_once "../controller/errormsg.php";?>

        <?php
            while($data = $result->fetch()) {
                $id = $data['id_lid'];
                $gebruikersnaam = $data['naam'];
                $geboorteDatum = $data['gb_datum'];
                $leeftijd = $data['leeftijd'];
                $soort_lid = $data['soort_lid'];

                echo <<<_END
                <br>
                <div class="gebruiker">
                    <div class="gegevens">
                        Gebruikersnaam: <a href='profielLid.php?id=$id'>$gebruikersnaam </a><br>
                        Geboorte Datum: $geboorteDatum <br>
                        Leeftijd: $leeftijd <br>
                        Soort lid: $soort_lid <br>

                    </div>
                    <div class="knop">
                        <form method='post' action='profielLid.php?id=$id'>
                        <input type='hidden' name='wijzig'>
                        <input type='hidden' name='idlid' value='$id'>
                        <input type='submit' value='Wijzig $gebruikersnaam'>
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
                        Familie: <a href='profielFam.php?id=$famID'>$famNaam.</a><br>
                        Adres: $famAdres <br>
                        Postcode: $famPostcode <br>

                    </div>
                    <div class="knop">
                        <form method='post' action='profielFam.php?id=$famID'>
                        <input type='hidden' name='wijzig'>
                        <input type='hidden' name='idfam' value='$famID'>
                        <input type='submit' value='Wijzig $famNaam'>
                        </form>
                    </div>

                </div>
                _END;

            }
            

            
            
            ?>


    </div>

</div>
    



<?php include_once "layout/footer.php";?>
