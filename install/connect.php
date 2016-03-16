<?php
$server='localhost';
$server_username='root';
$server_password='';
$database='stockregister';
$connect=mysqli_connect($server,$server_username,$server_password);
if(!$connect)
	die('Connection Error');
?>	
