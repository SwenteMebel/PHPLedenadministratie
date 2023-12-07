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
                    
                    $voornaam_lid = $contData['naam_lid'];
                    $achternaam_lid = $contData['naam_familie'];
                    $soort_lid = $contData['soort'];
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
                            Leeftijd: $leeftijd<br>
                            Contributie: € $bedrag <br>
                        </div>
                
                    </div>
                    _END;
                }
            ?>
    </div>


    


</div>
    



