<?php
session_start();


$lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
$lang = substr($lang, 0,2);

if(isset($_GET['lang'])) {
    $lang = $_GET['lang'];
}

require_once("assets/languages/lang.$lang.php")


?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>V!st@ CARS</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">


    </head>
    
    <body>
 
   
            <?php
            if (isset($_GET["error"])){
                if ($_GET["error"] == "emptyinput"){
                    echo "<p>Fill in all fields!</p>";
                }
                else if ($_GET["error"] == "invaliduid"){
                    echo "<p>Choose a proper username!</p>";
                }
                else if ($_GET["error"] == "invalidemail"){
                    echo "<p>Choose a proper email!</p>";
                }
                else if ($_GET["error"] == "passworddontmatch"){
                    echo "<p>Passwords don't match!</p>";
                }
                else if ($_GET["error"] == "usernametaken"){
                    echo "<p>Username already taken!</p>";
                }
                else if ($_GET["error"] == "stmtfailed"){
                    echo "<p>Something went wrong, try again!</p>";
                }
                else if ($_GET["error"] == "none"){
                    echo "<p>You have signed up!</p>";
                }
            }
        ?>


    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <?php include_once("assets/includes/Header.Area.php");?>
    <!-- ***** Header Area End ***** -->


    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <?php echo LOGIN_ADMIN; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="wrapper">
        <h2>Sign Up</h2>
        <br>
        <div class="signup-form-form">
            <form action="assets/includes/login/signup.inc.php" method="post">
                <input type="text" class="form-control" name="name" placeholder="Full name">
                <input type="text" class="form-control" name="email" placeholder="Email">
                <input type="text" class="form-control" name="uid" placeholder="Username">
                <input type="password" class="form-control" name="pwd" placeholder="Password">
                <input type="password" class="form-control" name="pwdrepeat" placeholder="Repeat Password">
                <br>
                <div class="button-container">
                    <button type="submit" class="btn btn-primary" name="submit" >Sign Up</button>
                    <div class="signup-knop"><a href="inlog.php">Log in</a></div>
                </div>
            </form>
        </div>
        </div>
      

    

    <!-- FOOTER -->
    <?php Include("assets/includes/footer.php"); ?>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/mixitup.js"></script> 
    <script src="assets/js/accordions.js"></script>
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

  </body>
</html>