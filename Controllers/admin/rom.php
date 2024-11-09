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
