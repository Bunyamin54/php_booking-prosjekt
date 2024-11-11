<?php

require('../../Helpers/Utils.php');
require('../../Config/Database.php'); // Ensure $con is defined here

adminLogin();

if (!$con) { // Check if $con is defined and connected
    error_log("Database connection failed: " . mysqli_connect_error());
    echo 0;
    exit;
}

if (isset($_POST['add_rom'])) {
    // Decode and sanitize inputs
    $funksjoner = filteration(json_decode($_POST['funksjoner'], true));
    $fasiliteter = filteration(json_decode($_POST['fasiliteter'], true));
    $frm_data = filteration($_POST);

    $flag = 0;

    // Room insertion query
    $q1 = "INSERT INTO `rom`(`name`, `areal`, `pris`, `kvalitet`, `voksen`, `barn`, `beskrivelse`) VALUES (?,?,?,?,?,?,?)";
    $values = [
        $frm_data['name'],
        $frm_data['areal'],
        $frm_data['pris'],
        $frm_data['kvalitet'],
        $frm_data['voksen'],
        $frm_data['barn'],
        $frm_data['beskrivelse']
    ];

    if (function_exists('insert') && insert($q1, $values, "siiiiis")) {
        $flag = 1;
        $rom_id = mysqli_insert_id($con); // Get last inserted ID for rom
    } else {
        error_log("Failed to insert into `rom` table.");
        echo 0;
        exit;
    }

    // Insert into `rom_fasiliteter`
    $q2 = "INSERT INTO `rom_fasiliteter`(`rom_id`, `fasiliteter_id`) VALUES (?,?)";
    if ($stmt = mysqli_prepare($con, $q2)) {
        foreach ($fasiliteter as $f) {
            mysqli_stmt_bind_param($stmt, "ii", $rom_id, $f);
            if (!mysqli_stmt_execute($stmt)) {
                error_log("Failed to insert into `rom_fasiliteter`: " . mysqli_error($con));
                $flag = 0;
            }
        }
        mysqli_stmt_close($stmt);
    } else {
        error_log("Failed to prepare statement for `rom_fasiliteter`: " . mysqli_error($con));
        echo 0;
        exit;
    }

    // Insert into `rom_funksjoner`
    $q3 = "INSERT INTO `rom_funksjoner`(`rom_id`, `funksjoner_id`) VALUES (?,?)";
    if ($stmt = mysqli_prepare($con, $q3)) {
        foreach ($funksjoner as $f) {
            mysqli_stmt_bind_param($stmt, "ii", $rom_id, $f);
            if (!mysqli_stmt_execute($stmt)) {
                error_log("Failed to insert into `rom_funksjoner`: " . mysqli_error($con));
                $flag = 0;
            }
        }
        mysqli_stmt_close($stmt);
    } else {
        error_log("Failed to prepare statement for `rom_funksjoner`: " . mysqli_error($con));
        echo 0;
        exit;
    }

    // Return success or failure
    echo $flag ? 1 : 0;
}


if (isset($_POST['get_all_rom'])) {

    $res = selectAll('rom');
    $i = 0;



    $data = "";
    while ($row = mysqli_fetch_assoc($res)) {

        if ($row['status'] == 1) {
            $status = "<button   onclick='toggle_status($row[id],0)'  class='badge rounded-pill bg-success'>Ledig</button>";
        } else {
            $status = "<button   onclick='toggle_status($row[id],1)'  class='badge rounded-pill bg-danger'>Opptatt</button>";
        }


        $data .= "
       
                <tr class = 'align-middle'>

                    <td> $i </td>
                    <td> $row[name] </td>
                    <td> $row[areal]sq. ft.</td>
                
                    <td> 
                    <span class='badge rounded-pill bg-light text-dark'>
                     Voksen: $row[voksen]
                    </span> <br>
                    <span class='badge rounded-pill bg-light text-dark'>
                     Barn: $row[barn]
                    </span>
                    </td>

                    <td>NOK $row[pris] </td>
                    <td> $row[kvalitet] </td>
                    <td> $status </td>
                    <td> 
                    
                        <button  type='button' onclick='edit_details($row[id])'  class='btn btn-primary shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#edit-rom'>
                         <i class='bi bi-pencil-square'></i>
                        </button>

                        <button  type='button' onclick=\"room_images($row[id],'$row[name]')\"  class='btn btn-info shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#rom-images'>
                         <i class='bi bi-images'></i>
                        </button>


                        <button type='button' onclick='remove_room($row[id])' class='btn btn-danger shadow-none btn-sm'>

                         <i class='bi bi-trash'></i>
                        </button>
                                    
                    
                    </td>

                </tr>
  
                ";
        $i++;
    }

    echo $data;
}


