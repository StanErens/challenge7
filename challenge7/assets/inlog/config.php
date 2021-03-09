<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'Milan');
define('DB_PASSWORD', 'Milan');
define('DB_NAME', 'db_car_5');
 

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>