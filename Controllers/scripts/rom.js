let add_rom_form = document.getElementById('add_rom_form');

add_rom_form.addEventListener('submit', function(e) {
  e.preventDefault();
  add_rom();

});


function add_rom() {
  let data = new FormData();
  data.append('add_rom', '');
  data.append('name', add_rom_form.elements['name'].value);
  data.append('areal', add_rom_form.elements['areal'].value);
  data.append('pris', add_rom_form.elements['pris'].value);
  data.append('kvalitet', add_rom_form.elements['kvalitet'].value);
  data.append('voksen', add_rom_form.elements['voksen'].value);
  data.append('barn', add_rom_form.elements['barn'].value);
  data.append('beskrivelse', add_rom_form.elements['beskrivelse'].value);



  let funksjoner = [];
  document.querySelectorAll('input[name="funksjoner[]"]:checked').forEach(el => {
    funksjoner.push(el.value);
  });

  let fasiliteter = [];
  document.querySelectorAll('input[name="fasiliteter[]"]:checked').forEach(el => {
    fasiliteter.push(el.value);
  });


  data.append('funksjoner', JSON.stringify(funksjoner));

  data.append('fasiliteter', JSON.stringify(fasiliteter));

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/rom.php", true);

  xhr.onload = function() {


    var myModal = document.getElementById('add-rom');
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();



    if (this.responseText == 1) {
      alert('success', 'Rom added successfully');
      add_rom_form.reset();
      get_all_rom();
    } else {
      console.log('Failed to add Rom');
    }

  }

  xhr.send(data);


}


function get_all_rom() {

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/rom.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function() {

    document.getElementById('rom-data').innerHTML = this.responseText;
  }

  xhr.send('get_all_rom');

}


let edit_rom_form = document.getElementById('edit_rom_form');

function edit_details(id)

{


  let xhr = new XMLHttpRequest();
  xhr.open("POST", "./ajax/rom.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function() {
    let data = JSON.parse(this.responseText);

    edit_rom_form.elements['name'].value = data.romdata.name;
    edit_rom_form.elements['areal'].value = data.romdata.areal;
    edit_rom_form.elements['pris'].value = data.romdata.pris;
    edit_rom_form.elements['kvalitet'].value = data.romdata.kvalitet;
    edit_rom_form.elements['voksen'].value = data.romdata.voksen;
    edit_rom_form.elements['barn'].value = data.romdata.barn;
    edit_rom_form.elements['beskrivelse'].value = data.romdata.beskrivelse;
    edit_rom_form.elements['rom_id'].value = data.romdata.id;

    document.querySelectorAll('input[name="funksjoner[]"]').forEach(el => {
      if (el.checked) {
        funksjoner.push(el.value);
      }
    });

    document.querySelectorAll('input[name="fasiliteter[]"]').forEach(el => {
      if (el.checked) {
        fasiliteter.push(el.value);
      }
    });


  }

  xhr.send('get_rom=' + id);

}


edit_rom_form.addEventListener('submit', function(e) {
  e.preventDefault();
  submit_edit_rom();

});


function submit_edit_rom() {


let data = new FormData();


data.append('edit_rom', '');
data.append('rom_id', edit_rom_form.elements['rom_id'].value);
data.append('areal', edit_rom_form.elements['areal'].value);
data.append('pris', edit_rom_form.elements['pris'].value);
data.append('kvalitet', edit_rom_form.elements['kvalitet'].value);
data.append('voksen', edit_rom_form.elements['voksen'].value);
data.append('barn', edit_rom_form.elements['barn'].value);
data.append('beskrivelse', edit_rom_form.elements['beskrivelse'].value);

// Funksjoner için değerleri toplama
let funksjoner = [];
document.querySelectorAll('input[name="funksjoner[]"]:checked').forEach(el => {
    funksjoner.push(el.value);
});

// Fasiliteter için değerleri toplama
let fasiliteter = [];
document.querySelectorAll('input[name="fasiliteter[]"]:checked').forEach(el => {
    fasiliteter.push(el.value);
});

data.append('funksjoner', JSON.stringify(funksjoner));
data.append('fasiliteter', JSON.stringify(fasiliteter));

let xhr = new XMLHttpRequest();
xhr.open("POST", "./ajax/rom.php", true);

xhr.onload = function() {
    var myModal = document.getElementById('edit-rom');
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    if (this.responseText == 1) {
        alert('success', 'Rom data added successfully');
        edit_rom_form.reset();
        get_all_rom();
    } else {
        console.log('Failed to add Rom');
    }
}

xhr.send(data);
}




