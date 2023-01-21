<?php
include 'db.php';
$file = fopen("items.txt", "r");

function extractPrice ($line){
	$arrayLine = explode(",",$line);
	$positionOfKsh = stripos($arrayLine[1], "Ksh");
	
	$price = substr ($arrayLine[1], 1, $positionOfKsh-1);
	return $price;
}
function extractProductDescription ($line){
	$arrayLine = explode(",",$line);
	$linelength = strlen($arrayLine[2])-2;
	
	$theDescription = substr ($arrayLine[2], 1, $linelength);
	return $theDescription;
}
function getWeightVolume ($line){
	$arrayLine = explode(",",$line);
	$linelength = strlen($arrayLine[3])-2;
	$result = substr ($arrayLine[3], 1, $linelength);
	return $result;
}
function getSIUNit ($line){
	$arrayLine = explode(",",$line);
	$unit;
	$positionOfKsh = stripos(strtolower ($arrayLine[4]), strtolower ("g"));
	 if ($positionOfKsh){
		$unit = "g";
	 }
	 
	$positionOfKsh = stripos(strtolower ($arrayLine[4]), strtolower ("Kg"));
	 if ($positionOfKsh){
		$unit = "Kg";
	 }
	 
	$positionOfKsh = stripos(strtolower ($arrayLine[4]), strtolower ("L"));
	 if ($positionOfKsh){
		$unit = "L";
	 }
	 
	$positionOfKsh = stripos(strtolower ($arrayLine[4]), strtolower ("ml"));
	 if ($positionOfKsh){
		$unit = "ml";
	 }
	
	return $unit;
}

if (!$file){
	
}else{$r =0;
	while(! feof($file)) {
		$line = fgets($file);
		$r++;
		$pr = extractPrice ($line);
		$de = extractProductDescription ($line);
		$wv = getWeightVolume ($line);
		$un = getSIUNit ($line);
		
		$sql ="";
		if ($un == "Kg" || $un == "g") {
			$sql = "INSERT INTO `products`(`price`, `description`, `weight`, `unit`) VALUES ('$pr','$de','$wv','$un')";
		}else {
			$sql = "INSERT INTO `products`(`price`, `description`, `volume`, `unit`) VALUES ('$pr','$de','$wv','$un')";
		}
		
		mysqli_query ($mysqli, $sql);
	}
}
?>