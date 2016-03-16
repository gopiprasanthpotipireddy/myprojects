<?php
session_start();
$connect=mysqli_connect("localhost","root","","stockregister");

if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
if(!$connect)
die(mysqli_error($connect));
$user_id=$_SESSION['user_id'];

if($user_id=='gopiprasanth'){
	
	echo "<html>";
	echo "<body>";
	echo "<h3 class='blue-text'>MY PROFILE</h3>";
	echo "<p class='violet-text'>USER ID:gopiprasanth</p><br>";
	echo "<p class='indigo-text'>FIRST NAME:gopiprasanth</p><br>";
	echo "<p class='black-text'>LAST NAME: potipireddy</p><br>";
	echo "<p class='green-text'>ADDRESS:vizianagaram</p><br>";
	echo "<p class='yellow-text'>PRIMARY CONTACT:8498011066</p><br>";
    echo "<p class='orange-text'>SECONDARY CONTACT:9493005178</p><br>";
    echo "<p class='red-text'>USER TYPE:admin</p><br>";
    echo "<p class='blue-text'>EMAIL ID:gopi.prasanth007@gmail.com</p><br>";
	echo "</body>";
    echo "</html>";
}
	

else {
$user_details="SELECT * FROM user_details WHERE `user_id`='$user_id'";

$result=mysqli_query($connect,$user_details);
$row=mysqli_fetch_assoc($result);

echo "<html>";
echo "<h3 class='blue-text'>MY PROFILE</h3>";
echo "<p>USER ID:".$row['user_id']."</p><br>";
echo "<p>PASSWORD :".$row['password']."</p><br>";
echo "<p>FIRST NAME:".$row['first_name']."</p><br>";
echo "<p>LAST NAME".$row['last_name']."</p><br>";
echo "<p>ADDRESS".$row['address']."</p><br>";
echo "<p>PRIMARY COMTACT:".$row['primary_phone_number']."</p><br>";
echo "<p>SECONDARY CONTACT:".$row['secondary_phone_number']."</p><br>";
echo "<p>USER TYPE:".$row['user_type']."</p><br>";
echo "<p>EMAIL ID:".$row['email']."</p><br>";
echo "</html>";

echo "NOTE:for any changes or the content is wrong please visit the admin";
}
}
else {
	echo "<script> alert('log in to view profile')</script>";
	 echo "<script>window.open('index.html','_self')</script>";
	
	
}
	
	
?>