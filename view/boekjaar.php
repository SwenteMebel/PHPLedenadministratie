<?php include_once "layout/header.php";?>
<?php include_once "../model/boekjaar.model.php";?>

<?php
    if(!isset($_SESSION['id'])){
        header('Location: login.php');
    } 
?>
<div class="overzichtalles">
    <div class="overzicht">
        <h1>Boekjaar</h1>
 
        <?php
           while($data = $result->fetch()){
                $jaar = $data['jaar'];
                $bedrag = $data['bedrag_jaar'];
            

                echo <<<_END
                    <br>
                    <div class="gebruiker">
                        <div class="gegevens">
                            Jaar: $jaar<br>
                            Bedrag:€ $bedrag <br>
        
                        </div> 
                    </div>
                _END;
            } 
        ?>

</div>
    



<?php include_once "layout/footer.php";?>
