<?php

session_start();

require "connection.php";

if (isset($_SESSION["af"])) {

  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $mobile = $_POST["mob"];
  $line1 = $_POST["add01"];
  $line2 = $_POST["add02"];
  $province = $_POST["province"];
  $district = $_POST["district"];
  $city = $_POST["city"];
  $postal = $_POST["postal"];

  if (isset($_FILES["image"])) {
    $img = $_FILES["image"];

    $allow_img_extensions = array("image/jpeg", "image/jpg", "image/png", "image/svg+xml", "image/ico");
    $file_extension = $img["type"];
    // echo($file_extension);

    if (!in_array($file_extension, $allow_img_extensions)) {
      echo ("Please Select a valid Image.");
    } else {

      $new_file_ex;
      if ($file_extension == "image/jpeg") {
        $new_file_ex = ".jpeg";
      } else if ($file_extension == "image/jpg") {
        $new_file_ex = ".jpg";
      } else if ($file_extension == "image/png") {
        $new_file_ex = ".png";
      } else if ($file_extension == "image/svg+xml") {
        $new_file_ex = ".svg";
      } else if ($file_extension == "image/ico") {
        $new_file_ex = ".ico";
      }

      $file_name = "resource/proimg/" . $_SESSION["af"]["fname"] . "_" . uniqid() . $new_file_ex;

      move_uploaded_file($img["tmp_name"], $file_name);

      $img_rs = Database::search("SELECT * FROM `acadamic_profile_img` 
    WHERE `academic_officer_email` = '" . $_SESSION["af"]["email"] . "';");

      $img_num = $img_rs->num_rows;

      if ($img_num == 1) {

        Database::insUpdelete("UPDATE `acadamic_profile_img` SET `path` = '" . $file_name . "' 
      WHERE `academic_officer_email` = '" . $_SESSION["af"]["email"] . "';");
      } else {
        Database::insUpdelete("INSERT INTO `acadamic_profile_img` (`path` , `academic_officer_email`)
      VALUES ('" . $file_name . "' , '" . $_SESSION["af"]["email"] . "')");
      }
    }
  }

  Database::insUpdelete("UPDATE `academic_officer` SET `fname` = '" . $fname . "', `lname` = '" . $lname . "', `mobile` = '" . $mobile . "'
    WHERE `email` = '" . $_SESSION["af"]["email"] . "';");

  $address_rs =  Database::search("SELECT* FROM `academic_officer_has_address` 
    WHERE `academic_officer_email` = '" . $_SESSION["af"]["email"] . "';");

  $address_num = $address_rs->num_rows;

  if ($address_num == 1) {

    Database::insUpdelete("UPDATE `academic_officer_has_address` SET `line1` = '" . $line1 . "', `line2` = '" . $line2 . "', 
    `city_id` = '" . $city . "',`postal_code` = '" . $postal . "'
    WHERE `academic_officer_email` = '" . $_SESSION["af"]["email"] . "';");
  } else {
    Database::insUpdelete("INSERT INTO `academic_officer_has_address`
      (`line1`,`line2`,`academic_officer_email`,`city_id`,`postal_code`)
      VALUES ('" . $line1 . "' ,'" . $line2 . "' , '" . $_SESSION["af"]["email"] . "','" . $city . "' ,'" . $postal . "')");
  }

  echo ("success");
} else {
  echo ("Please Log in first");
}
