<?php include_once "layout/header.php";?>
<?php include_once "../model/leden.model.php";?>


<?php
$id = $_GET['id'];
$queryFam = "SELECT * FROM familie WHERE id_familie = '$id';";
$opzetFam = queryMysql($queryFam);
$resultFam = $opzetFam->fetch();
$familie = $resultFam['naam'];
$adres = $resultFam['adres'];
$postcode = $resultFam['postcode'];

echo <<<_END
    <div class="profiel">
        <h1>Familie  $familie</h1>

        <div class="profielgegevens">
            <div class="gegevens">
                Familie naam: $familie <br>
                Adres: $adres <br>
                Postcode : $postcode <br>
            </div>
            <div class="knop">
                <form method='post' action='../model/familie.model.php'>
                <input type='hidden' name='delete'>
                <input type='hidden' name='idfam' value='$id'>
                <input type='submit' value='Verwijder $familie'>
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
        <h1>Wijzig familie $familie</h1>
        <div class="profielgegevens">
            <form method='post' action='../model/wijzigFam.model.php?id=$id'>
                <label for='naam'>Familie naam: $familie</label><br>
                <input type='text' name='naam' placeholder="Wijzig familie naam"><br><br>
                <label>Adres wijzigen: $adres</label><br>
                <input type='text' name='adres' placeholder="Wijzig het adres"><br><br>
                <label>Postcode Wijzigen: $postcode</label><br>
                <input type='text' name='postcode' placeholder="Wijzig de postcode"><br>
                <br>
                <input type='submit' value='Wijzigen'>
            </form>
        </div>
    </div>

_END;
?>



<?php include_once "layout/footer.php";?>
