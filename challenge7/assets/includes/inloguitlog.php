<?php

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
       $button = '<a href="assets/inlog/logout.php">Logout</a>';
} else {
       $button = '<a href="inlog.php">Admin</a>';
}

echo $button;
