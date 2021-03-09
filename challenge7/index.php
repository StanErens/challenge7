<?php
//phpinfo();die;
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

    <title>V!ST@CARS | Home</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">

    </head>
    
    <body>

    
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

    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <video autoplay muted loop id="bg-video">
            <source src="assets/images/video.mp4" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="caption">
                <?php echo VIDEO_CAPTION; ?>
                <div class="main-button">
                    <a href="contact.php"><?php echo CONTACT_US; ?></a>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

   <!-- ***** Cars Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <?php echo FEATURED_CARS; ?>
                        <img src="assets/images/line-dec.png" alt="">
                        <p><?php echo FEATURED_CARS_TEXT; ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- ***** Fleet Starts ***** -->
  <section class="section" id="trainers">
        <div class="container">
            <div class="contact-form">
                <form action="#" id="contact">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    </div>
                </form>
            </div>

<?php
    if(isset($_POST['frm_adminform'])) {
        //opslaan van de gegevens
    
        //print_r($_POST); //developers code!

        include_once("assets/includes/connection.inc.php"); //conntectie DB
        include_once("assets/includes/admin_verwerkform.inc.php");    //gegevens uit formulier verzamelen
        include_once("assets/includes/adminform.inc.php");     //opslaan gegevens uit DB
    } 
    include_once("assets/includes/connection.inc.php"); //conntectie DB
    include_once("assets/includes/select.inc2.php"); //toon gegevens uit DB
    ?>  

</div>
    </section>
    <!-- ***** Fleet Ends ***** -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-button text-center">
                <a href="cars.php"><?php echo VIEW_CAR; ?></a>
            </div>
        </div>
    </section>
    <!-- ***** Cars End ***** -->

  
    <section class="section section-bg" id="schedule" style="background-image: url(assets/images/about-fullscreen-1-1920x700.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading dark-bg">
                        <?php echo READ_ABOUT_US; ?>
                        <img src="assets/images/line-dec.png" alt="">
                        <?php echo READ_ABOUT_US_OPENING; ?>
                    </div>
                </div>
            </div>
            <!--***** Dummytext Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="cta-content text-center">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore deleniti voluptas enim! Provident consectetur id earum ducimus facilis, aspernatur hic, alias, harum rerum velit voluptas, voluptate enim! Eos, sunt, quidem.</p>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto nulla quo cum officia laboriosam. Amet tempore, aliquid quia eius commodi, doloremque omnis delectus laudantium dolor reiciendis non nulla! Doloremque maxime quo eum in culpa mollitia similique eius doloribus voluptatem facilis! Voluptatibus, eligendi, illum. Distinctio, non!</p>
                    </div>
                </div>
            </div>
            <!--***** Dummytext End ***** -->
        </div>
    </section>

    <br>
    <br>

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <?php echo SEND_US_A_MESSAGE; ?>
                        <?php echo SEND_US_A_MESSAGE_TEXT; ?>
                        <div class="main-button">
                            <a href="contact.php">Contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

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