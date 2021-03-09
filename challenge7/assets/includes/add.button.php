<?php

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
       $addbutton = '<a href="././form.php">+</a>';
} else {
       $addbutton = '';
}

echo $addbutton;
