<?php
	include 'db.php';
	$response = array ("failed");
	
	//prepare two dates for today when the day started
		$month = date('m');
		$day = date('d')+3;
		$year = date('Y');

		$nextThreeDays = mktime(0, 0, 0, $month, $day, $year);
		$threeDaysTocome = date('Y-m-d', $nextThreeDays);
		
		$sql ="SELECT `description`, `weight`, `price`, `volume`, `unit`, `expiry`, `inStock` FROM `products` WHERE `expiry` <= '$threeDaysTocome'";
		$result = mysqli_query ($mysqli, $sql);
		
		if ($result){
			if (mysqli_fetch_assoc ($result) > 0){
				$response [0] = "success";
				while ($row = mysqli_fetch_assoc ($result)){
				
					$description = $row['description'];
					$weight = $row['weight'];
					$price = $row['price'];
					$volume = $row['volume'];
					$unit = $row['unit'];
					$inStock = $row['inStock'];
					$expiry = $row['expiry'];
					
					$exp = array ($description, $weight, $price, $volume, $unit, $inStock, $expiry);
					
					array_push ($response, $exp);
				}
			}			
		}
$responseJson = json_encode ($response);
echo $responseJson;
?>