<?php
include_once "../model/db.connect.php";

class functions extends DBConnect {

  public static function destroySession()
  {
    $_SESSION=array();
  
    if (session_id() != "" || isset($_COOKIE[session_name()]))
      setcookie(session_name(), '', time()-2592000, '/');
  
    session_destroy();
  }
  
  
  public static function leetijdCalculatie($gb_datum){
    $inputDate = $gb_datum;
    $huidigDate = Date("Y-m-d");
    $leeftijdberekening = date_diff(date_create($inputDate), date_create($huidigDate));   
    $leeftijd = $leeftijdberekening->format('%y');
    return $leeftijd;
  }

}
  





