<?php
include_once "../controller/functions.php";
include_once "../controller/contributie.cont.php";


    $queryContributie = "SELECT * FROM lid LEFT JOIN contributie ON lid.id_lid = contributie.id_contributie;";
    $opzetContributie = queryMysql($queryContributie);
   
    $queryGbDatum = "SELECT * FROM lid ";


if(isset($_POST['zoekopdracht'])){
    $zoekopdracht = sanitiseString($_POST['zoekopdracht']);

    emptyZoekopdracht();

    header('Location: ../view/contributie.php');
   

}
    
   

?>