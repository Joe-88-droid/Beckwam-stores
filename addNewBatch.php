<?php
include 'db.php';
$pr = $_REQUEST ['pr'];
$exp = $_REQUEST ['exp'];
$amn = $_REQUEST ['amn'];

$response = array ("failed");

$sql = "SELECT `expiry`, `expiry2`, `inStock`, `inStock2` FROM `products` WHERE `code` = '$pr'";
$result = mysqli_query ($mysqli, $sql);

if ($result){
	$response [0] = "success";
	if (mysqli_num_rows ($result) > 0){
		$row = mysqli_fetch_assoc ($result);
		$expiry2 = $row['expiry2'];
		$inStock2 = $row['inStock2'];
		$inStock = $row['inStock'];
		
		//calculate the main batch ammount
		if ($inStock < 0){
			$inStock = 0;
		}
		$mainBatchAmount = $inStock + $inStock2;
		
		$sql = "UPDATE `products` SET `expiry`='$expiry2',`expiry2`='$exp',`inStock`='$mainBatchAmount',`inStock2`='$amn' WHERE `code` = '$pr'";
		$result = mysqli_query ($mysqli, $sql);
		
		if ($result){
			
		}else{
			$response [0] = "failed";
		}
	}else {
		array_push ($response, "absent");
	}
}
$responseJson = json_encode ($response);
echo $responseJson;
?>