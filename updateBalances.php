<?php
	include 'db.php';
	$response = array ("failed");
	$balanace = $_REQUEST['bal'];
	
	$sql = "INSERT INTO `track_register`(`opening_register`, `closing_register`) VALUES ('$balanace','0')";
	$result = mysqli_query ($mysqli, $sql);
	$response[0] = "success";
	array_push ($response, $balanace, '0');
$responseJson = json_encode ($response);
echo $responseJson;
?>