if (isset($_POST['get_rom'])) {
    $frm_data = filteration($_POST);
    $res1 =  select("SELECT * FROM `rom` WHERE `id` = ?", [$frm_data['get_rom']], "i");
    $res2 =  select("SELECT * FROM `rom_funksjoner` WHERE `rom_id` = ?", [$frm_data['get_rom']], "i");
    $res3 =  select("SELECT * FROM `rom_fasiliteter` WHERE `rom_id` = ?", [$frm_data['get_rom']], "i");


    $romdata = mysqli_fetch_assoc($res1);
    $funksjoner = [];
    $fasiliteter = [];


    if (mysqli_num_rows($res2) > 0) {

        while ($row = mysqli_fetch_assoc($res2)) {
            array_push($funksjoner, $row['funksjoner_id']);
        }
    }

    if (mysqli_num_rows($res3) > 0) {

        while ($row = mysqli_fetch_assoc($res3)) {
            array_push($fasiliteter, $row['fasiliteter_id']);
        }
    }

    $data = [
        'romdata' => $romdata,
        'funksjoner' => $funksjoner,
        'fasiliteter' => $fasiliteter
    ];

    $data = json_encode($data);
    echo $data;
}



if (isset($_POST['edit_rom'])) {

    $funksjoner = filteration(json_decode($_POST['funksjoner'], true));
    $fasiliteter = filteration(json_decode($_POST['fasiliteter'], true));
    $frm_data = filteration($_POST);

    $flag = 0;

    $q1 = "UPDATE `rom` SET `name` = ?, `areal` = ?, `pris` = ?, `kvalitet` = ?, `voksen` = ?, `barn` = ?, `beskrivelse` = ? WHERE `id` = ?";

    $values = [

        $frm_data['name'],
        $frm_data['areal'],
        $frm_data['pris'],
        $frm_data['kvalitet'],
        $frm_data['voksen'],
        $frm_data['barn'],
        $frm_data['beskrivelse'],
        $frm_data['rom_id']
    ];

    if (update($q1, $values, "siiiiisi")) {
        $flag = 1;
    }

    $del_funksjoner = delete("DELETE FROM `rom_funksjoner` WHERE `rom_id` = ?", [$frm_data['rom_id']], "i");
    $del_fasiliteter = delete("DELETE FROM `rom_fasiliteter` WHERE `rom_id` = ?", [$frm_data['rom_id']], "i");

    if (!($del_fasiliteter && $del_funksjoner)) {
        $flag = 0;
    }

    $q2 = "INSERT INTO `rom_fasiliteter`(`rom_id`, `fasiliteter_id`) VALUES (?,?)";
    if ($stmt = mysqli_prepare($con, $q2)) {
        foreach ($fasiliteter as $f) {
            mysqli_stmt_bind_param($stmt, "ii", $frm_data['rom_id'], $f);
            if (!mysqli_stmt_execute($stmt)) {
                error_log("Failed to insert into `rom_fasiliteter`: " . mysqli_error($con));
                $flag = 0;
            }
        }

        $flag = 1;
        mysqli_stmt_close($stmt);
    } else {
        error_log("Failed to prepare statement for `rom_fasiliteter`: " . mysqli_error($con));
        echo 0;
        exit;
    }

    // Insert into `rom_funksjoner`
    $q3 = "INSERT INTO `rom_funksjoner`(`rom_id`, `funksjoner_id`) VALUES (?,?)";
    if ($stmt = mysqli_prepare($con, $q3)) {
        foreach ($funksjoner as $f) {
            mysqli_stmt_bind_param($stmt, "ii", $frm_data['rom_id'], $f);
            if (!mysqli_stmt_execute($stmt)) {
                error_log("Failed to insert into `rom_funksjoner`: " . mysqli_error($con));
                $flag = 0;
            }
        }
        $flag = 1;
        mysqli_stmt_close($stmt);
    } else {
        error_log("Failed to prepare statement for `rom_funksjoner`: " . mysqli_error($con));
        echo 0;
        exit;
    }

    // Return success or failure
    echo $flag ? 1 : 0;
}



