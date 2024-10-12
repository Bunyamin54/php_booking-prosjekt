<?php

require('../Helpers/Utils.php');

adminLogin();


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=
    , initial-scale=1.0">
    
  <title>Admin Panel - Dashboard </title>
  <link rel="stylesheet" href="../public/css/styles.css">


  <?php require('../Views/partials/links.php'); ?>
 
</head>

<body class="bg-light">

  <div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top ">


    <h3 class="mb-0 h-font">UIA Motel Webside</h3>

    <a href="loggut.php" class="btn btn-light btn-sm">Logg ut</a>

  </div>

  <!-- Outer Container with Dark Background -->
  <div class="col-lg-2 bg-dark border-top border-3 border-secondary" id="dashboard-menu">
    <nav class="navbar navbar-expand-lg navbar-dark ">
      <div class="container-fluid flex-lg-column align-items-stretch">

        <h4 class="mt-2 text-light ">Admin Panel</h4>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="adminDropdown" aria-controls="adminDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible content for Filters -->
        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">

          <ul class="nav nav-pills flex-column">
            <!-- <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Active</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link text-white " href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#">Rom</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#">Bruker</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white"  href="#">Instillinger</a>
            </li>
          
          </ul>

        </div>
      </div>
    </nav>
  </div>



  <?php require('../public/js/script.php'); ?>
</body>

</html>