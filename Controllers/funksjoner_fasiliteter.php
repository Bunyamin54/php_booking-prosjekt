<?php

require(__DIR__ . '/../Config/Database.php');
require(__DIR__ . '/../Helpers/Utils.php');

adminLogin();

if (isset($_GET['seen'])) {
  $frm_data = filteration($_GET);
  
  if ($frm_data['seen'] == 'all') {
    $q = "UPDATE `user_queries` SET `seen` = ?";
    $values = [1];
    
    if (update($q, $values, 'i')) {
      alert('success', 'Marked all as read!');
    } else {
      alert('error', 'Operation Failed!');
    }
  } else {
    $q = "UPDATE `user_queries` SET `seen` = ? WHERE `sr_no` = ?";
    $values = [1, $frm_data['seen']];
    
    if (update($q, $values, 'ii')) {
      alert('success', 'Marked as read!');
    } else {
      alert('error', 'Operation Failed!');
    }
  }
}

if (isset($_GET['del'])) {
  $frm_data = filteration($_GET);
  
  if ($frm_data['del'] == 'all') {
    
  } else {
    $q = "DELETE FROM `user_queries` WHERE `sr_no` = ?";
    $values = [$frm_data['del']];
    
    if (delete($q, $values, 'i')) {
      alert('success', 'Data deleted!');
    } else {
      alert('error', 'Operation Failed!');
    }
  }
}
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
                <thead class="sticky-top">
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








  <?php require(__DIR__ . '/../public/js/script.php'); ?>


   <script>

let funksjoner_s_form = document.getElementById('funksjoner_s_form');

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

 

    if (this.responseText ==1 ) {

      alert('success', 'New features added successfully');
      funksjoner_s_form.elements['funksjoner_name'].value='';

      get_funksjoner();
    } else {
       alert('error', 'Operation Failed!');
    
    }

  }

  xhr.send(data);


}


function get_funksjoner() 
  {

   let xhr = new XMLHttpRequest(); 
  xhr.open("POST", "ajax/funksjoner_fasiliteter.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.onload = function(){ 
    document.getElementById('funksjoner-data').innerHTML = this.responseText;
  }
  
  
  xhr.send('get_funksjoner');
}



function rem_funksjoner(val) 
  {


  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/funksjoner_fasiliteter.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.onload = function() {

    if (this.responseText == 1) {
      alert('success', 'Funksjoner removed successfully');
      get_funksjoner();
    } else if(this.responseText == 'rom_added'){
      alert('danger', 'Funksjoner is added in room!');
    }
    
    else{
      alert('danger', 'Server down!');
    }

  }

   xhr.send('rem_funksjoner=' + val);
}






  window.onload = function() {
    get_funksjoner();
  }
   </script>

</body >

</html>