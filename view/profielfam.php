<?php include_once "layout/header.php";?>
<?php include_once "../model/leden.model.php";?>
<?php include_once "../model/profielFam.model.php"?>

<?php
    if(!isset($_SESSION['id'])){
        header('Location: login.php');
    } 
?>

<?php
$id = $_GET['id'];

$sanitizedId = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
$queryFam = new profielfamMod();
$queryFam->queryFamprofiel($sanitizedId);
$stmt = $queryFam->getFamprofiel();

$resultFam = $stmt->fetch(PDO::FETCH_ASSOC);

$familie = isset($resultFam['naam_familie']) ? $resultFam['naam_familie'] : '';
$adres = isset($resultFam['adres']) ? $resultFam['adres'] : '' ;
$postcode = isset($resultFam['postcode']) ? $resultFam['postcode'] : '';



echo <<<_END
    <div class="profiel">
        <h1>Familie  $familie</h1>
        <?php include_once "../controller/errormsg.php";?>
        <div class="profielgegevens">
            <div class="gegevens">
                Familie naam: $familie <br>
                Adres: $adres <br>
                Postcode : $postcode <br>
            </div>
            <div class="knop">
                <form method='post' action='../handler/deleteFam.handler.php'>
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



