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


  <script>
    let funksjoner_s_form = document.getElementById('funksjoner_s_form');
    let fasiliteter_s_form = document.getElementById('fasiliteter_s_form');

    funksjoner_s_form.addEventListener('submit', function(e) {
      e.preventDefault();
      add_funksjoner();

    });


    function add_funksjoner() {
      let data = new FormData();
      data.append('name', funksjoner_s_form.elements['funksjoner_name'].value);
      data.append('add_funksjoner', '');


      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/funksjoner_fasiliteter.php", true);


      xhr.onload = function() {


        var myModal = document.getElementById('funksjoner-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();



        if (this.responseText == 1) {

          alert('success', 'New features added successfully');
          funksjoner_s_form.elements['funksjoner_name'].value = '';

          get_funksjoner();
        } else {
          alert('error', 'Operation Failed!');

        }

      }

      xhr.send(data);


    }


    function get_funksjoner() {

      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/funksjoner_fasiliteter.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

      xhr.onload = function() {
        document.getElementById('funksjoner-data').innerHTML = this.responseText;
      }


      xhr.send('get_funksjoner');
    }



    function rem_funksjoner(val) {


      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/funksjoner_fasiliteter.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

      xhr.onload = function() {

        if (this.responseText == 1) {
          alert('success', 'Funksjoner removed successfully');
          get_funksjoner();
        } else if (this.responseText == 'rom_added') {
          alert('danger', 'Funksjoner is added in room!');
        } else {
          alert('danger', 'Server down!');
        }

      }

      xhr.send('rem_funksjoner=' + val);
    }


    fasiliteter_s_form.addEventListener('submit', function(e) {
      e.preventDefault();
      add_fasiliteter();

    });

    function add_fasiliteter() {
      let data = new FormData();
      data.append('name', fasiliteter_s_form.elements['fasiliteter_name'].value);
      data.append('icon', fasiliteter_s_form.elements['fasiliteter_icon'].files[0]);
      data.append('beskrivelse', fasiliteter_s_form.elements['fasiliteter_beskrivelse'].value);
      data.append('add_fasiliteter', '');


      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/funksjoner_fasiliteter.php", true);


      xhr.onload = function() {


        var myModal = document.getElementById('fasiliteter-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();



        if (this.responseText == 'inv_img') {
          alert('danger', 'Invalid SVG image format');
        } else if (this.responseText == 'inv_size') {
          alert('danger', 'Image size should be less than 1mb!');

        } else if (this.responseText == 'upload_failed') {

          alert('danger', 'Error in uploading image');
        } else {
          alert('success', 'Nye fasiliteter added successfully');

          fasiliteter_s_form.reset();
          get_fasiliteter();

        }

      }

      xhr.send(data);


    }


    function get_fasiliteter() {

      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/funksjoner_fasiliteter.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

      xhr.onload = function() {
        document.getElementById('fasiliteter-data').innerHTML = this.responseText;
      }


      xhr.send('get_fasiliteter');
    }



    function rem_fasiliteter(id) {


      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/funksjoner_fasiliteter.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

      xhr.onload = function() {

        if (this.responseText == 1) {
          alert('success', 'Fasiliteter removed successfully');
          get_fasiliteter();
        } else if (this.responseText == 'rom_added') {
          alert('danger', 'Fasiliteter is added in room!');
        } else {
          alert('danger', 'Server down!');
        }

      }

      xhr.send('rem_fasiliteter=' + id);
    }




    window.onload = function() {
      get_funksjoner();
      get_fasiliteter();
    }
  </script>

</body>

</html>