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
              <input type="hidden" name="email">
              <input type="hidden" name="token">
            </div>


            <div class="mb-2 text-end">

              <button type="button" class="btn shadow-none me-2" data-bs-dismiss="modal">Cansel</button>
              <button type="submit" class="btn btn-dark shadow-none">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php

  if (isset($_GET['account_recovery'])) {

    $data = filteration($_GET);

    $t_date = date('Y-m-d');

    $query = select("SELECT * FROM `user_cred`  WHERE `email` = ? AND `token` =? AND `t_expire` = ? LIMIT 1", [$data['email'], $data['token'], $t_date], 'sss');


    if (mysqli_num_rows($query) == 1) {
      echo <<<showModal

        <script>

          var myModal = document.getElementById('recoveryModal');


           myModal.querySelector('input[name=email]').value = '$data[email]';
            myModal.querySelector('input[name=token]').value = '$data[token]';


          var myModal = bootstrap.Modal.getOrCreateInstance(myModal);
          modal.show(); 
          

        </script>
        showModal;
    } else {
      alert('danger', 'Invalid link or expired link');
    }
  }
  ?>

  <!--  //* Recovery -->


  <script>
    let recovery_form = document.getElementById('recovery-form');

    recovery_form.addEventListener('submit', function(e) {
      e.preventDefault();

      let data = new FormData();

      data.append('email', recovery_form.elements['email'].value);
      data.append('token', recovery_form.elements['token'].value);
      data.append('pass', recovery_form.elements['pass'].value);
      data.append('recovery_user', '');


      var myModal = document.getElementById('recoveryModal');
      var myModal = bootstrap.Modal.getInstance(myModal);
      myModal.hide();

      let xhr = new XMLHttpRequest();
      xhr.open("POST", "../Controllers/ajax/login_register.php", true);

      xhr.onprogress = function() {
        alert('success', 'Sending email to reset password');
      }


      xhr.onload = function() {

        if (this.responseText == 'failed') {
          alert('danger', 'Account reset failed');

        } else {
          alert('success', 'Account sent successfully');
          recovery_form.reset();
        }


      }
      xhr.send(data);


    });
  </script>




  <?php require_once '../Views/partials/footer.php'; ?>

  <?php require_once './js/script.php'; ?>




  <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js "></script>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>