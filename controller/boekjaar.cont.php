<?php

function checkyear($year){
    $query = "SELECT jaar FROM boekjaar WHERE jaar = '$year';";
    $result = queryMysql($query);
    $count = $result->rowCount();
    if($count > 0){
        exit();
    } else {
        return;
    }
}