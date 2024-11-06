<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
    $values1 = [
        $frm_data['name'], 
        $frm_data['areal'], 
        $frm_data['pris'], 
        $frm_data['kvalitet'], 
        $frm_data['voksen'], 
        $frm_data['barn'], 
        $frm_data['beskrivelse']
    ];

    if (function_exists('insert') && insert($q1, $values1, "siiiiis")) {
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
?>
