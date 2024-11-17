<!doctype html>
<html lang="no">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> <?php echo $instillinger_r['site_title']  ?> Hjem </title>

  <!-- //? Linking CSS files -->

  <link rel="stylesheet" href="../public/css/styles.css">
  <?php require_once '../Views/partials/links.php'; ?>


</head>

<body class="bg-light">

  <?php




  // ? Inkluder komponentene fra forskjellige visningsfiler



  require_once '../Views/partials/header.php';
  require_once '../Views/users/hjem.php';
  require_once '../Views/users/availability-form.php';
  require_once '../Views/users/rom-cards.php';
  require_once '../Views/users/fasiliteter.php';
  require_once '../Views/users/anmeldelser.php';
  require_once '../Views/users/adressen-var.php';
  require_once '../Views/users/login_registering.php';
  require_once '../Views/partials/footer.php';


  ?>
   

  <!-- //?  password reset modal and code  -->

  <div class="modal fade" id="recoveryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="recovery-form">
          <div class="modal-header">
            <h4 class="modal-title d-flex align-items-center">
              <i class="bi bi-shield-lock fs-3 me-2"></i> Set up New password
            </h4>
          </div>
          <div class="modal-body">
            <div class="mb-4">
              <label class="form-label">New Password</label>
              <input type="password" name="pass" required class="form-control shadow-none">


              <div class="mb-2 text-end">

                <button type="button" class="btn shadow-none me-2" data-bs-dismiss="modal">Cansel</button>
                <button type="submit" class="btn btn-dark shadow-none">Submit</button>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>


  







   <?php require_once '../Views/partials/footer.php'; ?>

  <?php require_once './js/script.php'; ?>


  <script src= "https://unpkg.com/swiper@7/swiper-bundle.min.js "></script>

</body>

</html>