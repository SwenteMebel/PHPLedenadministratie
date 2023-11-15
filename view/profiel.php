<?php include_once "layout/header.php";?>
<?php include_once "../model/leden.model.php";?>

<div class="overzicht">
    <h1>Profiel van $$ USER ID $$ </h1>
   <?php

        $data = $result->fetch();
        $id = $data['id'];
        $gebruikersnaam = $data['naam'];
        $email = $data['email'];
        $functie = $data['functie'];

        echo <<<_END
        <br>
        <div class="gebruiker">
            <div class="gegevens">
                ID = $id <br>
                Gebruikersnaam: $gebruikersnaam. <br>
                Email: $email. <br>
                Functie: $functie <br>
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
        
   ?>


</div>
    