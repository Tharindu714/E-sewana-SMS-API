<?php
session_start();

if(isset($_SESSION["aduser"])){

  $_SESSION["aduser"] = null;
  session_destroy();

  echo("success");
}

?>