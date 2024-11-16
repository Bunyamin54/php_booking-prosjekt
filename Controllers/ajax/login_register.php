
<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);


require('../Helpers/Utils.php');
require('../Config/Database.php');
require('../sendgrid/sendgrid.php');


// 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

function send_mail($uemail, $name, $token)
{

  $email = new \SendGrid\Mail\Mail();
  $email->setFrom("SENDGRID_EMAIL", "SENDGRID_NAME");
  $email->setSubject("Account Confirmation");

  $email->addTo($uemail, $name);


  $email->addContent(
    "text/html",
    "
         Click the link confirm your email: <br>
          <a href=' " . SITE_URL . "email_confirm.php?email_confirmation&email=$uemail&$token=$token" . "'>        
          Confirm Email       
          </a>     
         "
  );
  $sendgrid = new \SendGrid(SENDGRID_API_KEY);


  try {
    $sendgrid->send($email); 

    return 1;
  } catch (Exception $e) {
    return 0;
  }
}


if (isset($_POST['register'])) {

  $data = filteration($_POST);

  //  * nmatch passord and confirm password


  if ($data['pass'] != $data['cpass']) {
    echo 'pass_mismatch';
    exit;
  }

  $u_exists = select(
    "SELECT * FROM `user_cred` WHERE `email` = ? OR `telefon`= ? LIMIT 1",

    [$data['email'], $data['telefon']],

    "ss"
  );

  if (mysqli_num_rows($u_exists) != 0) {
    $u_exists = mysqli_fetch_assoc($u_exists);
    echo ($u_exists_fetch['email'] == $data['email']) ? 'email_exists' : 'telefon_exists';
    exit;
  }



  // send confirmation email to user

  $token = bin2hex(random_bytes(16));

  if (!send_mail($data['email'], $data['name'], $token)) {
    echo 'mail_failed';
    exit;
  }

  $enc_pass = password_hash($data['pass'], PASSWORD_BCRYPT);

  $query = "INSERT INTO `user_cred` (`name`, `email`,  `telefon`,`adress`, `post_num`, `dob`,
   `password`, `token`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

  $values = [$data['name'], $data['email'], $data['telefon'], $data['adress'],  $data['post_num'], $data['dob'], $enc_pass, $token];

  if (insert($query, $values, "ssssssss")) {
    echo 'success';
  } else {
    echo 'failed';
  }
  exit;

}

if (isset($_POST['login']))  


{

$data = filteration($_POST);

$u_exists = select(
  "SELECT * FROM `user_cred` WHERE `email` = ? OR `telefon` = ? LIMIT 1",

  [$data['email_mob'], $data['email_mob']],
  "ss"
);

if (mysqli_num_rows($u_exists) == 0) {

  echo 'inv_email_mob';


} 
else {
$u_fetch = mysqli_fetch_assoc($u_exists);
if($u_fetch['is verified'] == 0) {
    echo 'not_verified';  
  } 
  else if($u_fetch['status']==0) {
      echo 'inactive';
    } else {

      if (!password_verify($data['pass'], $u_fetch['password'])) {
        echo 'invalid_pass';
      } else {
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['uID'] = $u_fetch['id'];
        $_SESSION['uName'] = $u_fetch['name'];
        $_SESSION['uTelefon'] = $u_fetch['telefon'];
        
        echo 1;
      }
    }

  }
 

}



?>
