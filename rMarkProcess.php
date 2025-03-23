<?php

require "connection.php";

$Marks = $_POST["marks"];
$assi = $_POST["assignment"];


if (empty($Marks)) {
  echo ("Please enter Assignment Marks !");
} else if ($Marks == "0" | $Marks == "e" | $Marks < 0) {
  echo ("Invalid input for Marks");
}

  Database::insUpdelete("INSERT INTO `student_mark` 
    (`mark`, `assignment_mark_id`) VALUES ('" . $Marks . "','" . $assi . "')");

  echo "success";
