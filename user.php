<?php
session_start();
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
	$user_type=$_SESSION['user_type'];
	 if($user_type=$_SESSION['user_type']=="admin"){
		echo "<script>window.open('admin.php','_self')</script>";
	}
	else if($user_type=$_SESSION['user_type']=="updater"){
		echo "<script>window.open('stockmanager.php','_self')</script>";
	}
	
}
else{
	echo "<script>alert('log in first!')</script>"; 
      echo "<script>window.open('index.html','_self')</script>";
}
	

?>

<!Doctype html>
<html>
<head>
<title>USER:PAGE</title>
 <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="fonts/font-awesome.min.css" type="text/css" media="screen">
    <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
    <link href="css/material.min.css" rel="stylesheet">
    <link href="css/ripples.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
	<link href="css/materialize.min.css" type="text/css" rel="stylesheet">
	<link type="text/css" href="../google.css" rel="stylesheet">
   
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="background:url('images/office30.jpg')">
<nav class="top-nav #90caf9 blue lighten-3 " id="top1">
    <div class="nav-wrapper">
      <a href="index.html" class="brand-logo"> 
  <img src="images/images11.jpg" alt="no-display" style="border-radius:100px" width=15%>
  USER PAGE</a>
  
  <ul id="nav-mobile" class="right hide-on-med-and-down">
       <li><a onclick="loadWrite()" href="#!"id="profile">MYPROFILE</a></li>
        <li><a href="#down"></a></li>
		<li> <a onclick="logout()" href="logout.php" id="logout">LOG OUT</a></li>
      </ul>
    </div>
  </nav>
  
  
  
  
   <div id="contentdisplay">
 <!--display profile-->
 
 
 </div>
 <div class="row">
 <h3>check availability</h3>
   <div class="input-field col s6">
  <form name="search" method="POST" action="#!">
  
   <select class="browser-default" name="item">
	<option value="" disabled ><p class="orange-text">ELECTRONICS</p></option>
	<option value="calculator" selected>calculator</option>
      <option value="computer">computer</option>
		<option value="punching machine">punching machine</option>
   
   <option value="" disabled ><p class="white-text">PAPER PRODUCTS</p></option>
        <option value="register">register</option>
        <option value="transparent sheets">transparent sheets</option>
		<option value="rolls">rolls</option>
		<option value="printed sheets">printed sheets</option>
    
	<option value="" disabled ><p class="white-text">WRITING INSTRUMENTS</p></option>
        <option value="chalks">chalks</option>
        <option value="gel pens">gel pens</option>
		<option value="markers">markers</option>
		<option value="glitter pens">glitter pens</option>
		<option value="hilighters">hilighters</option>
	    <option value="ball pens">ball pens</option>

    </select>
	<button class="btn waves-effect waves-#424242 blue" type="submit" name="avail">SEARCH
  <i class="material-icons right">send</i></button>
  </form>
  </div>
  <div class="col s6" id="availability">
  
  <!--search item availability-->
  </div>
  </div>
  
  
<script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ripples.min.js"></script>
    <script src="js/material.min.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/jquery.mmenu.min.all.js"></script> 
    <script src="js/count-to.js"></script>   
    <script src="js/jquery.inview.min.js"></script>     
    <script src="js/main.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/jquery.nav.js"></script>      
    <script src="js/smooth-on-scroll.js"></script>
    <script src="js/smooth-scroll.js"></script>
	
	<script src="jquery-1.11.3.min.js" type="text/javascript"></script>
	
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    	<script type="text/javascript" src="js/materialize.min.js"></script>

		<script>  	//for cross communication in web pages
	function logout(){
		
	window.localStorage.setItem('log_in', false);
	
		
	}
   function storageChange(event) {
    if(event.key == 'log_in') {
        alert('Logging out');
		window.location.reload();
    }
}
window.addEventListener('storage', storageChange, false);
//loads profile page
function loadWrite() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("contentdisplay").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "profile.php", true);
  xhttp.send();
}
   </script> 
</body>
</html>




<?php
$connect=mysqli_connect("localhost","root","","stockregister");
	if(!$connect)
		die(mysqli_error($connect));

	if(isset($_POST['avail'])){
	$item_name=$_POST['item'];
	
	$sql="SELECT `quantity` FROM items WHERE `item_name`='$item_name'";
	$ret_val=mysqli_query($connect,$sql);
	if(!$ret_val)
		die(mysqli_error($connect));
	$result=mysqli_fetch_assoc($ret_val);
	
	

echo "<script>document.getElementById('availability').innerHTML = '".$item_name.$result['quantity']."'</script>";


}


?>

