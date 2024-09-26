
<!--  //? Login Modal -->


<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <i class="bi bi-person-circle fs-3 me-2"></i>
        <h5 class="modal-title" id="loginModalLabel">Logg inn</h5>
        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Email address</label>
          <input type="email" class="form-control shadow-none">
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control shadow-none">
        </div>
        <div class="d-flex align-items-center justify-content-between mt-3">
          <button type="submit" class="btn btn-warning shadow-none me-lg-3 me-2">Logg inn</button>
          <a href="javascript:void(0)" class="text-secondary text-decoration-none mt-2">Glemt passord?</a>
        </div>
      </div>
    </div>
  </div>
</div>

 <!-- //*  Register Modal -->


<div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
      <i class="bi bi-person-lines-fill fs-3 me-2"></i>
        <h5 class="modal-title" id="registerModalLabel">Opprett en ny konto</h5>
     
        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <span class="badge text-bg-light text-dark mb-3 text-wrap lh-base "> Notat: Detaljene dine må samsvare med ID-en din (ID kort, pass, førerkort, etc, som vil være nødvendig under innsjekking)</span>
      <div class="container fluid">
        <div class="row">
  
       <div class="col md-6 ps-0 mb-3">
  
       <label class="form-label">Navn</label>
       <input type="text" class="form-control shadow-none">

       </div>

       <div class="col md-6 ps-0 mb-3">
  
       <label class="form-label">Email </label>
       <input type="email" class="form-control shadow-none">

       </div>
       <div class="col md-6 ps-0 mb-3">
  
       <label class="form-label">Telefon </label>
       <input type="number" class="form-control shadow-none">

       </div>
       
       <div class="col-md-12 ps-0 mb-3">
  
       <label class="form-label">Adress </label>
       <textarea class="form-control shadow-none"  rows="1"></textarea>
       </div>

       <div class="col-md-6 ps-0 mb-3">
       <label class="form-label">Post Adressen </label>
       <input type="number" class="form-control shadow-none">

       </div>

      <div class="col-md-6 ps-0 mb-3">
    <label for="birthDatePicker" class="form-label">Fødsels dato</label>
    <input id="birthDatePicker" type="text" class="form-control shadow-none">
</div>
       
    
       <div class="col-md-6 ps-0 mb-3">
       <label class="form-label">Passord </label>
       <input type="password" class="form-control shadow-none">

       </div>
       
   
       <div class="col-md-6 ps-0 mb-3">
  
       <label class="form-label">Bekreft passord</label>
       <input type="password" class="form-control shadow-none">
       </div>
      
       <!-- <div><button type="submit" class="btn btn-warning shadow-none me-lg-3 me-2">Register<button> -->

       </div>
       
              
       <div class="text-center my-1">
        <button type="submit"  class="btn btn-warning shadow-none "> Opprett konto </button>
      </div> 


      
            </div>
            </div>
        </div>
        </div>
     </div>
    </div>
 </div>