
<?php
session_start();
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
	$user_type=$_SESSION['user_type'];
	 if($user_type=$_SESSION['user_type']=="updater"){
		echo "<script>window.open('stockmanager.php','_self')</script>";
	}
	else if($user_type=$_SESSION['user_type']=="user"){
		echo "<script>window.open('user.php','_self')</script>";
	}
	
}
else{
	//echo "<script>alert('log in first!')</script>"; 
      echo "<script>window.open('index.html','_self')</script>";
}
	

?>



<html>
<head>
<title>admin</title>


<style>
#mydiv {
  display: none;
  
}
</style>
<!--import load.css-->
	<link href="load.css" rel="stylesheet">
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

<body class="white lighten-2" onload="myFunction()">

<nav class="top-nav #90caf9 blue lighten-3 " id="top1">
    <div class="nav-wrapper">
      <a href="index.html" class="brand-logo"> 
  <img src="images/images11.jpg" alt="no-display" style="border-radius:100px" width=15%/>
  ADMIN PAGE</a>

      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="#down"  id="user">CREATE USER</a></li>
		 <li><a href="#" onclick="viewusers()" id="view">VIEW USERS</a></li>
        <li><a href="#!" onclick="loadWrite()" id="profile">MYPROFILE</a></li>
        <li><a href="#down">DAILYOPERATIONS</a></li>
		<li> <a onclick ="logout()" href="logout.php" id="logout">LOG OUT</a></li>
      </ul>
    </div>
  </nav>
<div class="loading" id="loader">
<div></div>
<div></div>
<div></div>
</div>

<div>
<div id="contentdisplay">
<!--profile-->
<img class="responsive" width=100% height=100% src="images/office7.jpg"/>
</div>



 
 
<div class="row" id="down">
<div class="col s6">
<h3> CREATE NEW USER</h3><br>

<div class="row">
    <form class="col s12" name="user" method="POST" action="#!">
      <div class="row">
        <div class="input-field col s6">
          <input  name="first_name" type="text" class="validate" required>
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input  type="text" name="last_name" class="validate" required>
          <label for="last_name">Last Name</label>
        </div>
      </div>
	  <div class="row">
	   <div class="input-field col s12">
	    <textarea name="address" class="materialize-textarea" required></textarea>
		<label for="textarea">address</label> 
        </div>
	 </div>	
      <div class="row">
	  <div class="input-field col s6">
	  <i class="material-icons prefix">account_circle</i>
          <input name="user_id" type="text" class="validate" required>
          <label for="username">USER NAME</label>
        </div>
        <div class="input-field col s6">
          <input name="password" type="password" class="validate" required>
          <label for="password">Password</label>
        </div>
		 
      </div>
	 <div class="row">
	  <div class="input-field col s6">
	    <i class="material-icons prefix">phone</i>
          <input name="primary_phone_number" type="tel" class="validate" required>
          <label for="icon_telephone">PRIMARY CONTACT</label>
	  </div>	
      <div class="input-field col s6">
	    <i class="material-icons prefix">phone</i>
          <input name="secondary_phone_number" type="tel" class="validate">
          <label for="icon_telephone">SECONDARY CONTACT</label>
	  </div>
    </div>	  
	  
	  
	  
      <div class="row">
        <div class="input-field col s12">
          <input name="email" type="email" class="validate" required>
          <label for="email">Email</label>
        </div>
      </div>
	  <div class="row">
	  <div class="input-field col s6">
    <select name="user_type" >
      <option value="user">USER</option>
      <option value="stockupdater">STOCK UPDATER</option>
	  <option value="userupdater">USERSTOCKUPDATER</option>
      </select>
    <label>USER TYPE</label>
  </div>
  <div class="col s6">
  <p> sex</p>
  <p>
      <input name="sex" type="radio" id="male" required/>
      <label for="male">MALE</label>
    </p>
    <p>
      <input name="sex" type="radio" id="female" required/>
      <label for="female">FEMALE</label>
    </p>
	</div>
	<br>

  <button class="btn waves-effect waves-#424242 grey" type="submit" name="createuser">CREATE USER
  <i class="material-icons right">send</i></button>
        	
	 
    </form>
  
 </div> 
