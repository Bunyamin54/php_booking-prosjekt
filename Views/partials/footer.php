<h2 class="mt-5 pl-4 mb-4 text-center fw-bold h-font"></h2>

<div class="container-fluid bg-white mt-5">

    <div class="row">

        <div class="col-lg-4 p-4">

    <h3 class="h-font fw-bold fs-3 mb-2"> UIA MOTEL</h3>

      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores, mollitia dignissimos perspiciatis nam dolor delectus in qui eaque itaque amet? </p>
        </div>

        <div class="col-lg-4 p-4">

   <h5 class="mb-3">Links</h5>
   <a href="hjem.php" class="d-inline-block mb-2 text-dark text-decoration-none">Hjem</a> <br>
   <a href="rom.php" class="d-inline-block mb-2 text-dark text-decoration-none">Rom</a> <br>
   <a href="fasiliteter.php" class="d-inline-block mb-2 text-dark text-decoration-none">Fasiliteter</a> <br>
   <a href="kontakt.php" class="d-inline-block mb-2 text-dark text-decoration-none">Kontakt oss</a> <br>
   <a href="om.php" class="d-inline-block mb-2 text-dark text-decoration-none">Om</a>

        </div>

        <div class="col-lg-4 p-4">

       <h5 class="mb-3">Følg oss</h5>
       <?php 
       if($contact_r['tw'] != '') {
        echo <<<data
            <a href="$contact_r [tw] " class="d-inline-block text-dark text-decoration-none mb-2">
            <i class="bi bi-twitter me-1"></i> Twitter</a> <br>
        data;
    }
       
       ?>
       <a href="<?php echo $contact_r ['fb'] ?>" class="d-inline-block text-dark text-decoration-none mb-2"> 
        <i class="bi bi-facebook me-1"></i> Facebook</a> <br>
       <a href="<?php echo $contact_r ['insta'] ?>" class="d-inline-block text-dark text-decoration-none mb-2">
        <i class="bi bi-instagram me-1"></i> Instagram</a> <br>
        <a href="<?php echo $contact_r ['yt'] ?>" class="d-inline-block text-dark text-decoration-none">
        <i class="bi bi-youtube me-1"></i> Youtube</a> <br>

        </div>
    </div>
</div>

<h6 class="footer-h6 text-center p-3 m-0">Designet og utviklet av Gruppe 2</h6>

<script>
function setActive() {
    let navbar = document.getElementById('nav-bar');
    let a_tags =navbar.getElementTagName('a');
    for(i=0; i<a_tags.length; i++){
        let file  = a_tags[i].href.split('/').pop();
        let file_name = file.split('.')[0];
        if(document.location.href.indexOf(file_name)>=0){
           a_tags[i].classList.add('active') 

        }




    } 
    
}
  

 let register_form = document.getElementById('register-form');

 register_form.addEventListener('submit', function(e){
     e.preventDefault();
     let data = new FormData();

     data.append('name', register_form.elements['name'].value);
     data.append('email', register_form.elements['email'].value);
     data.append('telefon', register_form.elements['telefon'].value);
     data.append('adress', register_form.elements['adress'].value);
     data.append('postadress', register_form.elements['postadress'].value);
     data.append('dob', register_form.elements['dob'].value);
     data.append('pass', register_form.elements['pass'].value);
     data.append('cpass', register_form.elements['cpass'].value);
     data.append('profile', register_form.elements['profile'].files[0]);
     data.append('register', '');


    var myModal = document.getElementById('registerModal');
    var myModal = bootstrap.Modal.getInstance(myModal);
    myModal.hide();

    let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/login_register.php", true);
  

  xhr.onload = function() {
   
  }

    xhr.send(data);


 });





setActive();

</script>
