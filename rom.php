<!doctype html>
<html lang="no">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Rom</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <link rel="stylesheet" href="css/styles.css">
  <?php require_once './/inc/links.php'; ?>
  <style>
    .pop:hover {
      border-top-color: var(--teal) !important;
      transform: scale(1.03);
      transition: all 0.3s;
    }
  </style>

</head>

<body class="bg-light">

  <?php require_once './/inc/header.php'; ?>


  <div class="my-5 px-4">

    <h2 class="fw-bold h-font text-center ">Vår Rom</h2>
    <div class="h-line bg-dark"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
        <nav class="navbar navbar-expand-lg bg-body-tertiary rounded shadow">
  <div class="container-fluid flex-lg-column align-items-stretch">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="filterDropdown">
      <div class="border bg-light p-3 rounded mb-3">
        <h5 class="mb-3" style="font-size: 18px;">Check Availability</h5>
        <label class="form-label" >Check-in</label>
              <input type="date" class="form-control shadow-none mb-3" >
              <label class="form-label" >Check-out</label>
              <input type="date" class="form-control shadow-none" >

      </div>
    </div>
  </div>
</nav>
        </div>

      </div>
    </div>

  </div>


  <?php require_once './/inc/footer.php'; ?>










</body>

</html>