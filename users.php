<?php
session_start();
$connect=mysqli_connect("localhost","root","","stockregister");

if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
if(!$connect)
die(mysqli_error($connect));
$user_id=$_SESSION['user_id'];


$query="SELECT * FROM `user_details`";

$ret_val=mysqli_query($connect,$query);
if(!$ret_val)
	die($connect);

if(mysqli_num_rows($ret_val)==0)
		die("no users exist");
	
	echo "<html>";
	echo "<body style='width=100% height=100%'>";
	echo "<div >";
	echo "<table>";
	echo "<tr><td> user_id</td>";
	echo "<td>first_name</td>";
	echo "<td>last_name</td>";
	echo "<td>email</td>";
	echo "<td>address</td>";
	echo "<td>password</td>";
	echo "<td>contact1</td>";
	echo "<td>contact2</td>";
	echo "<td>user_type</td></tr>";
	while($result=mysqli_fetch_assoc($ret_val)){
		
		echo "<tr><td>".$result['user_id']."</td><td>".$result['first_name']."</td><td>".
		$result['last_name']."</td><td>".$result['email']."</td><td>".
		$result['address']."</td><td>".$result['password']."</td><td>".$result['primary_phone_number']."</td><td>".
		$result['secondary_phone_number']."</td><td>".$result['user_type']."</td></tr>";
	}
	
	echo "</table>";
	echo "</div>";
	
	echo "</body>";
	echo "<html>";
	
	
}
else {
	echo "<script> alert('log in to view profile')</script>";
	 echo "<script>window.open('index.html','_self')</script>";
	
	
}
	