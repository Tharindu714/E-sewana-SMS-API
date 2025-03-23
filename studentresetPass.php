<?php
require "connection.php";

$email = $_POST["em"];
$npw = $_POST["npw"];
$rtpw = $_POST["rtpw"];
$vc = $_POST["vc"];

if (empty($email)) {
  echo ("Missing Email Address");
} else if (empty($npw)) {
  echo ("Please insert a New password");
} else if (strlen($npw) < 5 || strlen($npw) > 20) {
  echo ("Invalid Password");
} else if (empty($rtpw)) {
  echo ("Please Re-Type your New Password");
} else if ($npw != $rtpw) {
  echo ("Password doesn't matched");
} else if (empty($vc)) {
  echo ("Please Enter your Verification Code");
} else {

  $resultSet = Database::search("SELECT * FROM `student` WHERE `email` = '" . $email . "' AND `verification_code` = '" . $vc . "';");
  $num = $resultSet->num_rows;

  if ($num == 1) {
    Database::insUpdelete("UPDATE `student` SET `password` = '" . $npw . "' WHERE `email` = '" . $email . "';");
    echo ("success");
  } else {
    echo ("Invalid Email Address or verification Code");
  }
}
