<?php

require('../Helpers/Utils.php');

adminLogin();


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <title>Admin Panel - Instillinger </title>






  <?php require('../Views/partials/links.php'); ?>


  <link rel="stylesheet" href="../public/css/styles.css">





</head>

<body class="bg-light">

  <?php require('./admin-header.php'); ?>
  <div class="container-fluid" id="main-content">
    <div class="row">
      <div class="col-lg-10 ms-auto p-4 overflow-hidden">

        <h3 class="mb-4">Instillinger</h3>

        <!-- // * Instillinger form -->

        <div class="card border-0 shadow-sm mb-4" style="min-width: 100%;">
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
            <p class="card-text" id="site_title"></p>
            <h5 class="card-subtitle mb-1 fw-bold">Om oss</h5>
            <p class="card-text" id="site_om"></p>

          </div>
        </div>



        <!-- // * Generel Instillinger form -->



        <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form>

              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Generelt Instillinger</h5>

                </div>
                <div class="modal-body">
                  <div class="mb-3">

                    <label class="form-label">Site Title</label>
                    <input type="text" name="site_title" id="site_title_inp" class="form-control shadow-none">

                  </div>
                  <div class="mb-3">

                    <label class="form-label">Om oss </label>
                    <textarea name="site_om" id="site_om_inp" class="form-control shadow-none" rows="6"></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" onclick="site_title.value = general_data.site_title, site_om.value=general_data.site_om " class="btn text-secondary shadow-none" data-bs-dismiss="modal">Kanseller</button>
                  <button type="button" onclick="upd_general(site_title.value, site_om.value)" class="btn custom-bg text-white shadow-none ">Send inn</button>



                </div>
              </div>

            </form>

          </div>
        </div>


        <!--  //* Shutdon settings section -->



        <div class="card" style="min-width: 100%;">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <h4 class="card-title m-0">
                Shutdown Nettside
              </h4>

              <div class="form-check form-switch">
                 <form>


                 <input  onchange="upd_shutdown(this.value)" class="form-check-input" type="checkbox" id="shutdown_toggle">



                 </form>
               
              </div>

            </div>


            <p class="card-text">


              No customers will be allowed to book hotel room , when the site is shutdown.


            </p>


          </div>
        </div>


      </div>
    </div>
  </div>

  <?php require('../public/js/script.php'); ?>

  <script>
    let general_data;


    function get_general()

    {
      let site_title = document.getElementById('site_title');

      let site_om = document.getElementById('site_om');


      let site_title_inp = document.getElementById('site_title_inp');
      let site_om_inp = document.getElementById('site_om_inp');

      let shutdown_toggle = document.getElementById('shutdown_toggle');



      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/instillinger_crud.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

      xhr.onload = function() {





        console.log(this.responseText);
        try {
          general_data = JSON.parse(this.responseText);

          site_title.innerText = general_data.site_title;
          site_om.innerText = general_data.site_om;

          site_title_inp.value = general_data.site_title;
          site_om_inp.value = general_data.site_om;


          if (general_data.shutdown == 0) {
            shutdown_toggle.checked = false;
            shutdown_toggle.value = 0;
          } 
          else {
            shutdown_toggle.checked = true;
            shutdown_toggle.value = 1;
          }

        } catch (e) {
          console.error('not valued:', e);
        }
      };



      xhr.send('get_general');
    }

    function upd_general(site_title_val, site_om_val) {
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/instillinger_crud.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

      xhr.onload = function() {

        var myModal = document.getElementById('general-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();


        if (this.responseText == 1) {
          alert('success', 'Data updated successfully');
          get_general();


        } else {
          alert('danger', 'Data not updated');
        }
      };

      xhr.send('site_title=' + site_title_val + '&site_om=' + site_om_val + '&update_general=1');

    }

   function upd_shutdown(val) 
    
     {
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/instillinger_crud.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

      xhr.onload = function() {

        if (this.responseText == 1  && general_data.shutdown == 0) {
          alert('success', 'Site has been shutdown!');
          get_general();


     } else {
          alert('success', 'Shutdown mode off');
        }
         get_general();
      };

      xhr.send('upd_shutdown=' + val );

    }



    window.onload = function() {
      get_general();
    }

  </script>

</body>

</html>