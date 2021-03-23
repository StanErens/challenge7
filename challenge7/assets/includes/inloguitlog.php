<?php

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
       $button = '<a href="assets/includes/login/logout.inc.php">Logout</a>';
} else {
       $button = '<a href="inlog.php">Login</a>';
}

echo $button;
