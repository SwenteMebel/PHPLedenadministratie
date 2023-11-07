<?php include_once "layout/header.php";?>
<?php include_once "../model/leden.model.php";?>

<div class="overzicht">
    <h1>Leden Overzicht</h1>
   <?php

        while($data = $result->fetch()) {
            $id = $data['id'];
            $gebruikersnaam = $data['naam'];
            $email = $data['email'];


            echo <<<_END
            <br>
            <div class="gebruiker">
                <div class="gegevens">
                    ID = $id <br>
                    Gebruikersnaam: $gebruikersnaam. <br>
                    Email: $email. <br>
                </div>
                <div class="knop">
                    <form method='post' action='../model/leden.model.php'>
                    <input type='hidden' name='delete'>
                    <input type='hidden' name='id' value='$id'>
                    <input type='submit' value='verwijderen'>
                    </form>
                    <form  action='wijzigen.php'>
                    <input type='hidden' name='delete'>
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
