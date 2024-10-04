<!doctype html>
<html lang="no">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rom</title>

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

    .room-card {
      max-width: 350px;
      margin: 15px;
    }

    /* Checkboksları sola dayalı tutmak için */
    .form-check {
      display: flex;
      align-items: center;
      margin-bottom: 5px;
    }
    .form-check-label {
      margin-left: 5px;
    }
  </style>

</head>

<body class="bg-light">

  <?php require_once './/inc/header.php'; ?>


  <div class="my-5 px-4">

    <h2 class="fw-bold h-font text-center">Vår Rom</h2>
    <div class="h-line bg-dark"></div>
    <div class="container">
      <div class="row">

        <!-- Sol taraf: Checkbox ve Filtre -->
        <div class="col-lg-3 col-md-12 mb-4">
          <nav class="navbar navbar-expand-lg bg-body-tertiary rounded shadow">
            <div class="container-fluid flex-lg-column align-items-stretch">
              <a class="navbar-brand" href="#">Filtreler</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="filterDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="filterDropdown">
                <div class="border bg-light p-3 rounded mb-3">
                  <h5 class="mb-3" style="font-size: 18px;">Check Availability</h5>
                  <label class="form-label">Check-in</label>
                  <input type="date" class="form-control shadow-none mb-3">
                  <label class="form-label">Check-out</label>
                  <input type="date" class="form-control shadow-none">
                  <div class="border bg-light p-3 rounded mb-3 mt-3">
                    <h5 class="mb-3" style="font-size: 18px;">Facilities</h5>

                    <div class="form-check">
                      <input type="checkbox" id="f1" class="form-check-input shadow-none me-1">
                      <label class="form-check-label" for="f1">Facility en</label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" id="f2" class="form-check-input shadow-none me-1">
                      <label class="form-check-label" for="f2">Facility to</label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" id="f3" class="form-check-input shadow-none me-1">
                      <label class="form-check-label" for="f3">Facility tre</label>
                    </div>

                  </div>

                  <div class="border bg-light p-3 rounded mb-3">
                    <h5 class="mb-3" style="font-size: 18px;">Gjest</h5>
                    <div class="d-flex justify-content-between">
                      <div class="me-3 flex-grow-1">
                        <label class="form-label">Adults</label>
                        <input type="number" class="form-control shadow-none">
                      </div>
                      <div class="flex-grow-1">
                        <label class="form-label">Children</label>
                        <input type="number" class="form-control shadow-none">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>

        <!-- Sağ taraf: Oda Kartları -->
        <div class="col-lg-9 col-md-12">
          <div class="row justify-content-center">

            <!-- İlk Oda -->
            <div class="col-lg-4 col-md-6">
              <div class="card border-0 shadow room-card">
                <img src="images/rooms/11.jpeg" class="card-img-top">
                <div class="card-body">
                  <h5>Enkeltrom</h5>
                  <h5 class="mb-4">fra NOK 1500 per natt</h5>
                  <div class="features mb-4">
                    <h6 class="mb-1">Romdetaljer</h6>
                    <span class="badge text-bg-light text-success mb-3 text-wrap">1 Rommenet</span>
                    <span class="badge text-bg-light text-success mb-3 text-wrap">1 Bad</span>
                    <span class="badge text-bg-light text-success mb-3 text-wrap">1 Balkong</span>
                    <span class="badge text-bg-light text-success mb-3 text-wrap">1 Sofa</span>
                  </div>
                  <div class="fasiliteter mb-4">
                    <h6 class="mb-1">Fasiliteter</h6>
                    <span class="badge text-bg-light text-success mb-3 text-wrap">Internett</span>
                    <span class="badge text-bg-light text-success mb-3 text-wrap">Smart Tv</span>
                    <span class="badge text-bg-light text-success mb-3 text-wrap">Klimaet</span>
                    <span class="badge text-bg-light text-success mb-3 text-wrap">Ovn</span>
                  </div>
                  <div class="vurdering mb-4">
                    <h6 class="mb-1">Vurdering</h6>
                    <span class="badge roundend-pill bg-light text-success mb-3 text-wrap">
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                    </span>
                  </div>
                  <div class="d-flex justify-content-evenly mb-2">
                    <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Bestill Rom</a>
                    <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Mer info</a>
                  </div>
                </div>
              </div>
            </div>

            <!-- İkinci Oda -->
            <div class="col-lg-4 col-md-6">
              <div class="card border-0 shadow room-card">
                <img src="images/rooms/9.jpg" class="card-img-top">
                <div class="card-body">
                  <h5>Junior Suite med utsikt</h5>
                  <h5 class="mb-4">fra NOK 2000 per natt</h5>
                  <div class="features mb-4">
                    <h6 class="mb-1">Romdetaljer</h6>
                    <span class="badge text-bg-light text-success mb-3 text-wrap">2 Rommenet</span>
                    <span class="badge text-bg-light text-success mb-3 text-wrap">1 Bad</span>
                    <span class="badge text-bg-light text-success mb-3 text-wrap">1 Balkong</span>
                    <span class="badge text-bg-light text-success mb-3 text-wrap">1 Sofa</span>
                  </div>
                  <div class="fasiliteter mb-4">
                    <h6 class="mb-1">Fasiliteter</h6>
                    <span class="badge text-bg-light text-success mb-3 text-wrap">Internett</span>
                    <span class="badge text-bg-light text-success mb-3 text-wrap">Smart Tv</span>
                    <span class="badge text-bg-light text-success mb-3 text-wrap">Klimaet</span>
                    <span class="badge text-bg-light text-success mb-3 text-wrap">Ovn</span>
                  </div>
                  <div class="vurdering mb-4">
                    <h6 class="mb-1">Vurdering</h6>
                    <span class="badge roundend-pill bg-light text-success mb-3 text-wrap">
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                    </span>
                  </div>
                  <div class="d-flex justify-content-evenly mb-2">
                    <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Bestill Rom</a>
                    <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Mer info</a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Üçüncü Oda -->
            <div class="col-lg-4 col-md-6">
              <div class="card border-0 shadow room-card">
                <img src="images/rooms/10.jpg" class="card-img-top">
                <div class="card-body">
                  <h5>Dobbel familierom</h5>
                  <h5 class="mb-4">fra NOK 2500 per natt</h5>
                  <div class="features mb-4">
                    <h6 class="mb-1">Romdetaljer</h6>
                    <span class="badge text-bg-light text-success mb-3 text-wrap">2 Rommenet</span>
                    <span class="badge text-bg-light text-success mb-3 text-wrap">2 Bad</span>
                    <span class="badge text-bg-light text-success mb-3 text-wrap">1 Balkong</span>
                    <span class="badge text-bg-light text-success mb-3 text-wrap">3 Sofa</span>
                  </div>
                  <div class="fasiliteter mb-4">
                    <h6 class="mb-1">Fasiliteter</h6>
                    <span class="badge text-bg-light text-success mb-3 text-wrap">Internett</span>
                    <span class="badge text-bg-light text-success mb-3 text-wrap">Smart Tv</span>
                    <span class="badge text-bg-light text-success mb-3 text-wrap">Klimaet</span>
                    <span class="badge text-bg-light text-success mb-3 text-wrap">Ovn</span>
                  </div>
                  <div class="vurdering mb-4">
                    <h6 class="mb-1">Vurdering</h6>
                    <span class="badge roundend-pill bg-light text-success mb-3 text-wrap">
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                    </span>
                  </div>
                  <div class="d-flex justify-content-evenly mb-2">
                    <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Bestill Rom</a>
                    <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Mer info</a>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>

      <div class="col-lg-12 text-center mt-5">
        <a href="#" class="btn btn-sm btn-outline-success rounded-0 fw-bold shadow-none">Mer rom>>></a>
      </div>
    </div>
  </div>

  <?php require_once './/inc/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+AMvbq1zM1F1zRh7VKH+8abu0qmr8" crossorigin="anonymous"></script>

</body>

</html>
