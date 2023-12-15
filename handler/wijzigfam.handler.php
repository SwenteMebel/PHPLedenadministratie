<?php

include_once "../model/wijzigFam.model.php";

$id = $_GET['id'];
$wijziglid = new wijzigFamModel($id);
$wijziglid->queryFam($id);
$wijziglid->wijzigingFam($id);

?>