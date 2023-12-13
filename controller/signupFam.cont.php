<?php

class SignupFamCont {
   /* deze functie niet meer nodig, er kunnen meerdere familie namen op een ander adres wonen. 
   function familiecheck($naam){
      $query = "SELECT naam_familie FROM familie WHERE naam_familie = '$naam';";
      $result = queryMysql($query);
      $count = $result->rowCount();

      if($count > 0){
         session_start(); 
               $_SESSION['message'] []= "Familie naam bestaat al.";
               header("Location: ../view/signupFam.php");
               exit();
      } else {
         return; 
      }
   }
   */
   public static function adrescheck($adres, $pdo){

      $query = "SELECT adres FROM familie WHERE adres = :adres;";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':adres', $adres);
      $stmt->execute();
      $count = $stmt->rowCount();

      if($count > 0){
         session_start(); 
            $_SESSION['message'] []= "Adres bestaat al.";
            header("Location: ../view/signupFam.php");
            exit();
      } else {
         return; 
      }
   }

   public static function emptycheck(){
      if(empty($_POST['naam']) || empty($_POST['adres']) || empty($_POST['postcode'])){
         session_start();
         $_SESSION['message'] [] = "Een van de velden zijn niet juist ingevuld";
         header('Location: ../view/signupFam.php');
         exit();
         } else {
         return;
         }

   }
   
}

?>