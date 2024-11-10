<?php

require(__DIR__ . '/../Config/Database.php');
require(__DIR__ . '/../Helpers/Utils.php');

adminLogin();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Funksjoner & Fasiliteter</title>
  <?php require(__DIR__ . '/../Views/partials/links.php'); ?>
  <link rel="stylesheet" href="../public/css/styles.css">
</head>

<body class="bg-light">

  <?php require(__DIR__ . '/admin-header.php'); ?>
  <div class="container-fluid" id="main-content">
    <div class="row">
      <div class="col-lg-10 ms-auto p-4 overflow-hidden">
        <h3 class="mb-4">Funksjoner & Fasiliteter</h3>
        <div class="card border-0 shadow-sm mb-4" style="min-width: 100%;">
          <div class="card-body">


            <div class="d-flex align-items-center justify-content-between mb-3">
              <h4 class="card-title m-0">
                Funksjoner
              </h4>

              <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#funksjoner-s">
                <i class="bi bi-plus-square"></i> Add
              </button>
            </div>

            <div class="table-responsive-md" style="height: 350px; overflow-y: scroll;">
              <table class="table table-hover border">
                <thead>
                  <tr class="bg-dark text-light">
                    <th scope="col">#</th>
                    <th scope="col">Navn</th>
                    <th scope="col">Handling</th>
                  </tr>
                </thead>
                <tbody id="funksjoner-data">

                </tbody>
              </table>
            </div>


          </div>
        </div>



        <div class="card border-0 shadow-sm mb-4" style="min-width: 100%;">
          <div class="card-body">


            <div class="d-flex align-items-center justify-content-between mb-3">
              <h4 class="card-title m-0">
                Fasiliteter
              </h4>

              <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#fasiliteter-s">
                <i class="bi bi-plus-square"></i> Add
              </button>
            </div>

            <div class="table-responsive-md" style="overflow-y: scroll;">
              <table class="table table-hover border">
                <thead>
                  <tr class="bg-dark text-light">
                    <th scope="col">#</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Navn</th>
                    <th scope="col" width="%40">Beskrivelse</th>
                    <th scope="col">Handling</th>
                  </tr>
                </thead>
                <tbody id="fasiliteter-data">

                </tbody>
              </table>
            </div>


          </div>
        </div>




      </div>
    </div>
  </div>


  <!--  // * Funksjoner Modal Form  -->

  <div class="modal fade" id="funksjoner-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form id="funksjoner_s_form" enctype="multipart/form-data">

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Funksjoner </h5>

          </div>
          <div class="modal-body">
            <div class="mb-3">

              <label class="form-label fw-bold">Navn </label>
              <input type="text" name="funksjoner_name" class="form-control shadow-none" required>

            </div>

          </div>
          <div class="modal-footer">
            <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Kanseller</button>
            <button type="submit" class="btn custom-bg text-white shadow-none ">Send inn</button>



          </div>
        </div>

      </form>

    </div>
  </div>



  <!--  // * Fasiliteter Modal Form  -->



  <div class="modal fade" id="fasiliteter-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form id="fasiliteter_s_form" enctype="multipart/form-data">

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Fasiliteter </h5>

          </div>
          <div class="modal-body">
            <div class="mb-3">

              <label class="form-label fw-bold">Navn </label>
              <input type="text" name="fasiliteter_name" class="form-control shadow-none" required>

            </div>
            <div class="mb-3">

              <label class="form-label fw-bold">Icon </label>
              <input type="file" name="fasiliteter_icon" accept=".svg" class="form-control shadow-none" required>
            </div>


            <div class="mb-3">

              <label class="form-label">Beskrivelse </label>
              <textarea name="fasiliteter_beskrivelse" class="form-control shadow-none" rows="3"></textarea>
            </div>

          </div>
          <div class="modal-footer">
            <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Kanseller</button>
            <button type="submit" class="btn custom-bg text-white shadow-none ">Send inn</button>



          </div>
        </div>

      </form>

    </div>
  </div>






  <?php require(__DIR__ . '/../public/js/script.php'); ?>
 <script src="scripts/funksjoner_fasiliteter.js "></script>

</body>

</html>