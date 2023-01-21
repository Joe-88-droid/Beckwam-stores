<?php
include 'db.php';
$productCode = $_REQUEST ['products'];
$response = array ("failed");
	$time = time();
	$recieptProducts = json_decode ($productCode);
	
	$size = count ($recieptProducts);
	
	$i;
	$totalProductsValue = 0; 
	for ($i = 0; $i < $size; $i++){
		$ProductCode = $recieptProducts [$i][4];
		$ProductCodeBar = $recieptProducts [$i][2];
		$productsPurchased = $recieptProducts [$i][10];
		//insert the products into the receipt 
		$sql = "INSERT INTO `receipts`(`code_`, `receipt_bar_code`, `no_of_products_purchased`) VALUES ('$ProductCodeBar','$time', '$productsPurchased')";
		$result = mysqli_query ($mysqli, $sql);
		
		//calculate the total cost of this receipt
		
		$totalProductsValue = $totalProductsValue+ ($recieptProducts [$i][3]*$recieptProducts [$i][10]);
		
		//check the ammount of product remaining in stock the add the second batch if need be
		$sql = "SELECT `inStock`, `inStock2`, `expiry2` FROM `products` WHERE `description` = '$ProductCode'";
		$result = mysqli_query($mysqli, $sql);
		
		if ($result){
			$numberOfItemsPurchased = $recieptProducts [$i][10];
			$row = mysqli_fetch_assoc ($result);
			$inStock = $row['inStock'];
			$inStock2 = $row['inStock2'];
			$expiry2 = $row['expiry2'];
			
			if ($numberOfItemsPurchased > $inStock){
				$totalStock = $inStock + $inStock2;
				
				$newStock = $totalStock - $numberOfItemsPurchased;
				
				$sql = "UPDATE `products` SET `expiry`='$expiry2',`expiry2`='',`inStock`='$newStock',`inStock2`='0' WHERE `description` = '$ProductCode'";
				mysqli_query ($mysqli, $sql);
			}else{
				$newStock = $inStock - $numberOfItemsPurchased;
				
				if ($newStock < 7){
					$totalStock = $newStock + $inStock2;
					
					$sql = "UPDATE `products` SET `expiry`='$expiry2',`expiry2`='',`inStock`='$totalStock',`inStock2`='0' WHERE `description` = '$ProductCode'";
					mysqli_query ($mysqli, $sql);
				}else {
					$sql = "UPDATE `products` SET `inStock`='$newStock' WHERE `description` = '$ProductCode'";
					mysqli_query ($mysqli, $sql);
				}
			}
		}
	}
	
	$sql = "INSERT INTO `cash_sale`(`ammount`, `receipt_id`) VALUES ('$totalProductsValue', '$time')";
	mysqli_query ($mysqli, $sql);
	
	array_push ($response, $time);
	$response [0] = "success";
	//update any sales in todays sales
		//prepare a date to check
		$dateToday = date('Y/d/m');
		//prepare two dates for today when the day started
		$month = date('m');
		$day = date('d');
		$year = date('Y');

		$todayMorning = mktime(0, 0, 0, $month, $day, $year);
		$todayMorningDateTime = date('Y-m-d', $todayMorning);
		
		$sql = "SELECT `opening_register`, `closing_register`, `date` FROM `track_register` WHERE `date` >= '$todayMorningDateTime'";
		
		$result = mysqli_query ($mysqli, $sql);
		
		if ($result){
			$row = mysqli_fetch_assoc ($result);
			$closing_register = $row['closing_register'];
			
			$newBalance = $totalProductsValue + $closing_register;
			
			$sql = "UPDATE `track_register` SET `closing_register`='$newBalance' WHERE `date` >= '$todayMorningDateTime'";
			mysqli_query ($mysqli, $sql);
		}
		
	
$responseJson = json_encode ($response);
echo $responseJson;
?>