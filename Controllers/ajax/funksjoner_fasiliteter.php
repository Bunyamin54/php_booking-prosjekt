<?php

require('../../Helpers/Utils.php');
require('../../Config/Database.php');

adminLogin();

if (isset($_POST['add_funksjoner'])) {
    $frm_data = filteration($_POST);
    $q = "INSERT INTO `funksjoner`(`name`) VALUES (?)";
    $values = [$frm_data['name']];
    $res = insert($q, $values, "s");
    echo $res  ; 
}


if (isset($_POST['get_funksjoner'])) {

    $res = selectAll('funksjoner');
     $i = 1;

    while ($row = mysqli_fetch_assoc($res)) {


        $path = ABOUT_IMG_PATH;



        echo <<<data

          <tr>
          
            <td>$i</td>
            <td>$row[name]</td>
            <td>
            <button type="button" onclick="rem_funksjoner($row[id])" class="btn btn-danger btn-sm shadow-none">
             <i class="bi bi-trash"></i> Delete </button>
            </td>
          </tr>

                                                      
         data;

         $i++;
    }
}


if (isset($_POST['rem_funksjoner'])) {
    $frm_data = filteration($_POST);
    $values = [$frm_data['rem_funksjoner']];

    $q = "DELETE FROM `funksjoner` WHERE `id` = ?";
    $res = delete($q, $values, "i");
    echo $res;

   
}
