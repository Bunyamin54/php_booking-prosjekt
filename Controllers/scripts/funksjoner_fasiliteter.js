let funksjoner_s_form = document.getElementById('funksjoner_s_form');
let fasiliteter_s_form = document.getElementById('fasiliteter_s_form');

// Funksjoner form submission
funksjoner_s_form.addEventListener('submit', function(e) {
  e.preventDefault();

  add_funksjoner();
});

function add_funksjoner() {
  let data = new FormData();
  data.append('name', funksjoner_s_form.elements['funksjoner_name'].value);
  data.append('add_funksjoner', '');


  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../ajax/funksjoner_fasiliteter.php", true);

  xhr.onload = function() {
   

    var myModal = document.getElementById('funksjoner-s');
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    if (this.responseText == 1) {
    
      alert('success', 'New features added successfully');
      funksjoner_s_form.elements['funksjoner_name'].value = '';
      get_funksjoner();
    } else {
     
      alert('error', 'Operation Failed!');
    }
  };

  xhr.send(data);
}

// Get funksjoner data
function get_funksjoner() {

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../ajax/funksjoner_fasiliteter.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.onload = function() {
   
    document.getElementById('funksjoner-data').innerHTML = this.responseText;
  };

  xhr.send('get_funksjoner');
}

// Remove funksjoner
function rem_funksjoner(val) {

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../ajax/funksjoner_fasiliteter.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.onload = function() {
    console.log("XHR response for rem_funksjoner:", this.responseText);
    if (this.responseText == 1) {
      alert('success', 'Funksjoner removed successfully');
      get_funksjoner();
    } else if (this.responseText == 'rom_added') {
      alert('danger', 'Funksjoner is added in room!');
    } else {
      alert('danger', 'Server down!');
    }
  };

  xhr.send('rem_funksjoner=' + val);
}

// Fasiliteter form submission
fasiliteter_s_form.addEventListener('submit', function(e) {
  e.preventDefault();
 
  add_fasiliteter();
});

function add_fasiliteter() {
  let data = new FormData();
  data.append('name', fasiliteter_s_form.elements['fasiliteter_name'].value);
  data.append('icon', fasiliteter_s_form.elements['fasiliteter_icon'].files[0]);
  data.append('beskrivelse', fasiliteter_s_form.elements['fasiliteter_beskrivelse'].value);
  data.append('add_fasiliteter', '');
  

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../ajax/funksjoner_fasiliteter.php", true);

  xhr.onload = function() {
    

    var myModal = document.getElementById('fasiliteter-s');
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    if (this.responseText == 'inv_img') {
      console.log("Invalid image format");
      alert('danger', 'Invalid SVG image format');
    } else if (this.responseText == 'inv_size') {
      console.log("Image size is too large");
      alert('danger', 'Image size should be less than 1mb!');
    } else if (this.responseText == 'upload_failed') {
      console.log("Image upload failed");
      alert('danger', 'Error in uploading image');
    } else {
      console.log("Fasiliteter added successfully");
      alert('success', 'Nye fasiliteter added successfully');
      fasiliteter_s_form.reset();
      get_fasiliteter();
    }
  };

  xhr.send(data);
}

// Get fasiliteter data
function get_fasiliteter() {

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../ajax/funksjoner_fasiliteter.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.onload = function() {
   
    document.getElementById('fasiliteter-data').innerHTML = this.responseText;
  };

  xhr.send('get_fasiliteter');
}

// Remove fasiliteter
function rem_fasiliteter(id) {
 
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../ajax/funksjoner_fasiliteter.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.onload = function() {
    console.log("XHR response for rem_fasiliteter:", this.responseText);
    if (this.responseText == 1) {
      alert('success', 'Fasiliteter removed successfully');
      get_fasiliteter();
    } else if (this.responseText == 'rom_added') {
      alert('danger', 'Fasiliteter is added in room!');
    } else {
      alert('danger', 'Server down!');
    }
  };

  xhr.send('rem_fasiliteter=' + id);
}

// Load data on page load
window.onload = function() {
  
  get_funksjoner();
  get_fasiliteter();
};
