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
        <h1>Contributie</h1>



    </div>

</div>
    



<?php include_once "layout/footer.php";?>
