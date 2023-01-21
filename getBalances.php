<?php
	include 'db.php';
	$response = array ("failed");
	
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
		if (mysqli_num_rows ($result) > 0){
			$row = mysqli_fetch_assoc ($result);
			
			$opening_balance = $row['opening_register'];
			$closing_register = $row['closing_register'];
			$response[0] = "success";
			array_push ($response, $opening_balance, $closing_register);
		}	
	}
	
$responseJson = json_encode ($response);
echo $responseJson;
?>