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



  <?php require(__DIR__ . '/../public/js/script.php'); ?>

  <script>
    let add_rom_form = document.getElementById('add_rom_form');

    add_rom_form.addEventListener('submit', function(e) {
      e.preventDefault();
      add_rom();

    });


    function add_rom() {
      let data = new FormData();
      data.append('add_rom', '');
      data.append('name', add_rom_form.elements['name'].value);
      data.append('areal', add_rom_form.elements['areal'].value);
      data.append('pris', add_rom_form.elements['pris'].value);
      data.append('kvalitet', add_rom_form.elements['kvalitet'].value);
      data.append('voksen', add_rom_form.elements['voksen'].value);
      data.append('barn', add_rom_form.elements['barn'].value);
      data.append('beskrivelse', add_rom_form.elements['beskrivelse'].value);



      let funksjoner = [];
      document.querySelectorAll('input[name="funksjoner[]"]:checked').forEach(el => {
        funksjoner.push(el.value);
      });

      let fasiliteter = [];
      document.querySelectorAll('input[name="fasiliteter[]"]:checked').forEach(el => {
        fasiliteter.push(el.value);
      });


      data.append('funksjoner', JSON.stringify(funksjoner));

      data.append('fasiliteter', JSON.stringify(fasiliteter));

      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/rom.php", true);

      xhr.onload = function() {


        var myModal = document.getElementById('add-rom');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();



        if (this.responseText == 1) {
          alert('success', 'Rom added successfully');
          add_rom_form.reset();
          get_all_rom();
        } else {
          console.log('Failed to add Rom');
        }

      }

      xhr.send(data);


    }


    function get_all_rom() {

      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/rom.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      xhr.onload = function() {

        document.getElementById('rom-data').innerHTML = this.responseText;
      }

      xhr.send('get_all_rom');

    }


    let edit_rom_form = document.getElementById('edit_rom_form');

    function edit_details(id)

    {


      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/rom.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      xhr.onload = function() {
        let data = JSON.parse(this.responseText);

        edit_rom_form.elements['name'].value = data.romdata.name;
        edit_rom_form.elements['areal'].value = data.romdata.areal;
        edit_rom_form.elements['pris'].value = data.romdata.pris;
        edit_rom_form.elements['kvalitet'].value = data.romdata.kvalitet;
        edit_rom_form.elements['voksen'].value = data.romdata.voksen;
        edit_rom_form.elements['barn'].value = data.romdata.barn;
        edit_rom_form.elements['beskrivelse'].value = data.romdata.beskrivelse;
        edit_rom_form.elements['rom_id'].value = data.romdata.id;

        document.querySelectorAll('input[name="funksjoner[]"]').forEach(el => {
          if (el.checked) {
            funksjoner.push(el.value);
          }
        });

        document.querySelectorAll('input[name="fasiliteter[]"]').forEach(el => {
          if (el.checked) {
            fasiliteter.push(el.value);
          }
        });


      }

      xhr.send('get_rom=' + id);

    }


    edit_rom_form.addEventListener('submit', function(e) {
      e.preventDefault();
      submit_edit_rom();

    });


    function submit_edit_rom() {
    console.log('funksjoner elements:', document.querySelectorAll('input[name="funksjoner[]"]'));
    console.log('fasiliteter elements:', document.querySelectorAll('input[name="fasiliteter[]"]'));

    let data = new FormData();

    
    data.append('edit_rom', '');
    data.append('rom_id', edit_rom_form.elements['rom_id'].value);
    data.append('areal', edit_rom_form.elements['areal'].value);
    data.append('pris', edit_rom_form.elements['pris'].value);
    data.append('kvalitet', edit_rom_form.elements['kvalitet'].value);
    data.append('voksen', edit_rom_form.elements['voksen'].value);
    data.append('barn', edit_rom_form.elements['barn'].value);
    data.append('beskrivelse', edit_rom_form.elements['beskrivelse'].value);

    // Funksjoner için değerleri toplama
    let funksjoner = [];
    document.querySelectorAll('input[name="funksjoner[]"]:checked').forEach(el => {
        funksjoner.push(el.value);
    });

    // Fasiliteter için değerleri toplama
    let fasiliteter = [];
    document.querySelectorAll('input[name="fasiliteter[]"]:checked').forEach(el => {
        fasiliteter.push(el.value);
    });

    data.append('funksjoner', JSON.stringify(funksjoner));
    data.append('fasiliteter', JSON.stringify(fasiliteter));

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/rom.php", true);

    xhr.onload = function() {
        var myModal = document.getElementById('edit-rom');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 1) {
            alert('success', 'Rom data added successfully');
            edit_rom_form.reset();
            get_all_rom();
        } else {
            console.log('Failed to add Rom');
        }
    }

    xhr.send(data);
}




    function toggle_status(id, val) {

      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/rom.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      xhr.onload = function() {

        if (this.responseText == 1) {
          alert('success', 'Status updated successfully');
          get_all_rom();
        } else {
          alert('danger', 'Failed to update status');
        }


      }

      xhr.send('toggle_status=' + id + '&value=' + val);

    }





    window.onload = function() {
      get_all_rom();
    }
  </script>
</body>

</html>