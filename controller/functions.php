<?php
include_once "../model/db.connect.php";


  function destroySession()
  {
    $_SESSION=array();
  
    if (session_id() != "" || isset($_COOKIE[session_name()]))
      setcookie(session_name(), '', time()-2592000, '/');
  
    session_destroy();
  }
  
  //Queryt de database met de data
  function queryMysql($query)
  {
    global $pdo;
    return $pdo->query($query);
  }
  
  
  function sanitiseString($var)
  {
    global $pdo;
  
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
  
    $result = $pdo->quote($var);          // This adds single quotes
    return str_replace("'", "", $result); // So now remove them
  }

  
  function leetijdCalculatie($gb_datum){
    $inputDate = $gb_datum;
    $huidigDate = Date("Y-m-d");
    $leeftijdberekening = date_diff(date_create($inputDate), date_create($huidigDate));   
    $leeftijd = $leeftijdberekening->format('%y');
    return $leeftijd;
  }





