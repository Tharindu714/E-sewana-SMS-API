<?php
session_start();
require "connection.php";
if (isset($_SESSION["aduser"])) {
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];

  Database::insUpdelete("UPDATE `admin` SET `fname` = '" . $fname . "', `lname` = '" . $lname . "'
    WHERE `email` = '" . $_SESSION["aduser"]["email"] . "';");

  echo ("success");
} else {
  echo ("Please Log in first");
}
