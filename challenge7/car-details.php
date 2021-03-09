<?php
session_start();

$lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
$lang = substr($lang, 0,2);

if(isset($_GET['lang'])) {
    $lang = $_GET['lang'];
}

require_once("assets/languages/lang.$lang.php");
require_once("assets/includes/connection.inc.php");
$id = $_GET['id'];
$sql = "SELECT * FROM tb_cars WHERE tb_cars.id = ? AND (tb_cars.status = '1' OR tb_cars.status= '2')";
$data = array($id);

$stmt = $pdo->prepare($sql);
$stmt->execute($data);
$result = $stmt->fetchAll(); // get result

//print_r($result);

foreach($result as $key => $row) {
    // haal max 1 plaatje op per auto met id $row['id']
    $sql = "SELECT * FROM tb_image WHERE car_id = ?";
    $id = $row['id'];
    $data = array($id);
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);
    $resultImages = $stmt->fetchAll(); // get result

    $imageHtml = "";
    $sliderinfo = "";
    $i = 0;
    $active = "active";
    foreach($resultImages as $index => $rowImage) {
      //Print_r ($rowImage);
      $carid = $rowImage['car_id'];
      $name =  $rowImage['name'];

      $imageHtml .= <<<IMAGE
                <div class="carousel-item $active">
                  <img class="d-block w-100" src="autoimages/$carid/$name" alt="First slide" height="800px">
                </div>
IMAGE;

      $sliderinfo .= <<<INFO
        <li data-target="#carouselExampleIndicators" data-slide-to="$i" class="$active"></li>
INFO;
      $i++;
      if($active = "active") { $active = ""; }
    }
    //print $imageHtml;die;
}

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

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2><small><del>€ <?php echo $row['price'];?></del></small> <em>€ <?php echo $row['discountprice'];?></em></h2>
                        <p><?php echo V_PRICECAR; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
<?php echo $sliderinfo; ?>
              </ol>
              <div class="carousel-inner">
              <!-- Voor ieder plaatje in het database resultaat van het ophalen van plaatjes voor de auto -->
<?php echo $imageHtml; ?>

              <!--  <div class="carousel-item active">
                  <img class="d-block w-100" src="assets/images/car-image-1-1200x600.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="assets/images/car-image-1-1200x600.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="assets/images/car-image-1-1200x600.jpg" alt="Third slide">
                </div> -->
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            
            <br>
            <br>

            <div class="row" id="tabs">
              <div class="col-lg-4">
                <ul>
                  <li><a href='#tabs-1'><i class="fa fa-cog"></i> <?php echo V_SPECS2; ?></a></li>
                  <li><a href='#tabs-2'><i class="fa fa-phone"></i> Contact Details</a></li>
                </ul>
              </div>
              <div class="col-lg-8">
                <section class='tabs-content' style="width: 100%;">
                  <article id='tabs-1'>
                  <?php echo V_SPECS; ?>

                    <div class="row">
                       <div class="col-sm-6">
                            <label><?php echo V_CONDITION; ?></label>
                            <p><?php echo $row['carcondition'];?></p>
                       </div>

                       <div class="col-sm-6">
                            <label><?php echo V_BRAND; ?></label>
                       
                            <p><?php echo $row['brand'];?></p>
                       </div>

                       <div class="col-sm-6">
                            <label> Model</label>
                       
                            <p><?php echo $row['type'];?></p>
                       </div>

                       <div class="col-sm-6">
                            <label><?php echo V_REGISTRATION; ?></label>
                       
                            <p><?php echo $row['registered'];?></p>
                       </div>

                       <div class="col-sm-6">
                            <label><?php echo V_KM; ?></label>
                       
                            <p><?php echo $row['kilometerstand'];?> km</p>
                       </div>

                       <div class="col-sm-6">
                            <label><?php echo V_FUEL; ?></label>
                       
                            <p><?php echo $row['brandstof'];?></p>
                       </div>

                       <div class="col-sm-6">
                            <label><?php echo V_ENGINE; ?></label>
                       
                            <p><?php echo $row['enginesize'];?> cc</p>
                       </div>

                       <div class="col-sm-6">
                            <label><?php echo V_HP; ?></label>
                       
                            <p><?php echo $row['horsepower'];?> hp</p>
                       </div>


                       <div class="col-sm-6">
                            <label><?php echo V_TRANSMISSION; ?></label>
                       
                            <p><?php echo $row['transmission'];?></p>
                       </div>

                       <div class="col-sm-6">
                            <label><?php echo V_SEATS; ?></label>
                       
                            <p><?php echo $row['seats'];?></p>
                       </div>

                       <div class="col-sm-6">
                            <label><?php echo V_DOORS; ?></label>
                       
                            <p><?php echo $row['doors'];?></p>
                       </div>

                       <div class="col-sm-6">
                            <label><?php echo V_COLOR; ?></label>
                       
                            <p><?php echo $row['color'];?></p>
                       </div>
                       <div class="col-sm-6">
                       <form action="quatation.php">
                   <input type="submit" value="<?php echo V_OFFERTE; ?>"  class="btn btn-primary" />
                    </form>                     
                       </div>
                    </div>
                  </article>
                  <article id='tabs-2'>
                    <h4>Contact Details</h4>

                    <div class="row">   
                        <div class="col-sm-6">
                            <label><?php echo V_NAME; ?></label>

                            <p>Vista Cars</p>
                        </div>
                        <div class="col-sm-6">
                            <label><?php echo V_PHONE; ?></label>

                            <p>043 666 420 </p>
                        </div>
                        <div class="col-sm-6">
                            <label><?php echo V_MOBILEPHONE; ?></label>
                            <p>+31 6 001 155 11 </p>
                        </div>
                        <div class="col-sm-6">
                            <label>Email</label>
                            <p><a href="#">info@vistacars.nl</a></p>
                        </div>
                    </div>
                  </article>
                </section>
              </div>
            </div>
        </div>
    </section>

    <!-- ***** Fleet Ends ***** -->
    
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