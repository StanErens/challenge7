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
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
  }
   
  
  require_once "assets/inlog/config.php";
   
  
  $username = $password = "";
  $username_err = $password_err = "";
   
  if($_SERVER["REQUEST_METHOD"] == "POST"){
   
      if(empty(trim($_POST["username"]))){
          $username_err = "Please enter username.";
      } else{
          $username = trim($_POST["username"]);
      }
      
      if(empty(trim($_POST["password"]))){
          $password_err = "Please enter your password.";
      } else{
          $password = trim($_POST["password"]);
      }
      
      if(empty($username_err) && empty($password_err)){
          $sql = "SELECT id, username, password FROM users WHERE username = ?";
          
          if($stmt = mysqli_prepare($link, $sql)){
              mysqli_stmt_bind_param($stmt, "s", $param_username);
              
              $param_username = $username;
              
              if(mysqli_stmt_execute($stmt)){
                  mysqli_stmt_store_result($stmt);
                  
                  if(mysqli_stmt_num_rows($stmt) == 1){                    
  
                      mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                      if(mysqli_stmt_fetch($stmt)){
                          if(password_verify($password, $hashed_password)){
  
                              session_start();
                              
  
                              $_SESSION["loggedin"] = true;
                              $_SESSION["id"] = $id;
                              $_SESSION["username"] = $username;                            
                              
  
                              header("location: index.php");
                          } else{
  
                              $password_err = "The password you entered was not valid.";
                          }
                      }
                  } else{
  
                      $username_err = "No account found with that username.";
                  }
              } else{
                  echo "Oops! Something went wrong. Please try again later.";
              }
              mysqli_stmt_close($stmt);
          }
      }
  
      mysqli_close($link);
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
      <?php echo FILL_IN_CREDENTIALS; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label><?php echo FORM_USERNAME; ?></label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label><?php echo FORM_PASSWORD; ?></label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
        </form>
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