function toggle_status(id, val) {

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "./ajax/rom.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function() {

    if (this.responseText == 1) {
      alert('success', 'Status updated successfully');
      get_all_rom();
    } else {
      alert('danger', 'Failed to update status');
    }


  }

  xhr.send('toggle_status=' + id + '&value=' + val);

}


let add_image_form = document.getElementById('add_image_form');
add_image_form.addEventListener('submit',function(e){
  e.preventDefault();
  add_image();

});
function add_image()
{
let data = new FormData();

data.append('image', add_image_form.elements['image'].files[0]);
data.append('rom_id', add_image_form.elements['rom_id'].value[0]);
data.append('add_image', '');


let xhr = new XMLHttpRequest();
xhr.open("POST", "./ajax/rom.php", true);


xhr.onload = function() {

if (this.responseText == 'inv_img') {
  alert('error', 'only jpg,webp or png images are allowed! ');
} else if (this.responseText == 'inv_size') {
  alert('error', 'Image size should be less than 2mb!');

} else if (this.responseText == 'upload_failed') {

  alert('error', 'Error in uploading image','image-alert');
} else {
  alert('success', 'new Image added ','image-alert');
  rom_images(add_image_form.elements['rom_id'].value,document.querySelector("#rom-images .modal-title").innerText);
  add_image_form.reset();
}

}

xhr.send(data);


}
function rom_images(id,rname) {
  document.querySelector("#rom-images .modal-title").innerText =rname;
  add_image_form.elements['rom_id'].value = id;
  add_image_form.elements['image'].value = '';

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "./ajax/rom.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function() {
document.getElementById('rom-image-data').innerHTML = this.responseText;

  }

  xhr.send('get_rom_images='+id);

  
}
add_image
function rem_image(img_id,rom_id){

let data = new FormData();

data.append('image_id', img_id);
data.append('rom_id',rom_id);
data.append('rem_image', '');


let xhr = new XMLHttpRequest();
xhr.open("POST", "./ajax/rom.php", true);


xhr.onload = function() {

if (this.responseText == 1) {
  alert('success', 'image Removed! ','image-alert');
  rom_images(rom_id.value,document.querySelector("#rom-images .modal-title").innerText);


}
 else {
  alert('error', 'image removal failed ','image-alert');
  
  
}

}

xhr.send(data);


}
add_image

function thumb_image(img_id,rom_id){

let data = new FormData();

data.append('image_id', img_id);
data.append('rom_id',rom_id);
data.append('thumb_image', '');


let xhr = new XMLHttpRequest();
xhr.open("POST", "./ajax/rom.php", true);


xhr.onload = function() {

if (this.responseText == 1) {
alert('success', 'image Thumbnail Chancged! ','image-alert');
rom_images(rom_id.value,document.querySelector("#rom-images .modal-title").innerText);


}
else {
alert('error', 'image removal failed ','image-alert');


}

}

xhr.send(data);


}
add_image

function remove_rom(rom_id){
if(confirm("Are you sure, you want to delete this rom?")){
let data = new FormData();
data.append('rom_id', rom_id);
data.append('remove_rom', '');
let xhr = new XMLHttpRequest();

xhr.open("POST", "./ajax/rom.php", true);

xhr.onload = function() {
if (this.responseText == 1) {
alert('success', 'rom removed');
get_all_rom();
}
else {
alert('error', 'rom removal failed!');

}

}

xhr.send(data);
}

}

window.onload = function() {
  get_all_rom();
}