<?php
require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST["e"])){
  $email = $_POST["e"];

  $t_Resultset = Database::search("SELECT * FROM `teacher` WHERE `email` = '".$email."'");

  $t_num = $t_Resultset -> num_rows;
  if($t_num >0){

    $code = uniqid();

    Database::insUpdelete("UPDATE `teacher` SET `verification_code` = '".$code."' WHERE `email` = '".$email."'");

        // email code
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'tharibro2211@gmail.com';
        $mail->Password = 'osproabgubeizhym';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('tharibro2211@gmail.com', 'Teacher Verification');
        $mail->addReplyTo('tharibro2211@gmail.com', 'Teacher Verification');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'e-Sewana Teacher assignment verification_code';
        $bodyContent = '<h1 style="color:purple">Your Verification Code is ' . $code . '</h1>';
        $mail->Body    = $bodyContent;

        if($mail -> send()){
          echo "success";
        }else{
          echo 'Verification code sending failed';
        }

  }else{
    echo("you are not a valid User");
  }

}else{
  echo("Email Field should not be empty");
}