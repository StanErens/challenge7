<?php
// $sql = "SELECT * FROM tb_cars INNER JOIN tb_image ON tb_cars.id = tb_image.car_id WHERE tb_cars.status = '1' OR tb_cars.status= '2'";
$sql = "SELECT * FROM tb_cars WHERE tb_cars.status = '1' OR tb_cars.status= '2'";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(); // get result

echo "<div class='row'>";
foreach($result as $key => $row) {
    // haal max 1 plaatje op per auto met id $row['id']
    $sql = "SELECT * FROM tb_image WHERE car_id = ? LIMIT 1";
    $id = $row['id'];
    $data = array($id);
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);
    $resultImages = $stmt->fetchAll(); // get result
    $imageRow = $resultImages[0];
    //echo print_r($resultImages);

    echo "<div class='col-lg-4'>";
    echo '<div class="trainer-item">';
    echo '<div class="image-thumb">';
    echo "<img src='" . "autoimages/" .$imageRow['car_id'] . "/" . $imageRow['name'] . "' '>";
    echo "</div>"; //end image
    echo '<div class="down-content">';
    echo "<span>";
    echo "<del><sup>€</sup>" . $row['price'] . "</del> &nbsp; <sup>€</sup>" . $row['discountprice'];
    echo "</span>"; //einde prijs
    echo "<h4>" . $row['brand'] . "," . "<br>" . $row['type'] . "</h4>";// brand/type
    echo "<p> <i class='fa fa-dashboard'></i> " . $row['kilometerstand'] . " km" . "&nbsp;&nbsp;&nbsp";
    echo "<i class='fa fa-cube'></i> " . $row['bouwjaar'] . "&nbsp;&nbsp;&nbsp";
    echo "<i class='fa fa-cog'></i> " . $row['transmission'] . "&nbsp;&nbsp;&nbsp </p>";
    
    echo '<ul class="social-icons"><li><a href="car-details.php?id='.$row['id'].'">+ View Car</a></li></ul>';
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
?>