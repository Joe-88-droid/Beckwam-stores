<?php
include 'db.php';
	$productCode = $_REQUEST ['code'];
	$response = array ("failed");
	
	$sql = "SELECT * FROM `products` WHERE `code` = '$productCode'";
	$result = mysqli_query($mysqli, $sql);
	
	if ($result){
		if (mysqli_num_rows($result) > 0){
			//query successful and product available
			$row = mysqli_fetch_assoc ($result);
			
			$id = $row['id'];
			$code = $row['code'];
			$price = $row['price'];
			$description = $row['description'];
			$weight = $row['weight'];
			$volume = $row['volume'];
			$unit = $row['unit'];
			$expiry = $row['expiry'];
			$inStock = $row['inStock'];
			
			array_push ($response, $id, $code, $price, $description, $weight, $volume, $unit, $expiry, $inStock);
			$response [0] = "success";
		}else{
			//successful query but product not available
			array_push ($response, "absent");
			$response [0] = "success";
		}
	}
	
$responseJson = json_encode ($response);
echo $responseJson;
?>