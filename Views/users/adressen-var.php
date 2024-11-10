
<!-- // ? Added Google Maps iframe to show the address location -->

<?php
    $contact_q = "SELECT * FROM `contact_details` WHERE sr_no =? ";
    $values = [1];
    $contact_r = mysqli_fetch_assoc(select($contact_q,$values,'i'));
?>

<h2 class="mt-5 pl-4 mb-4 text-center fw-bold h-font">Adressen Vår</h2>

<div class="container">
  <div class="row">

  <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
  <iframe class="w-100 rounded" height="320px"  src="<?php echo $contact_r['iframe'] ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>


     <!-- // ? Added clickable phone and address links -->

    <div class="col-lg-4 col-md-4">
  <div class="bg-white p-4 rounded mb-4 ">
  <h5>Kontakt oss</h5>
   <a href="tel: +<?php echo $contact_r['phone'] ?>" class="d-inline-block mb-2 text-decoration-none text-dark"> <i class="bi bi-telephone"></i>+<?php echo $contact_r['phone'] ?></a>
   <br>
   <a href="#" class="d-inline-block text-decoration-none text-dark">
   Campus Kristiansand, Universitetsveien 25, 4630 Kristiansand, Norge
  </a>
  </div>
   
     
   <!-- // ? Added social media links using Bootstrap badges -->

  <div class="bg-white p-4 rounded mb-4 ">
  <h5 class="mb-4">Følg oss</h5>
  <?php 
    if($contact_r['tw'] != '') {
      echo <<<data
          <a href="$contact_r[tw]" class="d-inline-block mb-3"> 
              <span class="badge bg-light text-dark fs-6 p-2">
                  <i class="bi bi-twitter me-1"></i> Twitter
              </span>
          </a>
          <br>
      data;
  }
  
  ?>
   <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block mb-3"> 
   <span class="badge bg-light text-dark fs-6 p-2 "> 
    <i class="bi bi-facebook me-1"></i> Facebook
   </span>
   </a>
   <br>
   <a href="<?php echo $contact_r['insta'] ?>" class="d-inline-block mb-3"> 
   <span class="badge bg-light text-dark fs-6 p-2 "> 
    <i class="bi bi-instagram me-1"></i> Instagram
   </span>
   </a>  <br>
   <a href="<?php echo $contact_r['yt'] ?>" class="d-inline-block mb-3"> 
   <span class="badge bg-light text-dark fs-6 p-2 "> 
    <i class="bi bi-youtube me-1"></i> Youtube
    <i></i>
   </span>
   </a>
  
    
   <br>
   
  </div>

    </div>
       
  </div>



</div>