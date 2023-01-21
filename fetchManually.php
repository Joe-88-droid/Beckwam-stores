<?php
include 'db.php';
$ch = $_REQUEST ['ch'];
$ch = '%'.$ch.'%';

$sql = "SELECT `id`, `code`, `price`, `description`, `weight`, `volume`, `unit`, `expiry`, `expiry2`, `inStock`, `inStock2` FROM `products` WHERE `description` LIKE '$ch'";
$result = mysqli_query ($mysqli, $sql);
$response = array ();

if ($result){
	if (mysqli_num_rows ($result) > 0){
			while ($row = mysqli_fetch_assoc ($result)){
			$id = $row ['id'];
			$code = $row ['code'];
			$price = $row ['price'];
			$description = $row ['description'];
			$weight = $row ['weight'];
			$volume = $row ['volume'];
			$unit = $row ['unit'];
			$expiry = $row ['expiry'];
			$expiry2 = $row ['expiry2'];
			$inStock = $row ['inStock'];
			$inStock2 = $row ['inStock2'];
			
			$pro = array ($id, $code, $price, $description, $weight, $volume, $unit, $expiry, $expiry2, $inStock, $inStock2);
			array_push ($response, $pro);
		}
	}	
}
$responseJson = json_encode ($response);
echo $responseJson;
?>