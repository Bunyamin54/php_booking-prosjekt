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

    if (isset($_POST['update_general']))
     {
       $frm_data = filteration($_POST);


   $q =  "UPDATE `instillinger` SET `site_title`=?,`site_om`=? WHERE  `sr_no` = ?";

    $values = [$frm_data['site_title'], $frm_data['site_om'], 1];
    $res = update ($q, $values, "ssi");
    echo $res;


    }

    if (isset($_POST['upd_shutdown']))
     {
       $frm_data = ($_POST ['upd_shutdown']==0) ? 1 : 0;


   $q =  "UPDATE `instillinger` SET `shutdown`=? WHERE  `sr_no` = ?";

    $values = [$frm_data,1];
    $res = update ($q, $values, "ii");
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


    

       if (isset($_POST['update_contacts']))
      
       {
         $frm_data = filteration($_POST);
  
  
     $q =  "  UPDATE `contact_details` SET `address`=?,`gmap`=?,`phone`=?,`email`=?,`tw`=?,`insta`=?,`fb`=?,`yt`=?,`iframe`=? WHERE  `sr_no` = ?";
  
      $values = [$frm_data['address'], $frm_data['gmap'],$frm_data['phone'],$frm_data['email'],$frm_data['tw'],$frm_data['insta'],$frm_data['fb'],$frm_data['yt'],$frm_data['iframe'],1];
      $res = update ($q, $values, "sssssssssi");
      echo $res;
  
  
      }






?>
