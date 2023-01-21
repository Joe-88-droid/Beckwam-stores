<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = 'password';
$db = 'mini_mart';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

?>