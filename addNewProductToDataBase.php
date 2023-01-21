<?php
include 'db.php';

$response = array ("failed");

$New_Item_BarCode = $_REQUEST['New_Item_BarCode'];
$Item_Description = $_REQUEST['Item_Description'];
$Item_price = $_REQUEST['Item_price'];
$denomination = $_REQUEST['denomination'];
$volume_weight = $_REQUEST['volume_weight'];
$available_in_store = $_REQUEST['available_in_store'];
$productExpiry = $_REQUEST['productExpiry'];

//check whether the product code exists already.
$sql = "SELECT * FROM `products` WHERE `code` = '$New_Item_BarCode'";
$result = $mysqli_query ($mysqli, $sql);

if ($result){
	if (mysqli_fetch_assoc ($result) > 0){
		array_push ($response, "present");
		$response[0] = "success";
	}else {
				
		//determine whether its weight or volume_weight
		$sql ="";
		if ($volume_weight == "Kg" || $volume_weight == "g"){
			$sql = "INSERT INTO `products`(`code`, `price`, `description`, `weight`, `unit`, `expiry`, `inStock`) VALUES ('$New_Item_BarCode','$Item_price','$Item_Description','$denomination','$volume_weight','$productExpiry','$available_in_store')";
		}else {
			$sql = "INSERT INTO `products`(`code`, `price`, `description`, `volume`, `unit`, `expiry`, `inStock`) VALUES ('$New_Item_BarCode','$Item_price','$Item_Description','$denomination','$volume_weight','$productExpiry','$available_in_store')";
		}

		$result = mysqli_query ($mysqli, $sql);

		if ($result){
			array_push ($response, "absent");
			$response[0] = "success";
		}

	}
	
}

$responseJson = json_encode ($response);
echo $responseJson;
?>