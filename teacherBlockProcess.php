<?php
require "connection.php";

if(isset($_GET["email"])){


  $user_email = $_GET["email"];

  $user_rs = Database::search("SELECT * FROM `teacher` WHERE `email` = '".$user_email."' ");
  $user_num = $user_rs -> num_rows;

  if($user_num == 1){

    $user_data = $user_rs -> fetch_assoc();

    if($user_data ["status"] == 1){
      Database::insUpdelete("UPDATE `teacher` SET `status` = '0' WHERE `email` = '".$user_email."'");
      echo("Blocked");
    }else if($user_data ["status"] == 0){
      Database::insUpdelete("UPDATE `teacher` SET `status` = '1' WHERE `email` = '".$user_email."'");
      echo("UnBlocked"); 
    }

  }else{
    echo("Cannot find the user. Please try again later.");
  }

}else{
  echo("Something Went Wrong");
}
?>