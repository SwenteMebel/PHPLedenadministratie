<?php
include_once "../controller/functions.php";
include_once "../controller/contributieZoek.cont.php";


    $queryContributie = "SELECT * FROM contributie;";
    $opzetContributie = queryMysql($queryContributie);
   


if(isset($_POST['zoekopdracht'])){
    $zoekopdracht = sanitiseString($_POST['zoekopdracht']);

    emptyZoekopdracht();

    header('Location: ../view/contributie.php');
   

}
    
   

?>