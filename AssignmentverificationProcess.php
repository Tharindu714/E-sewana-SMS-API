<?php

session_start();
require "connection.php";

if(isset($_GET["v"])){

  $v = $_GET["v"];

  $teacher = Database::search("SELECT * FROM `teacher` WHERE `verification_code` = '".$v."'");
  $num = $teacher -> num_rows;

  if($num == 1){
    $data = $teacher -> fetch_assoc();
    $_SESSION["teacher"] = $data;
    echo("success");

  }else{
    echo("Invalid Verification Code");
  }

}else{
  echo("Please Enter Your Verification");
}

?>