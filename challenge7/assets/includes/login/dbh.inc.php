<?php

$serverName = "localhost";
$dBUsername = "Milan";
$dBPassword = "Milan";      
$dBName= "db_car_7";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}