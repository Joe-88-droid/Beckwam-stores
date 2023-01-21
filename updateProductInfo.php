<?php
include 'db.php';
$New_Item_BarCodeEdit = $_REQUEST ['New_Item_BarCodeEdit'];
$Item_DescriptionEdit = $_REQUEST ['Item_DescriptionEdit'];
$productExpiryEdit = $_REQUEST ['productExpiryEdit'];
$Item_priceEdit = $_REQUEST ['Item_priceEdit'];
$denominationOnProductsEdit = $_REQUEST ['denominationOnProductsEdit'];
$volume_weighteEdit = $_REQUEST ['volume_weighteEdit'];
$available_in_storeEdit = $_REQUEST ['available_in_storeEdit'];

$response = array ("failed");
$sql = "";

if ($volume_weighteEdit == "Kg" || $volume_weighteEdit == "g"){
	$sql = "UPDATE `products` SET `code`='$New_Item_BarCodeEdit',`price`='$Item_priceEdit',`description`='$Item_DescriptionEdit',`weight`='$denominationOnProductsEdit',`unit`='$volume_weighteEdit',`expiry`='$productExpiryEdit',`inStock`='$available_in_storeEdit' WHERE `description` = '' or `code` = '$New_Item_BarCodeEdit'";
}else{
	$sql = "UPDATE `products` SET `code`='$New_Item_BarCodeEdit',`price`='$Item_priceEdit',`description`='$Item_DescriptionEdit',`volume`='$denominationOnProductsEdit',`unit`='$volume_weighteEdit',`expiry`='$productExpiryEdit',`inStock`='$available_in_storeEdit' WHERE `description` = '' or `code` = '$New_Item_BarCodeEdit'";
}


$result = mysqli_query ($mysqli, $sql);

if ($result){
	$response[0] = "success";
}
$responseJson = json_encode ($response);
echo $responseJson;
?>