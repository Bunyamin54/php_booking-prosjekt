<?php

require('../../Helpers/Utils.php');
require('../../Config/Database.php');

adminLogin();

if (isset($_POST['get_general'])) {
    $q = "SELECT * FROM `instillinger` WHERE `sr_no` = ?";
    $values = [1];
    $res = select($q, $values, "i");

    if ($res) {
        $data = mysqli_fetch_assoc($res);
        echo json_encode($data);
    } else {
        echo json_encode(['error' => 'Data not found']);
    }
}

if (isset($_POST['update_general'])) {
    $frm_data = filteration($_POST);


    $q =  "UPDATE `instillinger` SET `site_title`=?,`site_om`=? WHERE  `sr_no` = ?";

    $values = [$frm_data['site_title'], $frm_data['site_om'], 1];
    $res = update($q, $values, "ssi");
    echo $res;
}

if (isset($_POST['upd_shutdown'])) {
    $frm_data = ($_POST['upd_shutdown'] == 0) ? 1 : 0;


    $q =  "UPDATE `instillinger` SET `shutdown`=? WHERE  `sr_no` = ?";

    $values = [$frm_data, 1];
    $res = update($q, $values, "ii");
    echo $res;
}



if (isset($_POST['get_contacts'])) {
    $q = "SELECT * FROM `contact_details` WHERE `sr_no` = ?";
    $values = [1];
    $res = select($q, $values, "i");

    if ($res) {
        $data = mysqli_fetch_assoc($res);
        echo json_encode($data);
    } else {
        echo json_encode(['error' => 'Data not found']);
    }
}




if (isset($_POST['update_contacts'])) {
    $frm_data = filteration($_POST);


    $q =  "  UPDATE `contact_details` SET `address`=?,`gmap`=?,`phone`=?,`email`=?,`tw`=?,`insta`=?,`fb`=?,`yt`=?,`iframe`=? WHERE  `sr_no` = ?";

    $values = [$frm_data['address'], $frm_data['gmap'], $frm_data['phone'], $frm_data['email'], $frm_data['tw'], $frm_data['insta'], $frm_data['fb'], $frm_data['yt'], $frm_data['iframe'], 1];
    $res = update($q, $values, "sssssssssi");
    echo $res;
}


if (isset($_POST['add_member'])) {

    $frm_data = filteration($_POST);

    $img_r = uploadImage($_FILES['picture'], ABOUT_FOLDER);

    //  echo json_encode($img_r);

    if ($img_r == 'inv_img') {
        echo 'img_r';
    } else if ($img_r == 'inv_size') {
        echo 'img_r';
    } else if ($img_r == 'upload_failed') {
        echo 'img_r';
    } else {

        $q = "INSERT INTO `team_details`(`name`, `picture`) VALUES (?,?)";
        $values = [$frm_data['name'], $img_r];
        $res = insert($q, $values, "ss");
        echo $res;
    }
}


if (isset($_POST['get_members'])) {

    $res = selectAll('team_details');

    while ($row = mysqli_fetch_assoc($res)) {


        $path = ABOUT_IMG_PATH;



        echo <<<data
            <div class="col-md-2 mb-3">
            <div class="card bg-dark text-white">
            <img src="$path$row[picture]" class="card-img">
            <div class="card-img-overlay text-end">

            <button type="button" onclick="rem_member($row[sr_no])" class="btn btn-danger btn-sm shadow-none">
            <i class="bi bi-trash"> </i>  Delete</button>

            </div>

            <p class="card-text text-center px-3 py-2">$row[name]</p>
            </div>
            </div>                                                        
         data;
    }
}


if (isset($_POST['rem_member'])) {
    $frm_data = filteration($_POST);
    $values = [$frm_data['rem_member']];

    $pre_q = "SELECT * FROM `team_details` WHERE `sr_no` = ?";
    $res = select($pre_q, $values, "i");
    $img = mysqli_fetch_assoc($res);

    if (deleteImage($img['picture'], ABOUT_FOLDER)) {
        $q = "DELETE FROM `team_details` WHERE `sr_no` = ?";
        $res = delete($q, $values, "i");
        echo $res;
    } else {
        echo 0;
    }
}
