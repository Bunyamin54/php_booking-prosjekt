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

  <title>Admin Panel - Instillinger </title>

  
  <link rel="stylesheet" href="../public//css/styles.css">



  <?php require('../Views/partials/links.php'); ?>

</head>

<body class="bg-light">
  
  <?php require('./admin-header.php'); ?>
  <div class="container-fluid" id="main-content">
    <div class="row">
      <div class="col-lg-10 ms-auto p-4 overflow-hidden">

        <h3 class="mb-4">Instillinger</h3>

        <!-- // * Instillinger form -->

        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <h4 class="card-title m-0">
                Generel Innstillinger
              </h4>

              <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#general-s">
              <i class="bi bi-pencil-square"></i> Rediger
              </button>


            </div>

            <h5 class="card-subtitle mb-1 fw-bold">Site tittel</h5>
            <p class="card-text">content</p>
            <h5 class="card-subtitle mb-1 fw-bold">Om oss</h5>
            <p class="card-text">content</p>

          </div>
        </div>


        <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form>

            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" >Generelt Instillinger</h5>
               
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Kanseller</button>
                <button type="button" class="btn" style="background-color: var(--teal); color: white; border: 1px solid var(--teal);">Send inn</button>



              </div>
            </div>

            </form>
          
          </div>
        </div>

      </div>
    </div>
  </div>

  <?php require('../public/js/script.php'); ?>
</body>

</html>