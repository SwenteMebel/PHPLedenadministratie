<?php

include_once "../model/wijzigLid.model.php";

$id = $_GET['id'];
$wijziglid = new wijzigLidModel($id);
$wijziglid->queryLid($id);
$wijziglid->wijzigingLid($id);

?>