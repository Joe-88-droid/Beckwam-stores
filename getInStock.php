<?php
include 'db.php';

$response = array ("failed");

$sql = "SELECT `code`, `price`, `description`, `weight`, `volume`, `unit`, `expiry`, `expiry2`, `inStock`, `inStock2` FROM `products` WHERE 1";
$result = mysqli_query ($mysqli, $sql);

if ($result){
	while ($row = mysqli_fetch_assoc ($result)){
		$description = $row ['description'];
		$weight = $row ['weight'];
		$price = $row ['price'];
		$volume = $row ['volume'];
		$unit = $row ['unit'];
		$inStock = $row ['inStock'];
		$inStock2 = $row ['inStock2'];
		
		$whatsInStock = $inStock + $inStock2;
		$amount = $weight." ".$unit;
		
		if ($amount == 0){
			$amount = $volume." ".$unit;
		}
		
		$productCount = array ($description, $price, $amount, $whatsInStock);
		
		array_push ($response, $productCount);
		$response[0] = "success";
	}
}
$responseJson = json_encode ($response);
echo $responseJson;
?>