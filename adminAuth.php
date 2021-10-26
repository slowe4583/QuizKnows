<?php
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    die;
}

if(!isset($_SESSION["isAdmin"]) || $_SESSION["isAdmin"] < 1) {
    header("location: index.php");
    die();
}
?>