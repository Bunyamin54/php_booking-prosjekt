<!doctype html>
<html lang="no">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- // ? Definerer tittelen på nettsiden -->

  <title>UIA Motel Kontakt</title>

    <!-- // ? Inkluderer head.php for å hente head-innholdet  -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- // ? Inkluderer links.php for å hente link-innholdet -->

  <link rel="stylesheet" href="../../public/css/styles.css">
    
  <?php require_once '../partials/links.php'; ?>
    <!-- // ? Inkluderer style.php for å hente style-innholdet -->
  <style>
    .pop:hover {
      border-top-color: var(--teal) !important;
      transform: scale(1.03);
      transition: all 0.3s;
    
    }
    
  </style>

</head>

<body class="bg-light">
  


  <?php require_once '../partials/header.php'; ?>
  <!-- <?php require_once './login_registering.php'; ?>



     <!-- // ? Kontakt oss side innhold -->
     
  <div class="my-5 px-4">  


    <h2 class="fw-bold h-font text-center ">Kontakt oss</h2>

    <div class="h-line bg-white "> </div>


    <p class="text-center mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui ad aliquid illum minusearum placeat veniam at sequi consequuntur numquam?Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, id.</p>

    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 px-4">

          <!-- //  ? iframe for å vise google maps  -->

          <div class="bg-white rounded shadow p-4 ">
          <iframe class="w-100 rounded" height="320px" src="<?php echo $contact_r['iframe']; ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

      
               <!-- // ? Adressen til universitetet -->

              <h5>Adressen</h5>
            <a href="https://maps.app.goo.gl/vnQML2s45hKWNkEN7" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
              <i class="bi bi-geo-alt"></i> <?php echo $contact_r['address'] ?></a>

            
            <!-- // ? Kontakt oss  og følg oss delen med sosila media ikoner -->

              <h5 class="mt-4">Kontakt oss</h5>
            <a href="tel: +<?php echo $contact_r ['phone'] ?>" class="d-inline-block mb-2 text-decoration-none text-dark"> <i class="bi bi-telephone"></i>+<?php echo $contact_r['phone'] ?></a>

          
            <h5 class="mt-4">Email</h5>
            <a href="mailto: <?php echo $contact_r['email'] ?>" class="d-inline-block text-decoration-none text-dark">
              <i class="bi bi-envelope-fill"></i> universityofagder@uia.no
            </a>
            
            <h5 class="mt-4">Følg oss</h5>
             <?php 
             if($contact_r['tw'] != '') {
              echo <<<data
                  <a href="$contact_r ['tw']" class="d-inline-block text-dark fs-3 me-2">
                  <i class="bi bi-twitter me-1"style="color: #1DA1F2"></i> 
             
                  </a>
              data;
          }
          
             
             
             ?>
          
            <a href="<?php echo $contact_r ['insta']?>" class="d-inline-block text-dark fs-3 me-2">
             
                <i class="bi bi-instagram me-1" style="color: #E4405F;"></i> 
            
            </a> 

            <a href="<?php echo $contact_r ['fb']?>" class="d-inline-block text-dark fs-3 me-2">
             
                <i class="bi bi-facebook me-1"style="color: #1877F2;"></i> 
            </a>
          
            <a href="<?php echo $contact_r ['yt']?>" class="d-inline-block text-dark fs-3 me-2">
             
                <i class="bi bi-youtube me-1" style="color: #FF0000;"></i> 
                <i></i>
           
            </a>

          </div>
        </div>

        <div class="col-lg-6 col-md-6 mb-5 px-4">

          <div class="bg-white rounded shadow p-4 ">
           
          <form method="POST">

            <!-- // ? Skjema for å sende melding -->
    
           <h5>Send en melding</h5>

             <div class="mt-3">
              <label class="form-label" style="font-weight: 500;" >Navn</label>
              <input name="name" required type="text" class="form-control shadow-none">
             </div>

              <div class="mt-3">
              <label class="form-label" style="font-weight: 500;" >Telefon</label>
              <input name="phone" required type="tel" class="form-control shadow-none" >
             </div>

             <div class="mt-3">
              <label class="form-label" style="font-weight: 500;" >Email</label>
              <input name="email" required type="email" class="form-control shadow-none" >
             </div>

            

             <div class="mt-3">
              <label class="form-label" style="font-weight: 500;" >Tema</label>
              <input name="subject" required type="text" class="form-control shadow-none" >
             </div>

             <div class="mt-3">
              <label class="form-label" style="font-weight: 500;" >Melding</label> <textarea name="message" required  class="form-control shadow-none" rows="5" style="resize: none;"></textarea>
             
             </div>
             
             <button type="submit" name="send" class="btn text-white custom-bg mt-3">Send</button>

             
          </form>

             
          </div>
        </div>


      </div>
    </div>
  </div>
    <?php 
    if(isset($_POST['send']))
    { 
      $frm_data = filteration($_POST);
      $q = "INSERT INTO `user_queries`(`name`, `phone`, `email`, `subject`, `message`) VALUES (?,?,?,?,?)";
      $values = [$frm_data['name'], $frm_data['phone'], $frm_data['email'], $frm_data['subject'], $frm_data['message']];

      $res = insert($q,$values,'sssss');
      if($res==1){
        alert('success','Mail sent!');
      }
      else {
        alert('error','Server Down! Try again late.');
      }

    }
    
    
    
    ?>

     <!-- // ? Inkluderer footer.php for å hente footer-innholdet -->

  <?php require_once '../partials/footer.php'; ?>


</body>

</html>