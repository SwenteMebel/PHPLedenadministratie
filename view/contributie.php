<?php include_once "layout/header.php";?>
<?php include_once "../model/contributie.model.php";?>

<?php
    if(!isset($_SESSION['id'])){
        header('Location: login.php');
    } 
?>
<div class="contributieOverzicht">
    <div class="overzicht">
        <h1>Contributie</h1>

        
            <?php
                while($contData = $opzetContributie->fetch()){
                    $id = $contData['id_contributie'];
                    $voornaam_lid = $contData['naam_lid'];
                    $achternaam_lid = $contData['achternaam_lid'];
                    $soort_lid = $contData['soort_lid'];
                    $bedrag = $contData['bedrag'];
                    $gb_datum = $contData['gb_datum'];
                    $leeftijd = leetijdCalculatie($gb_datum);

                    echo <<<_END
                    <br>
                    <div class="gebruiker">
                        <div class="gegevens">
                            Voornaam: $voornaam_lid<br>
                            Achternaam: $achternaam_lid <br>
                            Soort lid: $soort_lid<br>
                            Geboorte Datum: $leeftijd<br>
                            Contributie: € $bedrag <br>
                        </div>
                
                    </div>
                    _END;
                }
            ?>
    </div>


    


</div>
    



