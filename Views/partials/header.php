<!-- //? Navbar -->

<nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="../../public/index.php">UIA MOTEL</a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active me-2" aria-current="page" href="../public/index.php">Hjem</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="./users/rom.php">Rom</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="../users/fasiliteter.php">Fasiliteter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="../users/kontakt.php">Kontakt oss</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="../users/om.php">Om</a>
                </li>
            </ul>
            <div class="d-flex">
                <button type="button" class="btn btn-outline-success shadow-none me-lg-2 me-3" data-bs-toggle="modal" data-bs-target="#loginModal">
                    Logg inn
                </button>
                <button type="button" class="btn btn-outline-warning shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">
                    Register
                </button>
            </div>
        </div>
    </div>
</nav>