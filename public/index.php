<!doctype html>
<html lang="no">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UIA Motel</title>
  <?php require_once '../Views/partials/links.php'; ?> 
</head>

<body class="bg-light">

  <?php

  // ? Include the components
  require_once '../Views/partials/header.php';
  require_once '../Views/users/hjem.php';
  require_once '../Views/users/availability-form.php';
  require_once '../Views/users/rom-cards.php';
  require_once '../Views/users/fasiliteter.php';
  require_once '../Views/users/anmeldelser.php';
  require_once '../Views/users/adressen-var.php';
  require_once '../Views/admin/login_registering.php';
  require_once '../Views/partials/footer.php';

  ?>

  <?php require_once '../public/js/script.php'; ?>  

</body>

</html>
