<?php
session_start();

if(isset($_SESSION["af"])){

  $_SESSION["af"] = null;
  session_destroy();

  echo("success");
}

?>