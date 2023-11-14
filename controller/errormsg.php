<?php

// Handelt de error messages af. en laat ze op de pagina zien. 

if(empty($_SESSION['message'])){
    return;
}

$messages = $_SESSION['message'];
unset($_SESSION['message']);
?>
<?php foreach($messages as $message)?>
      <div class="error"><p><?php echo $message ?></p></div>

    
    



