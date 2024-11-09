
<?php

require('../../Helpers/Utils.php');
require('../../Config/Database.php');
require('../../public/sendgrid/sendgrid-php.php');

// key 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

function send_mail($uemail, $name, $token)
{

  $email = new \SendGrid\Mail\Mail();
  $email->setFrom("bunyaming@uia.com", "UIA Motel User");
  $email->setSubject("Account Confirmation");

  $email->addTo("$email, $name");


  $email->addContent(
    "text/html",
    "
         Click the link confirm your email: <br>
          <a href=' " . SITE_URL . "email_confirm.php?email=$uemail&$token=$token" . "'>        
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
    "SELECT * FROM `user_cred` WHERE `email` = ? AND `telefon`=?LIMIT 1",

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
   `password`, `token`) VALUES ('?', '?', '?', '?', '?', '?', '?', '?')";

  $values = [$data['name'], $data['email'], $data['telefon'], $data['adress'],  $data['post_num'], $data['dob'], $enc_pass, $token];

  if (insert($query, $values, "ssssssss")) {
    echo 'success';
  } else {
    echo 'failed';
  }





  // * check user already exists  or not


















}

?>
