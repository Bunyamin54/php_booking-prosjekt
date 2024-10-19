

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


<script>
 
  function alert(type, message) {
  
     let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';
     let element = document.createElement('div');
     element.innerHTML = ` 
     
      <div class= "alert ${bs_class} alert-dismissible fade show custom-alert" role="alert">
     
        <strong class="me-3">${message}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
        </div>
     
     ` ;
      document.body.appendChild(element);
  
  }

</script>