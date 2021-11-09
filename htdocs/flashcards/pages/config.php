<?php

/* Attempt to connect to MySQL database */
//$link = mysqli_connect("localhost", "root", '', "epiz_27689240_login");
$link =mysqli_connect('localhost',"root","",'databasefinalproject');
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>