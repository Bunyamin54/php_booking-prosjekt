
<?php

require('../Helpers/Utils.php');
require('../Config/Database.php');
require('../sendgrid/sendgrid.php');
date_default_timezone_set('Europe/Oslo');


// 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

function send_mail($uemail, $token, $type)
{

  if ($type == "email_confirmation") {

    $page = "index.php";
    $subject = "Account Confirmation";
    $content = "confirm your email";
  } else if ($type == "account_recovery") {

    $page = "reset_password.php";
    $subject = "Account Reset Link";
    $content = "reset your password";
  }


  $email = new \SendGrid\Mail\Mail();
  $email->setFrom("SENDGRID_EMAIL", "SENDGRID_NAME");
  $email->setSubject("$subject");

  $email->addTo($uemail);


  $email->addContent(
    "text/html",
    "
         Click the link to $content : <br>
          <a href=' " . SITE_URL . "$page?$type&email=$uemail&$token=$token" . "'>        
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

  if (!send_mail($data['email'], $token, "email_confirmation")) {
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

if (isset($_POST['login'])) {

  $data = filteration($_POST);

  $u_exists = select(
    "SELECT * FROM `user_cred` WHERE `email` = ? OR `telefon` = ? LIMIT 1",

    [$data['email_mob'], $data['email_mob']],
    "ss"
  );

  if (mysqli_num_rows($u_exists) == 0) {

    echo 'inv_email_mob';
  } else {
    $u_fetch = mysqli_fetch_assoc($u_exists);
    if ($u_fetch['is_verified'] == 0) {
      echo 'not_verified';
    } else if ($u_fetch['status'] == 0) {
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

if (isset($_POST['forgot_pass'])) {

  $data = filteration($_POST);

  $u_exists = select("SELECT * FROM `user_cred` WHERE `email` =? LIMIT 1", [$data['email']], "s");

  if (mysqli_num_rows($u_exists) == 0) {

    echo 'inv_email';
  } else {
    $u_fetch = mysqli_fetch_assoc($u_exists);
    if ($u_fetch['is_verified'] == 0) {
      echo 'not_verified';
    } else if ($u_fetch['status'] == 0) {
      echo 'inactive';
    } else {
      // send reset password link to user

      $token = bin2hex(random_bytes(16));
      if (!send_mail($data['email'], $token, 'account_recovery')) {
        echo 'mail_failed';
        exit;
      } else {

        $date = date('Y-m-d');
        $query = mysqli_query($con, "UPDATE `user_cred` SET `token` = '$token= ?, `t_expire` = '$date' 
        WHERE `id`='$u_fetch[id]'");

        if ($query) {
          echo 'mail_sent';
        } else {
          echo 'mail_failed';
        }



      }
    }
  }
}
?>
