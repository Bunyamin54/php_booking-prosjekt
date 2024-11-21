<!--  //? Login Modal -->


<!--  // ? Added login modal for user authentication -->

<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="login-form">
        <div class="modal-header">
          <i class="bi bi-person-circle fs-3 me-2"></i>
          <h5 class="modal-title" id="loginModalLabel">Logg inn</h5>
          <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Email/Mobile</label>
            <input type="text" name="email_mob" required class="form-control shadow-none">
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="pass" required class="form-control shadow-none">
          </div>
          <div class="d-flex align-items-center justify-content-between mt-3">
            <button type="submit" class="btn btn-warning shadow-none me-lg-3 me-2">Logg inn</button>
            <button type="button" class="btn text-secondary text-decoration-none shadow-none p-0" data-bs-toggle="modal" data-bs-target="#forgotModal" data-bs-dismiss="modal">
              Glemt passord?
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>







<!--  //? Added registration modal with form fields for user details -->
<!-- //*  Register Modal -->

<div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="inert">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="register-form">
        <div class="modal-header">
          <i class="bi bi-person-lines-fill fs-3 me-2"></i>
          <h5 class="modal-title" id="registerModalLabel">Opprett en ny konto</h5>
          <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <span class="badge text-bg-light text-dark mb-3 text-wrap lh-base">Notat: Detaljene dine må samsvare med ID-en din (ID kort, pass, førerkort, etc, som vil være nødvendig under innsjekking)</span>
          <div class="container fluid">
            <div class="row">
              <div class="col-md-6 ps-0 mb-3">
                <label class="form-label">Navn</label>
                <input name="name" type="text" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 ps-0 mb-3">
                <label class="form-label">Email</label>
                <input name="email" type="email" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 ps-0 mb-3">
                <label class="form-label">Telefon</label>
                <input name="telefon" type="number" class="form-control shadow-none" required>
              </div>

              <div class="col-md-12 ps-0 mb-3">

                <label class="form-label">Adress </label>
                <textarea name="adress" class="form-control shadow-none" rows="1" required></textarea>
              </div>
              <div class="col-md-6 ps-0 mb-3">
                <label class="form-label">Post Adressen</label>
                <input name="post_num" type="number" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 ps-0 mb-3">
                <label for="birthDatePicker" class="form-label">Fødsels dato</label>
                <input name="dob" id="birthDatePicker" type="text" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 ps-0 mb-3">
                <label class="form-label">Passord</label>
                <input name="pass" type="password" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 ps-0 mb-3">
                <label class="form-label">Bekreft passord</label>
                <input name="cpass" type="password" class="form-control shadow-none" required>
              </div>
            </div>
            <div class="text-center my-1">
              <button type="submit" class="btn btn-warning shadow-none">Opprett konto</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="forgotModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="inert">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="forgot-form">
        <div class="modal-header">
          <h4 class="modal-title d-flex align-items-center">
            <i class="bi bi-person-circle fs-3 me-2"></i>Glemt password
          </h4>
        </div>
        <div class="modal-body">
          <span class="badge text-bg-light text-dark mb-3 text-wrap lh-base">Note: A link will be sent to your email to reset your password</span>
          <div class="mb-4">
            <label class="form-label">Email</label>
            <input type="email" name="email" required class="form-control shadow-none">


            <div class="mb-2 text-end">

              <button type="button" class="btn shadow-none p- me-2" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">
                Kanseller
              </button>
              <button type="submit" class="btn btn-dark shadow-none">Send link</button>
            </div>
          </div>
      </form>
    </div>
  </div>
</div>