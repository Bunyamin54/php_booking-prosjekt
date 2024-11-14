<!-- //? Navbar -->
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title> <?php echo $instillinger_r['site_title']  ?> UIA Motel </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<nav id="nav-bar" class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="/php_booking-prosjekt/public/index.php"><?php echo $instillinger_r['site_title'] ?> UIA Motel </a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link  me-2" href="/php_booking-prosjekt/public/index.php">Hjem</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="/php_booking-prosjekt/Views/users/rom.php">Rom</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link me-2" href="/php_booking-prosjekt/Views/users/fasiliteter.php">Fasiliteter</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link me-2" href="/php_booking-prosjekt/Views/users/fasiliteterr.php">Fasiliteter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="/php_booking-prosjekt/Views/users/kontakt.php">Kontakt oss</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="/php_booking-prosjekt/Views/users/om.php">Om</a>
                </li>
            </ul>
            <div class="d-flex">
  

              <?php
            
                print_r($_SESSION);
              ?>
                <button type="button" class="btn btn-outline-success shadow-none me-lg-2 me-3" data-bs-toggle="modal" data-bs-target="#loginModal">
                    Logg inn
                </button>
                <button type="button" class="btn btn-outline-warning shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">
                    Register
                </button>
            </div>
        </div>
    </div>
</nav>

<?php
   require($_SERVER['DOCUMENT_ROOT'] . '/php_booking-prosjekt/Config/Database.php');
   require($_SERVER['DOCUMENT_ROOT'] . '/php_booking-prosjekt/Helpers/Utils.php');
   
       
       require('links.php');   
       
       
       $contact_q = "SELECT * FROM `contact_details` WHERE 'sr_no' =? ";
       $instillinger_q = "SELECT * FROM `instillinger` WHERE 'sr_no' =? ";
       $values = [1];
       $contact_r = mysqli_fetch_assoc(select($contact_q, $values, 'i'));
       $instillinger_r = mysqli_fetch_assoc(select($instillinger_q, $values, 'i'));
      
    ?>

 
    <!-- Bootstrap ve jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
