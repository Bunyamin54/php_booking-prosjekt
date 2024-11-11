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
  <title>Rom</title>
  <?php require(__DIR__ . '/../Views/partials/links.php'); ?>
  <link rel="stylesheet" href="../public/css/styles.css">
</head>

<body class="bg-light">

  <?php require(__DIR__ . '/admin-header.php'); ?>
  <div class="container-fluid" id="main-content">
    <div class="row">
      <div class="col-lg-10 ms-auto p-4 overflow-hidden">
        <h3 class="mb-4">Rom</h3>
        <div class="card border-0 shadow-sm mb-4" style="min-width: 100%;">
          <div class="card-body">


            <div class="text-end mb-4">
              <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-rom">
                <i class="bi bi-plus-square"></i> Add
              </button>
            </div>

            <div class="table-responsive-lg" style="height: 450px; overflow-y: scroll;">
              <table class="table table-hover border text-center">
                <thead>
                  <tr class="bg-dark text-light">
                    <th scope="col">#</th>
                    <th scope="col">Navn</th>
                    <th scope="col">Areal</th>
                    <th scope="col">Gjest</th>
                    <th scope="col">Pris</th>
                    <th scope="col">Kvalitet</th>
                    <th scope="col">Status</th>
                    <th scope="col">Handling</th>

                  </tr>
                </thead>
                <tbody id="rom-data">

                </tbody>
              </table>
            </div>


          </div>
        </div>


      </div>
    </div>
  </div>


  <!--  // * Rom Modal Form  -->

  <div class="modal fade" id="add-rom" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <form id="add_rom_form" autocomplete="off">

        <div class="modal-content ">
          <div class="modal-header">
            <h5 class="modal-title">Add Rom </h5>

          </div>
          <div class="modal-body">

            <div class="row">

              <div class="col-md-6 mb-3">

                <label class="form-label fw-bold">Navn </label>
                <input type="text" name="name" class="form-control shadow-none" required>

              </div>

              <div class="col-md-6 mb-3">

                <label class="form-label fw-bold">Areal </label>
                <input type="number" min="1" name="areal" class="form-control shadow-none" required>

              </div>

              <div class="col-md-6 mb-3">

                <label class="form-label fw-bold">Pris </label>
                <input type="number" min="1" name="pris" class="form-control shadow-none" required>

              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Kvalitet </label>
                <input type="number" min="1" name="kvalitet" class="form-control shadow-none" required>

              </div>
              <div class="col-md-6 mb-3">

                <label class="form-label fw-bold">Voksen(Max.) </label>
                <input type="number" min="1" name="voksen" class="form-control shadow-none" required>

              </div>
              <div class="col-md-6 mb-3">

                <label class="form-label fw-bold">Barn(Max.) </label>
                <input type="number" min="1" name="barn" class="form-control shadow-none" required>

              </div>

              <div class="col-12 mb-3">
                <label class="form-label fw-bold">Funksjoner</label>
                <div class="row">

                  <?php

                  $res = selectAll('funksjoner');
                  while ($opt = mysqli_fetch_assoc($res)) {
                    echo " 
                    <div class='col-md-3 mb-1'>
                     <label> 
                     <input type='checkbox' name='funksjoner[]' value='$opt[id]' class='form-check-input shadow-none'>

                       $opt[name]
                     </label>
                     </div>
                    ";
                  }

                  ?>
                </div>
              </div>

              <div class="col-12 mb-3">
                <label class="form-label fw-bold">Fasiliteter</label>
                <div class="row">

                  <?php

                  $res = selectAll('fasiliteter');
                  while ($opt = mysqli_fetch_assoc($res)) {
                    echo " 
                    <div class='col-md-3 mb-1'>
                    <label> 
                    <input type='checkbox' name='fasiliteter[]' value='$opt[id]' class='form-check-input shadow-none'>

                      $opt[name]
                    </label>
                    </div>
                    ";
                  }

                  ?>
                </div>
              </div>

              <div class="col-12 mb-3">

                <label class="form-label fw-bold">Beskrivelse </label>
                <textarea name="beskrivelse" rows="4" class="form-control shadow-none required"></textarea>

              </div>



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



  <div class="modal fade" id="add-rom" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <form id="add_rom_form" autocomplete="off">

        <div class="modal-content ">
          <div class="modal-header">
            <h5 class="modal-title">Add Rom </h5>

          </div>
          <div class="modal-body">

            <div class="row">

              <div class="col-md-6 mb-3">

                <label class="form-label fw-bold">Navn </label>
                <input type="text" name="name" class="form-control shadow-none" required>

              </div>

              <div class="col-md-6 mb-3">

                <label class="form-label fw-bold">Areal </label>
                <input type="number" min="1" name="areal" class="form-control shadow-none" required>

              </div>

              <div class="col-md-6 mb-3">

                <label class="form-label fw-bold">Pris </label>
                <input type="number" min="1" name="pris" class="form-control shadow-none" required>

              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Kvalitet </label>
                <input type="number" min="1" name="kvalitet" class="form-control shadow-none" required>

              </div>
              <div class="col-md-6 mb-3">

                <label class="form-label fw-bold">Voksen(Max.) </label>
                <input type="number" min="1" name="voksen" class="form-control shadow-none" required>

              </div>
              <div class="col-md-6 mb-3">

                <label class="form-label fw-bold">Barn(Max.) </label>
                <input type="number" min="1" name="barn" class="form-control shadow-none" required>

              </div>

              <div class="col-12 mb-3">
                <label class="form-label fw-bold">Funksjoner</label>
                <div class="row">

                  <?php

                  $res = selectAll('funksjoner');
                  while ($opt = mysqli_fetch_assoc($res)) {
                    echo " 
                    <div class='col-md-3 mb-1'>
                     <label> 
                     <input type='checkbox' name='funksjoner[]' value='$opt[id]' class='form-check-input shadow-none'>

                       $opt[name]
                     </label>
                     </div>
                    ";
                  }

                  ?>
                </div>
              </div>

              <div class="col-12 mb-3">
                <label class="form-label fw-bold">Fasiliteter</label>
                <div class="row">

                  <?php

                  $res = selectAll('fasiliteter');
                  while ($opt = mysqli_fetch_assoc($res)) {
                    echo " 
                    <div class='col-md-3 mb-1'>
                    <label> 
                    <input type='checkbox' name='fasiliteter[]' value='$opt[id]' class='form-check-input shadow-none'>

                      $opt[name]
                    </label>
                    </div>
                    ";
                  }

                  ?>
                </div>
              </div>

              <div class="col-12 mb-3">

                <label class="form-label fw-bold">Beskrivelse </label>
                <textarea name="beskrivelse" rows="4" class="form-control shadow-none required"></textarea>

              </div>



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


  <!--  // * Edit Modal Form  -->

  <div class="modal fade" id="edit-rom" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <form id="edit_rom_form" autocomplete="off">

        <div class="modal-content ">
          <div class="modal-header">
            <h5 class="modal-title">Edit Rom </h5>

          </div>
          <div class="modal-body">

            <div class="row">

              <div class="col-md-6 mb-3">

                <label class="form-label fw-bold">Navn </label>
                <input type="text" name="name" class="form-control shadow-none" required>

              </div>

              <div class="col-md-6 mb-3">

                <label class="form-label fw-bold">Areal </label>
                <input type="number" min="1" name="areal" class="form-control shadow-none" required>

              </div>

              <div class="col-md-6 mb-3">

                <label class="form-label fw-bold">Pris </label>
                <input type="number" min="1" name="pris" class="form-control shadow-none" required>

              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Kvalitet </label>
                <input type="number" min="1" name="kvalitet" class="form-control shadow-none" required>

              </div>
              <div class="col-md-6 mb-3">

                <label class="form-label fw-bold">Voksen(Max.) </label>
                <input type="number" min="1" name="voksen" class="form-control shadow-none" required>

              </div>
              <div class="col-md-6 mb-3">

                <label class="form-label fw-bold">Barn(Max.) </label>
                <input type="number" min="1" name="barn" class="form-control shadow-none" required>

              </div>

              <div class="col-12 mb-3">
                <label class="form-label fw-bold">Funksjoner</label>
                <div class="row">

                  <?php

                  $res = selectAll('funksjoner');
                  while ($opt = mysqli_fetch_assoc($res)) {
                    echo " 
                    <div class='col-md-3 mb-1'>
                     <label> 
                     <input type='checkbox' name='funksjoner[]' value='$opt[id]' class='form-check-input shadow-none'>

                       $opt[name]
                     </label>
                     </div>
                    ";
                  }

                  ?>
                </div>
              </div>

              <div class="col-12 mb-3">
                <label class="form-label fw-bold">Fasiliteter</label>
                <div class="row">

                  <?php

                  $res = selectAll('fasiliteter');
                  while ($opt = mysqli_fetch_assoc($res)) {
                    echo " 
                    <div class='col-md-3 mb-1'>
                    <label> 
                    <input type='checkbox' name='fasiliteter[]' value='$opt[id]' class='form-check-input shadow-none'>

                      $opt[name]
                    </label>
                    </div>
                    ";
                  }

                  ?>
                </div>
              </div>

              <div class="col-12 mb-3">

                <label class="form-label fw-bold">Beskrivelse </label>
                <textarea name="beskrivelse" rows="4" class="form-control shadow-none required"></textarea>

              </div>

              <input type="hidden" name="rom_id">

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



  <div class="modal fade" id="edit-rom" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <form id="add_rom_form" autocomplete="off">

    

        <div class="modal-content ">
          <div class="modal-header">
            <h5 class="modal-title">Add Rom </h5>

          </div>
          <div class="modal-body">

            <div class="row">

              <div class="col-md-6 mb-3">

                <label class="form-label fw-bold">Navn </label>
                <input type="text" name="name" class="form-control shadow-none" required>

              </div>

              <div class="col-md-6 mb-3">

                <label class="form-label fw-bold">Areal </label>
                <input type="number" min="1" name="areal" class="form-control shadow-none" required>

              </div>

              <div class="col-md-6 mb-3">

                <label class="form-label fw-bold">Pris </label>
                <input type="number" min="1" name="pris" class="form-control shadow-none" required>

              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Kvalitet </label>
                <input type="number" min="1" name="kvalitet" class="form-control shadow-none" required>

              </div>
              <div class="col-md-6 mb-3">

                <label class="form-label fw-bold">Voksen(Max.) </label>
                <input type="number" min="1" name="voksen" class="form-control shadow-none" required>

              </div>
              <div class="col-md-6 mb-3">

                <label class="form-label fw-bold">Barn(Max.) </label>
                <input type="number" min="1" name="barn" class="form-control shadow-none" required>

              </div>

              <div class="col-12 mb-3">
                <label class="form-label fw-bold">Funksjoner</label>
                <div class="row">

                  <?php

                  $res = selectAll('funksjoner');
                  while ($opt = mysqli_fetch_assoc($res)) {
                    echo " 
                    <div class='col-md-3 mb-1'>
                     <label> 
                     <input type='checkbox' name='funksjoner[]' value='$opt[id]' class='form-check-input shadow-none'>

                       $opt[name]
                     </label>
                     </div>
                    ";
                  }

                  ?>
                </div>
              </div>

              <div class="col-12 mb-3">
                <label class="form-label fw-bold">Fasiliteter</label>
                <div class="row">

                  <?php

                  $res = selectAll('fasiliteter');
                  while ($opt = mysqli_fetch_assoc($res)) {
                    echo " 
                    <div class='col-md-3 mb-1'>
                    <label> 
                    <input type='checkbox' name='fasiliteter[]' value='$opt[id]' class='form-check-input shadow-none'>

                      $opt[name]
                    </label>
                    </div>
                    ";
                  }

                  ?>
                </div>
              </div>

              <div class="col-12 mb-3">

                <label class="form-label fw-bold">Beskrivelse </label>
                <textarea name="beskrivelse" rows="4" class="form-control shadow-none required"></textarea>

              </div>



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


<!-- rom image modal-->
<div class="modal fade" id="rom-images" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ">Rom Navn</h5>
        <button type="button" class="btn-close shadow-nano" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="image-alert"></div>
        <div class="border-bottom border-3 pb-3 mb-3">
          <form id="add_image_form">
          <label class="form-label fw-bold">Legge bilde  </label>
          <input type="file" name="image"  accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none mb-3" required>
          <button  class="btn custom-bg text-white shadow-none ">Add</button>
          <input type="hidden" name="room_id">
          </form>
        </div>
        <div class="table-responsive-lg" style="height: 350px; overflow-y: scroll;">
              <table class="table table-hover border text-center">
                <thead>
                  <tr class="bg-dark text-light sticky-top">
                    <th scope="col" width="60%">Image</th>
                    <th scope="col">Thumb</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody id="rom-image-data">

                </tbody>
              </table>
            </div>
      </div>
      
    </div>
  </div>
</div>


  <?php require(__DIR__ . '/../public/js/script.php'); ?>

  <script src="scripts/rom.js">   </script>
    
</body>

</html>