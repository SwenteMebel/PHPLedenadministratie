<?php
include_once "../model/wijzigLid.model.php";

class wijzigLidCont {

  public static function roleSet($leeftijd){
    $role = ['Jeugd', 'Aspirant', 'Junior', 'Senior','Oudere'];
    
    if($leeftijd < 8){
        return $role[0];
        
    } elseif ($leeftijd >= 8 && $leeftijd <= 12) {
       return $role[1];
      
    } elseif ($leeftijd >= 13 && $leeftijd <= 17 ){
        return $role[2];
        
    } elseif ($leeftijd >= 18 && $leeftijd <= 50) {
        return $role[3];
        
    } else {
      return $role[4];
      
    }
  }

}



?>