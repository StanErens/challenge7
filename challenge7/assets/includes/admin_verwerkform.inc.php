<?php
    foreach($_POST as $key=>$value) {
        $$key = $value;
    }


$sql = "INSERT INTO tb_cars (brand, type, bouwjaar, kilometerstand, brandstof, transmission, price, discountprice, carcondition, enginesize, doors, registered, horsepower, seats, color)
VALUES ('$brand', '$type', '$bouwjaar', '$kilometerstand', '$brandstof', '$transmission', '$price', '$discountprice', '$carcondition', '$enginesize', '$doors', '$registered', '$horsepower', '$seats', '$color')";
require_once('connection.inc.php');
$stmt = $pdo->prepare($sql);
$stmt->execute();
$last_id = $pdo->lastInsertId();

chmod("autoimages", 0777);
mkdir("autoimages/$last_id", 0777, true);


$i = 0;
foreach($_FILES['files']['name'] as $key => $row) {

//print_r($row); die;
    $temp = $_FILES['files']['tmp_name'][$i];
    $name = $_FILES['files']['name'][$i];
    $dir = "autoimages/$last_id/" . $name;
    move_uploaded_file($temp, $dir);

    require_once('connection.inc.php');
    $sql = "INSERT INTO tb_image (car_id, name) VALUES (?, ?)";
    $data = array($last_id, $name);
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);
    $i++;
}