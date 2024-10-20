<?php

  // ? Funksjon for å sjekke om administratoren er logget inn 


  function adminLogin()  
    {
        //? Hvis ikke logget inn, blir brukeren omdirigert til innloggingssiden via JavaScript
        session_start();
        if(!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) {

       
            echo"<script> window.location.href = '../public/index.php';
            </script>";

            exit;
          
    }

 
    } 

  //  ? Funksjon for å omdirigere brukeren til en annen side

 function redirect($url) {
     
  echo "<script>
  window.location.href='$url';
  </script>";
  exit;

} 
 
   // ? Funksjon for å vise en melding

function alert($type, $message) {
     $bs_class = ($type == "success") ? "alert-success" : "alert-danger";
    echo <<<alert
        <div class= "alert $bs_class alert-dismissible fade show custom-alert" role = "alert">
        <strong class="me-3">$message</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
        </div>
    alert;
}
?>
