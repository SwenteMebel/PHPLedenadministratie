<?php

function updateyear($pdo, $year, $bedrag){
    $query = "SELECT jaar FROM boekjaar WHERE jaar = '$year';";
    $result = queryMysql($query);
    $count = $result->rowCount();
    if($count > 0){
        return;
    } else {

        $stmt = $pdo->prepare('INSERT INTO boekjaar VALUES(NULL, ?,?)');
        $stmt->bindParam(1, $year, PDO::PARAM_INT, 4);
        $stmt->bindParam(2, $bedrag, PDO::PARAM_INT);

        $stmt->execute([$year, $bedrag]);
        return;
    }
}