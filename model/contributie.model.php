<?php
include_once "../controller/functions.php";
include_once "../controller/contributie.cont.php";


    $queryContributie = "SELECT * FROM lid JOIN familie ON lid.id_familie= familie.id_familie JOIN soort ON lid.id_soort = soort.id_soort;";
    $opzetContributie = queryMysql($queryContributie);
   
    $queryGbDatum = "SELECT * FROM lid ";


if(isset($_POST['zoekopdracht'])){
    $zoekopdracht = sanitiseString($_POST['zoekopdracht']);

    emptyZoekopdracht();

    header('Location: ../view/contributie.php');
   

}
    
   

?>