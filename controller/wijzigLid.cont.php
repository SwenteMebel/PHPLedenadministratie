<?php



function roleSet($leeftijd){
    $role = ['Jeugd', 'Aspirant', 'Junior', 'Senior','Oudere'];
    
    if($leeftijd < 8){
        return $role[0];
        die();
    } elseif ($leeftijd >= 8 && $leeftijd <= 12) {
       return $role[1];
       die();
    } elseif ($leeftijd >= 13 && $leeftijd <= 17 ){
        return $role[2];
        die();
    } elseif ($leeftijd >= 18 && $leeftijd <= 50) {
        return $role[3];
        die();
    } else {
      return $role[4];
      die();
    }
  }

?>