<?php


class boekjaarCont {

    public static function updateyear($pdo, $year, $bedrag){
        $stmt = $pdo->prepare("SELECT jaar FROM boekjaar WHERE jaar = :year;");
        $stmt->bindParam(':year', $year);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count > 0){
            return;
        } else {
    
            $stmt = $pdo->prepare('INSERT INTO boekjaar VALUES(NULL, ?,?)');
            $stmt->bindParam(1, $year, PDO::PARAM_INT, 4);
            $stmt->bindParam(2, $bedrag, PDO::PARAM_INT);
    
            $stmt->execute([$year, $bedrag]);
           
        }
    }

    public static function updateBedrag($pdo, $year, $bedrag){
        $stmt = $pdo->prepare("UPDATE boekjaar SET bedrag_jaar = :bedrag WHERE jaar = :jaar;");
        $stmt->bindParam(':bedrag', $bedrag );
        $stmt->bindParam(':jaar', $year);
        $stmt->execute();
    }
}
