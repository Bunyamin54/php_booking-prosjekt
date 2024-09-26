<!doctype html>
<html lang="no">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UIA Motel</title>


</head>

<body class="bg-light">


  <?php

  // ? Include the components
  require_once './/inc/links.php';

  require_once './/inc/header.php';

  require_once './/inc/hjem.php';
  require_once './/inc/availability-form.php';
  require_once './/inc/rom-cards.php';
  require_once './/inc/fasiliteter.php';
  require_once './/inc/anmeldelser.php';
  require_once './/inc/adressen-var.php';
  require_once './/inc/login_registering.php';
  // include './components/availability-form.php';
  // include './components/rom-cards.php';
  // include './components/fasiliteter.php';
  // include './components/anmeldelser.php';
  // include './components/adressen-var.php';
  // include './components/login_registering.php';
  require_once './/inc/footer.php';

  ?>

  <!-- //? javascript og jquery -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

  <!-- //? Swiper and datepicker -->

  <script>
    $(function() {
      $('#checkInDatePicker').datepicker({
        showButtonPanel: true,
        dateFormat: 'dd-mm-yy'
      }).datepicker("setDate", new Date());
      $('#checkOutDatePicker').datepicker({
        showButtonPanel: true,
        dateFormat: 'dd-mm-yy'
      }).datepicker("setDate", new Date());
      $('#birthDatePicker').datepicker({
        showButtonPanel: true,
        dateFormat: 'dd-mm-yy'
      }).datepicker("setDate", new Date());
    });

    var swiper = new Swiper(".swiper-container", {
      spaceBetween: 30,
      effect: "fade",
      loop: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
    });


    <
    !--Initialize Swiper-- >

    var swiper = new Swiper(".swiper-anmeldelser", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      slidesPerView: "3",
      loop: true,

      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: false,

      },
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