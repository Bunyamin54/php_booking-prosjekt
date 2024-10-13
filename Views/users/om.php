<!doctype html>
<html lang="no">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UIA Motel Om oss</title>

    <!-- //?  External CSS for Swiper and custom styles -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

  <link rel="stylesheet" href="../../public/css/styles.css">
  <?php require_once '../partials/links.php'; ?>
  <style>
    .box{
       border-top-color: var(--teal) !important;
       
    }
  </style>

</head>

<body class="bg-light">

    

   <?php require_once '../partials/header.php'; ?>


  <div class="my-5 px-4">

    <!--   // ? Om oss Section -->
  
  <h2 class="fw-bold h-font text-center ">Om Oss</h2>

  <div class="h-line bg-white "> </div>

  <p class="text-center mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui ad aliquid illum minusearum placeat veniam at sequi
     consequuntur numquam?Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, id.</p>

</div>
<div class="container">
  <div class="row justify-content-between align-items-center ">
    <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
  <h3 class="mb-3">Lorem ipsum dolor sit.</h3>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint molestias eos porro possimus voluptas totam nam officiis tenetur, 
    cumque ipsa.</p>
    </div>
    <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
      <img src="../../public/images/about/about.jpg" class="w-100">
    </div>
  </div>
</div>

  <!--   // ? Statistics Section -->

<div class="container mt-5">
  <div class="row">
    <div class="col-lg-3 col-md-6 mb-4 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
      <img src="../../public/images/about/hotel.svg" width="70px">
      <hi class="mt-3">100+ ROOMS</hi>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-4 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
      <img src="../../public/images/about/customers.svg" width="70px">
      <hi class="mt-3">200+ CUSTOMERS</hi>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-4 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
      <img src="../../public/images/about/rating.svg" width="70px">
      <hi class="mt-3">100+ REVIEWS</hi>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-4 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
      <img src="../../public/images/about/hotel.svg" width="70px">
      <hi class="mt-3">100+ ROOMS</hi>
      </div>
    </div>
  </div>
</div>

    <!--   // ? Manager Team Section with Swiper -->

<h3 class="my-5 fw-bold h-font text-center">MANAGER TEAM</h3>
  <div class="container px-4">
  <div class="swiper mySwiper">
    <div class="swiper-wrapper mb-5">
      <div class="swiper-slide bg-white text-center overflow-hidden rounded">
        <img src="../../public/images/about/staff.svg" class="w-100">
        <h5 class="mt-2">Random Name</h5>
      </div>
      <div class="swiper-slide bg-white text-center overflow-hidden rounded">
        <img src="../../public/images/about/staff.svg" class="w-100">
        <h5 class="mt-2">Random Name</h5>
      </div>
      <div class="swiper-slide bg-white text-center overflow-hidden rounded">
        <img src="../../public/images/about/staff.svg" class="w-100">
        <h5 class="mt-2">Random Name</h5>
      </div>
      <div class="swiper-slide bg-white text-center overflow-hidden rounded">
        <img src="../../public/images/about/staff.svg" class="w-100">
        <h5 class="mt-2">Random Name</h5>
      </div>
      
      
    </div>
    <div class="swiper-pagination"></div>
  </div>

  </div>
<?php require_once '../partials/footer.php'; ?>


  <!-- //?  External JavaScript for Swiper -->

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 4,
      spaceBetween:40,
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {

320: {
  slidesPerView: 1,

},

640: {
  slidesPerView: 1,
},
768: {
  slidesPerView: 3,
},
1024: {
  slidesPerView: 4,
},
},
    });
  </script>

</body>
</html>
