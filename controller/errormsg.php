<?php
// Handelt de error messages af. en laat ze op de pagina zien. 

//Bij geen $_SESSION message ga dan altijd door.
if(empty($_SESSION['message'])){
    return;
}

// bij een $_SESSION message.
$messages = $_SESSION['message'];
unset($_SESSION['message']);
?>
<?php foreach($messages as $message)?>
      <div class="error"><p><?php echo $message ?></p></div>

    
    



