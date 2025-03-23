<?php
session_start();

require "connection.php";

$email = $_POST["email2"];
$password = $_POST["pass2"];
$rememberme = $_POST["remember"];

if (empty($email)) {
    echo ("Please enter your Email");
} else if (strlen($email) > 100) {
    echo ("Email must have less than 100 characters");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email");
} else if (empty($password)) {
    echo ("Please enter your Password");
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo ("Password must have between 5-20 charaters");
} else {

    $resultSet = Database::search("SELECT * FROM `academic_officer` WHERE `email`='" . $email . "' 
    AND `password`='" . $password . "'");
    $num = $resultSet->num_rows;

    if ($num == 1) {
        $data = $resultSet->fetch_assoc();

        if($data["status"] == 1){
        echo ("success");
      
        $_SESSION["af"] = $data;

        if ($rememberme == "true") {

            setcookie("email", $email, time() + (60 * 60 * 24 * 365));
            setcookie("password", $password, time() + (60 * 60 * 24 * 365));
        } else {

            setcookie("email", "", -1);
            setcookie("password", "", -1);
        }

    }else{
        echo("Sorry Admin has deactivated this officer.");
    }

        
    } else {
        echo ("Invalid Username or Password");
    }
}

?>