if (isset($_POST['toggle_status'])) {
    $frm_data = filteration($_POST);

    $q = "UPDATE `rom` SET `status` = ? WHERE `id` = ?";
    $v = [$frm_data['value'], $frm_data['toggle_status']];

    if (update($q, $v, "ii")) {
        echo 1;
    } else {
        echo 0;
    }
}
if (isset($_POST['add_image'])) {

    $frm_data = filteration($_POST);

    $img_r = uploadImage($_FILES['image'], ROOMS_FOLDER);

    //  echo json_encode($img_r);

    if ($img_r == 'inv_img') {
        echo 'img_r';
    } else if ($img_r == 'inv_size') {
        echo 'img_r';
    } else if ($img_r == 'upload_failed') {
        echo 'img_r';
    } else {

        $q = "INSERT INTO `room_images`(`room_id`, `image`) VALUES (?,?)";
        $values = [$frm_data['room_id'], $img_r];
        $res = insert($q, $values, "is");
        echo $res;
    }
}

if (isset($_POST['get_room_images'])) {

    $frm_data = filteration($_POST);
    $res = select("SELECT * FROM `room_images` WHERE `room_id` =? " , [$frm_data['get_room_images']],'i');
    
    $path = ROOMS_IMG_PATH;
     while ($row = mysqli_fetch_assoc($res)) {
        if($row['thumb']==1){
            $thumb_btn = "<i class='bi bi-check-lg text-light bg-success px-2 py-1 rounded fs-5'></i>";
        }
        else{
            $thumb_btn = "<button onclick='thumb_image($row[sr_no],$row[room_id])'  class='btn btn-secondary btn-sm shadow-none'>
              <i class=' bi bi-check-lg'></i>
            
            </button>"; 
        }

        echo<<<data
         <tr class='alagin-middle'> 
          <td><img src='$path$row[image]' class='img-fluid'></td>
          <td>$thumb_btn</td>
          <td><img src='delete' class='img-fluid'></td>
          <td>
            "<button   onclick='rem_image($row[sr_no],$row[room_id])'  class='btn btn-danger btn-sm shadow-none'>
              <i class=' bi bi-trash'></i>
            
            </button>"; 
          
          </td>
         
         </tr>
        data;
     }


    $img_r = uploadImage($_FILES['image'], ROOMS_FOLDER);

    //  echo json_encode($img_r);

    if ($img_r == 'inv_img') {
        echo 'img_r';
    } else if ($img_r == 'inv_size') {
        echo 'img_r';
    } else if ($img_r == 'upload_failed') {
        echo 'img_r';
    } else {

        $q = "INSERT INTO `room_images`(`room_id`, `image`) VALUES (?,?)";
        $values = [$frm_data['room_id'], $img_r];
        $res = insert($q, $values, "is");
        echo $res;
    }
}

if (isset($_POST['rem_image'])) {
    $frm_data = filteration($_POST);
    $values = [$frm_data['image_id'], $frm_data['room_id']];

    $pre_q = "SELECT * FROM `room_images` WHERE `sr_no` = ? AND `room_id` = ?";
    $res = select($pre_q, $values, "ii");
    $img = mysqli_fetch_assoc($res);

    if (deleteImage($img['image'], ROOMS_FOLDER)) {
        $q = "DELETE FROM `room_images` WHERE `sr_no` = ? AND `room_id` = ?";
        $res = delete($q, $values, "ii");
        echo $res;
    } else {
        echo 0;
    }
}

if (isset($_POST['thumb_image'])) {
    $frm_data = filteration($_POST);
    $pre_q = "UPDATE `room_images` SET `thumb`=? WHERE `room_id`=?";
    $pre_v = [0,$frm_data['room_id']];
    $pre_res = update($pre_q,$pre_v ,'ii' );
    

    $q = "UPDATE `room_images` SET `thumb`=? WHERE `sr_no`=? AND `room_id`=?";
    $v = [1,$frm_data['image_id'],$frm_data['room_id']];
    $pre_res = update($q,$v ,'iii' );

    echo $pre_res;

    
}

if (isset($_POST['remove_rom'])) {
    $frm_data = filteration($_POST);
    $res1 = select(" SELECT * FROM `room_images` WHERE `room_id`=?" ,[$frm_data['room_id']],'i');

    while($row = mysqli_fetch_assoc($res1)){
        deleteImage($row['image'],ROOMS_FOLDER);
    }
    
    $res2 = delete ("DELETE FROM `room_images` WHERE  `room_id`= ?",[$frm_data['room_id']],'i');
    $res3 = delete ("DELETE FROM `rom_funksjoner` WHERE  `rom_id`= ?",[$frm_data['rom_id']],'i');
    $res4 = delete ("DELETE FROM `rom_fasiliteter` WHERE  `rom_id`= ?",[$frm_data['rom_id']],'i');
    $res5 = update ("UPDATE `rom` SET `removed`=?  WHERE  `id`= ?",[1,$frm_data['rom_id']],'ii');

    if($res2 || $res3 || $res4 || $res5){
        echo 1;

    }
    else{
        echo 0;
    }
    
}
