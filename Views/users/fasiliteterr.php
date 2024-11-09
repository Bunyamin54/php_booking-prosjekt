<!doctype html>
<html lang="no">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title> <?php echo $instillinger_r['site_title']  ?> UIA Motel Fasiliteter </title>



  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <link rel="stylesheet" href="../../public/css/styles.css">
  <?php require_once '../partials/links.php'; ?>

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
  <?php require_once 'login_registering.php'; ?>

  <!-- <?php require_once './fasiliteter.php'; ?> -->


  <div class="my-5 px-4">

    <h2 class="fw-bold h-font text-center ">Vår Fasiliteter</h2>

    <div class="h-line bg-white "> </div>


    <p class="text-center mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui ad aliquid illum minusearum placeat veniam at sequi consequuntur numquam?Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, id.</p>

    <div class="container">
      <div class="row">
        <?php

        $res = selectAll('fasiliteter');
        $path = FASILITETER_IMG_PATH;

        while ($row = mysqli_fetch_assoc($res)) {

          echo <<<data
  
          <div class="col-lg-4 col-md-6 mb-5 px-4">

          <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
            <div class="d-flex align-items-center mb-2">

            <img src="$path$row[icon]" width="40px">
            <h5 class="m-0 ms-3">$row[name]</h5>
            </div>
            <p>$row[beskrivelse]</p> 
            </div>
            </div>

    data;
        }
        ?>
       
    </div>

  </div>


  <?php require_once '../partials/footer.php'; ?>










</body>

</html>