</div>     

</div>
<form method="POST" action="#!">
<div class="col s6">
<h3>DOWNLOAD DAILY OPERATIONS</h3>
ENTER DATE:<input type="date" name="date" class="datepicker">
<button class="btn waves-effect waves-#424242 grey" type="submit" name="download">DOWNLOAD
  <i class="material-icons right">send</i></button>
  </div>
  </div>
</form>
</div>
<script>
function myFunction() {
    myVar = setTimeout(showPage, 3000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("mydiv").style.display = "block";
}
</script>


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
	 
	 <script>
	   $(document).ready(function() {
    $('select').material_select();
  });
  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
  
 </script>
	<script>  	//for cross communication in web pages
	function logout(){
		
	window.localStorage.setItem('log_in', false);
	
		
	}
   function storageChange(event) {
    if(event.key == 'log_in') {
        alert('Logged in: ' + event.newValue);
		window.location.reload();
    }
}
window.addEventListener('storage', storageChange, false);
//profile
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
 //show users  
function viewusers() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("contentdisplay").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "users.php", true);
  xhttp.send();
}	 
</script> 	 
	 
 
</body>
</html>
<?php  
//path to the session storage
/*echo $_SESSION['user_id'];
echo session_save_path(); 
*/ 
?>


<?php
if(isset($_POST['createuser'])){
$connect=mysqli_connect("localhost","gopi","","stockregister");
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=	$_POST['email'];
$address=$_POST['address'];
$user_id=$_POST['user_id'];
$password=$_POST['password'];
$primarycontact=$_POST['primary_phone_number'];
$secondarycontact=$_POST['secondary_phone_number'];
$user_type=$_POST['user_type'];
     
	$sql="INSERT INTO user_details" .
	"(user_id,first_name,last_name,email,address,password,primary_phone_number,secondary_phone_number,user_type)".
	"VALUES('$user_id','$first_name','$last_name','$email','$address','$password','$primarycontact','$secondarycontact','$user_type')";
	
	if(mysqli_query($connect,$sql)){
	
	}
	else{
		echo "insertion fail".mysqli_error($connect);
	}
	
}

if(isset($_POST['download'])){
	
	
	$connect=mysqli_connect("localhost","gopi","","stockregister");
	$date=$_POST['date'];
	if(!$date){
		 echo "<script>alert('please fill out date field')</script>"; 
	}
	else{
	
	$d=array("January"=>"01", "February"=>"02","March"=>"03","April"=>"04","May"=>"05","June"=>"06",
	"July"=>"07","August"=>"08","September"=>"09","October"=>"10","November"=>"11","December"=>"12"
	
	);
	$date1=str_replace(","," ","$date");
	echo $date1;echo "<br>";
	$d1=explode(" ",$date1);
	$month=$d1[1];
	$year=$d1[3];
	$date= "$year"."-".$d["$month"]."-0".$d1[0];
	echo $date;
	
	$transaction="SELECT * FROM transaction_details WHERE CAST(allocation_date AS DATE) = '$date' OR CAST(return_date AS DATE)='$date'";
	
	$ret_val=mysqli_query($connect,$transaction);
	if(!$ret_val)
		die(mysqli_error($connect));
	
	if(mysqli_num_rows($ret_val)==0)
		die("no transactions found on this date");
	
	
	echo "<div>";
	echo "<table>";
	echo "<tr><td> user_id</td>";
	echo "<td>transaction_id</td>";
	echo "<td>allocation_date</td>";
	echo "<td>return_date</td></tr>";
	
	while($result=mysqli_fetch_assoc($ret_val)){
		
		echo "<tr><td>".$result['user_id']."</td><td>".$result['transaction_id']."</td><td>".
		$result['allocation_date']."</td><td>".$result['return_date']."</td></tr>";
	}
	
	echo "</table>";
	echo "</div>";
}
}



?>











