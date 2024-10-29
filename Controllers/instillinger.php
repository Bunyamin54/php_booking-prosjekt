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
            <form id="general_s_form">

              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Generelt Instillinger</h5>

                </div>
                <div class="modal-body">
                  <div class="mb-3">

                    <label class="form-label fw-bold">Site Title</label>
                    <input type="text" name="site_title" id="site_title_inp" class="form-control shadow-none" required>

                  </div>
                  <div class="mb-3">

                    <label class="form-label fw-bold">Om oss </label>
                    <textarea name="site_om" id="site_om_inp" class="form-control shadow-none" rows="6" required></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" onclick="site_title.value = general_data.site_title, site_om.value=general_data.site_om " class="btn text-secondary shadow-none" data-bs-dismiss="modal">Kanseller</button>
                  <button type="submit" class="btn custom-bg text-white shadow-none ">Send inn</button>



                </div>
              </div>

            </form>

          </div>
        </div>


        <!--  //* Shutdon settings section -->



        <div class="card border-0 shadow-none mb-4" style="min-width: 100%;">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <h4 class="card-title m-0">
                Shutdown Nettside
              </h4>

              <div class="form-check form-switch">
                <form>


                  <input onchange="upd_shutdown(this.value)" class="form-check-input" type="checkbox" id="shutdown_toggle">



                </form>

              </div>

            </div>


            <p class="card-text">


              No customers will be allowed to book hotel room , when the site is shutdown.


            </p>


          </div>
        </div>


        <!--  //* Kontakt details section -->


        <div class="card border-0 shadow-sm mb-4" style="min-width: 100%;">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <h4 class="card-title m-0 fw-bold">
                Kontakt Innstillinger
              </h4>

              <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#contacts-s">
                <i class="bi bi-pencil-square "></i> Rediger
              </button>
            </div>

            <div class="row">

              <div class="col-lg-6">
                <div class="mb-4">
                  <h6 class="card-subtitle mb-1 fw-bold">Adress</h6>
                  <p class="card-text" id="address"></p>
                </div>
                <div class="mb-4">
                  <h6 class="card-subtitle mb-1 fw-bold">Google Map</h6>
                  <p class="card-text" id="gmap"></p>
                </div>
                <div class="mb-4">
                  <h6 class="card-subtitle mb-1 fw-bold">Telefon Nummer</h6>
                  <p class="card-text mb-1">
                    <i class="bi bi-telephone-fill"></i> <span id="phone"></span>
                  </p>
                </div>
                <div class="mb-4">
                  <h6 class="card-subtitle mb-1 fw-bold">Email</h6>
                  <p class="card-text" id="email"></p>
                </div>
              </div>


              <div class="col-lg-6">

                <div class="mb-4">
                  <h6 class="card-subtitle mb-1 fw-bold">Sosial media</h6>
                  <p class="card-text mb-1">
                    <i class="bi bi-twitter me-1" style="color: #1DA1F2"></i>
                    <span id="tw"></span>
                  </p>
                  <p class="card-text mb-1">
                    <i class="bi bi-instagram me-1" style="color: #E4405F;"></i>
                    <span id="insta"></span>
                  </p>
                  <p class="card-text mb-1">
                    <i class="bi bi-facebook me-1" style="color: #1877F2;"></i>
                    <span id="fb"></span>
                  </p>
                  <p class="card-text mb-1">
                    <i class="bi bi-youtube me-1" style="color: #FF0000;"></i>
                    <span id="yt"></span>
                  </p>
                </div>

                <!-- iFrame -->
                <div class="mb-4">
                  <h6 class="card-subtitle mb-1 fw-bold">iFrame</h6>
                  <iframe id="iframe" class="border p-2 w-100" style="height: 150px;" loading="lazy"></iframe>
                </div>
              </div>
            </div>


          </div>
        </div>

        <!--  //* Kontakt details modal -->

        <div class="modal fade" id="contacts-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <form id="contacts_s_form">

              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Kontakt Instillinger</h5>

                </div>




                <div class="modal-body">

                  <div class="container-fluid p-0">
                    <div class="row">
                      <!-- Left side (Address, Google Map, Phone, Email) -->
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label class="form-label fw-bold">Address</label>
                          <input type="text" name="address" id="address_inp" class="form-control shadow-none" required>
                        </div>

                        <div class="mb-3">
                          <label class="form-label fw-bold">Google Map link</label>
                          <input type="text" name="gmap" id="gmap_inp" class="form-control shadow-none" required>
                        </div>

                        <div class="mb-3">
                          <label class="form-label fw-bold">Telefon Nummer (with country code)</label>
                          <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                            <input type="text" name="phone" id="phone_inp" class="form-control shadow-none" required>
                          </div>
                        </div>

                        <div class="mb-3">
                          <label class="form-label fw-bold">Email</label>
                          <input type="email" name="email" id="email_inp" class="form-control shadow-none" required>
                        </div>
                      </div>

                      <!-- Right side (Social Media) -->
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label class="form-label fw-bold">Social Media</label>

                          <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-twitter" style="color: #1DA1F2;"></i></span>
                            <input type="text" name="tw" id="tw_inp" class="form-control shadow-none" required>

                          </div>


                          <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-instagram" style="color: #E4405F;"></i></span>
                            <input type="text" name="insta" id="insta_inp" class="form-control shadow-none" required>
                          </div>

                          <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-facebook" style="color: #1877F2;"></i></span>
                            <input type="text" name="fb" id="fb_inp" class="form-control shadow-none" required>
                          </div>



                          <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-youtube" style="color: #FF0000;"></i></span>
                            <input type="text" name="yt" id="yt_inp" class="form-control shadow-none" required>
                          </div>



                          <div class="mb-3">
                            <label class="form-label fw-bold">iFrame Src</label>
                            <input type="text" name="iframe" id="iframe_inp" class="form-control shadow-none" required>
                          </div>


                        </div>
                      </div>
                    </div>
                  </div>
                </div>





                <div class="modal-footer">
                  <button type="button" onclick="contacts_inp(contacts_data) " class="btn text-secondary shadow-none" data-bs-dismiss="modal">Kanseller</button>
                  <button type="submit" class="btn custom-bg text-white shadow-none ">Send inn</button>



                </div>
              </div>

            </form>

          </div>
        </div>

        <!--  // * Management Team section  -->

        <div class="card border-0 shadow-sm mb-4" style="min-width: 100%;">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <h4 class="card-title m-0">
                Management Team
              </h4>

              <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#team-s">
                <i class="bi bi-plus-square"></i> Add
              </button>
            </div>

            <div class="row" id="team-data">

            </div>

          </div>
        </div>


        <!--  //*  Management Team Modal Form  -->

        <div class="modal fade" id="team-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form id="team_s_form" enctype="multipart/form-data">

              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Add Team Medlem </h5>

                </div>
                <div class="modal-body">
                  <div class="mb-3">

                    <label class="form-label fw-bold">Navn </label>
                    <input type="text" name="member_name" id="member_name_inp" class="form-control shadow-none" required>

                  </div>
                  <div class="mb-3">

                    <label class="form-label fw-bold">Bilder oss </label>
                    <input type="file" name="member_picture" id="member_picture_inp" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none" required>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" onclick="member_name.value='',member_picture.value = ''" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Kanseller</button>
                  <button type="submit" class="btn custom-bg text-white shadow-none ">Send inn</button>



                </div>
              </div>

            </form>

          </div>
        </div>







      </div>
    </div>
  </div>

  <?php require('../public/js/script.php'); ?>

  <script>
    let general_data, contacts_data;

    let general_s_form = document.getElementById('general_s_form');
    let site_title_inp = document.getElementById('site_title_inp');
    let site_om_inp = document.getElementById('site_om_inp');

    let contacts_s_form = document.getElementById('contacts_s_form');



    let team_s_form = document.getElementById('team_s_form');
    let member_name_inp = document.getElementById('member_name_inp');
    let member_picture_inp = document.getElementById('member_picture_inp');



    function get_general()

    {
      let site_title = document.getElementById('site_title');
      let site_om = document.getElementById('site_om');
      let shutdown_toggle = document.getElementById('shutdown_toggle');



      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/instillinger_crud.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

      xhr.onload = function() {

        try {
          general_data = JSON.parse(this.responseText);

          site_title.innerText = general_data.site_title;
          site_om.innerText = general_data.site_om;

          site_title_inp.value = general_data.site_title;
          site_om_inp.value = general_data.site_om;


          if (general_data.shutdown == 0) {
            shutdown_toggle.checked = false;
            shutdown_toggle.value = 0;
          } else {
            shutdown_toggle.checked = true;
            shutdown_toggle.value = 1;
          }

        } catch (e) {
          console.error('not valued:', e);
        }
      };

      general_s_form.addEventListener('submit', function(e) {
        e.preventDefault();
        upd_general(site_title_inp.value, site_om_inp.value);
      });

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

      xhr.send('site_title=' + site_title_val + '&site_om=' + site_om_val + '&update_general');

    }

    function upd_shutdown(val)

    {
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/instillinger_crud.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

      xhr.onload = function() {

        if (this.responseText == 1 && general_data.shutdown == 0) {
          alert('success', 'Site has been shutdown!');
          get_general();


        } else {
          alert('success', 'Shutdown mode off');
        }
        get_general();
      };

      xhr.send('upd_shutdown=' + val);

    }




    function get_contacts()

    {

      let contacts_p_id = ['address', 'gmap', 'phone', 'email', 'tw', 'insta', 'fb', 'yt'];

      let iframe = document.getElementById('iframe');



      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/instillinger_crud.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

      xhr.onload = function() {
        contacts_data = JSON.parse(this.responseText);
        contacts_data = Object.values(contacts_data);

        for (i = 0; i < contacts_p_id.length; i++) {
          document.getElementById(contacts_p_id[i]).innerText = contacts_data[i + 1];
        }

        iframe.src = contacts_data[9];
        contacts_inp(contacts_data);

      }

      xhr.send('get_contacts');
    }



    function contacts_inp(data)

    {

      let contacts_p_id = ['address_inp', 'gmap_inp', 'phone_inp', 'email_inp', 'tw_inp', 'insta_inp', 'fb_inp', 'yt_inp', 'iframe_inp'];

      for (i = 0; i < contacts_p_id.length; i++) {
        document.getElementById(contacts_p_id[i]).value = data[i + 1];
      }

    }


    contacts_s_form.addEventListener('submit', function(e) {
      e.preventDefault();
      upd_contacts();

    });

    function upd_contacts() {

      let index = ['address', 'gmap', 'phone', 'email', 'tw', 'insta', 'fb', 'yt', 'iframe'];
      let contacts_inp_id = ['address_inp', 'gmap_inp', 'phone_inp', 'email_inp', 'tw_inp', 'insta_inp', 'fb_inp', 'yt_inp', 'iframe_inp'];

      let data_str = "";

      for (i = 0; i < index.length; i++) {
        data_str += index[i] + '=' + document.getElementById(contacts_inp_id[i]).value + '&';


      }
      data_str += 'update_contacts';

      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/instillinger_crud.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

      xhr.onload = function() {

        var myModal = document.getElementById('contacts-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();


        if (this.responseText == 1) {
          alert('success', 'Data updated successfully');
          get_contacts();
        } else {
          alert('danger', 'Data not updated');
        }

      }


      xhr.send(data_str);

    }


    team_s_form.addEventListener('submit', function(e) {
       e.preventDefault();
       add_member();

    });

    function add_member() {
      let data = new FormData();
      data.append('name', member_name_inp.value);
      data.append('picture', member_picture_inp.files[0]);
      data.append('add_member', '');


      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/instillinger_crud.php", true);


      xhr.onload = function() {

      
        var myModal = document.getElementById('team-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

     

        if (this.responseText == 'inv_img') {
          alert('danger', 'Invalid image format or size');
        } else if (this.responseText == 'inv_size') {
          alert('danger', 'Image size should be less than 2mb!');

        } else if (this.responseText == 'upload_failed') {

          alert('danger', 'Error in uploading image');
        } else {
          alert('success', 'Member added successfully');
          member_name_inp.value = '';
          member_picture_inp.value = '';
          get_members();
        }

      }

      xhr.send(data);


    }


      function get_members() 
      {

       let xhr = new XMLHttpRequest(); 
      xhr.open("POST", "ajax/instillinger_crud.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

      xhr.onload = function(){ 
        document.getElementById('team-data').innerHTML = this.responseText;
      }
      
      
      xhr.send('get_members');
    }
    


      function rem_member(val) 
      {
  

      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/instillinger_crud.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

      xhr.onload = function() {

        if (this.responseText == 1) {
          alert('success', 'Member removed successfully');
          get_members();
        } else {
          alert('danger', 'Server down!');
        }

      }

       xhr.send('rem_member=' + val);
    }
 

    window.onload = function() {
      get_general();
      get_contacts();
      get_members();
    }
  </script>

</body>

</html>