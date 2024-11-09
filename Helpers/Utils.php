<?php

// frontend funksjoneir

define('SITE_URL', 'http://127.0.0.1/php_booking-prosjekt/');
// define('SITE_URL_IMG', 'http://127.0.0.1:5500/public/');
define('SITE_URL_IMG', 'http://127.0.0.1/php_booking-prosjekt/public/');

define('ABOUT_IMG_PATH', SITE_URL_IMG . 'images/about/');
define('CAROUSEL_IMG_PATH', SITE_URL_IMG . 'images/carousel/');
define('FASILITETER_IMG_PATH', SITE_URL_IMG . 'images/fasiliteter/');
define('USERS_IMG_PATH', SITE_URL_IMG . 'images/users/');



// backend funksjoner upload prorcesss needs this data

define('UPLOAD_IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/php_booking-prosjekt/public/images');

define('ABOUT_FOLDER', 'about/');
define('CAROUSEL_FOLDER', 'carousel/');
define('FASILITETER_FOLDER', 'fasiliteter/');




//  /Applications/XAMPP/xamppfiles/htdocs


 // sendgrid funksjoner 

   define('SENDGRID_API_KEY',"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") ; 



// ? Funksjon for å sjekke om administratoren er logget inn 


function adminLogin()
{
  //? Hvis ikke logget inn, blir brukeren omdirigert til innloggingssiden via JavaScript
  session_start();
  if (!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) {


    echo "<script> window.location.href = '../public/index.php';
            </script>";

    exit;
  }
}

//  ? Funksjon for å omdirigere brukeren til en annen side

function redirect($url)
{

  echo "<script>
  window.location.href='$url';
  </script>";
  exit;
}

// ? Funksjon for å vise en melding

function alert($type, $message)
{
  $bs_class = ($type == "success") ? "alert-success" : "alert-danger";
  echo <<<alert
        <div class= "alert $bs_class alert-dismissible fade show custom-alert" role = "alert">
        <strong class="me-3">$message</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
        </div>
    alert;
}

function uploadImage($image, $folder)

{
  $valid_mime = ['image/jpeg', 'image/png', 'image/webp'];
  $img_mime = $image['type'];

  if (!in_array($img_mime, $valid_mime)) {
    return 'inv_img';    // invalid image mime or format
  } else if (($image['size'] / (1024 * 1024)) > 2) {
    return 'inv_size';  // invalid image size større enn 2mb
  } else {
    $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
    $rname = 'IMG_' . random_int(11111, 99999) . ".$ext";
    $img_path = UPLOAD_IMAGE_PATH . '/' . $folder . '/' . $rname;
    if (move_uploaded_file($image['tmp_name'], $img_path)) {

      return $rname;
    } else {
      return 'updload_failed';  // error in uploading image
    }
  }
}

function deleteImage($image, $folder)

{

  if (unlink(UPLOAD_IMAGE_PATH . $folder . $image)) {
    return true;
  } else {
    return false;
  }
}

function uploadSVGImage($image, $folder)

{
  $valid_mime = ['image/svg+xml'];
  $img_mime = $image['type'];

  if (!in_array($img_mime, $valid_mime)) {
    return 'inv_img';    // invalid image mime or format
  } else if (($image['size'] / (1024 * 1024)) > 1) {
    return 'inv_size';  // invalid image size større enn 1mb
  } else {
    $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
    $rname = 'IMG_' . random_int(11111, 99999) . ".$ext";
    $img_path = UPLOAD_IMAGE_PATH . '/' . $folder . '/' . $rname;
    if (move_uploaded_file($image['tmp_name'], $img_path)) {

      return $rname;
    } else {
      return 'updload_failed';  // error in uploading image
    }
  }
}





?>