<?php
session_start();
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
	$user_type=$_SESSION['user_type'];
	 if($user_type=$_SESSION['user_type']=="admin"){
		echo "<script>window.open('admin.php','_self')</script>";
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

<!Doctype html>
<html>
<head>
<title>stock manager</title>
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
<body style="background:url('images/office17.jpg')">
<nav class="top-nav #90caf9 blue lighten-3 " id="top1">
    <div class="nav-wrapper">
      <a href="index.html" class="brand-logo"> 
  <img src="images/images11.jpg" alt="no-display" style="border-radius:100px" width=10%>
  MANAGERPAGE</a>

      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="#!" onclick="loadWrite()" id="profile">MYPROFILE</a></li>
        
		<li> <a onclick="logout()" href="logout.php" id="logout">LOG OUT</a></li>
      </ul>
    </div>
  </nav>
  <h3> upload items</h3>
  
  <div class="row">
  <div class="col s6">
 <form method="POST" name="itemupload" action="#!" enctype="multipart/form-data">
    <div class="file-field input-field">
      <div class="btn blue">
        <span>File</span>
        <input type="file" name="file">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div><span>
	 <button class="btn waves-effect waves-#424242 blue" type="submit" name="upload">UPLOAD
  <i class="material-icons right">send</i></button>
  <p>NOTE:upload only .CSV files</p>
  </form>
  </div>
  <div class="col s6" id="contentdisplay">
  <!--user profile-->
  </div>
 
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
 
 <!--allocation -->
 <form name="allocation" method="POST" action="#!">
 <div class="row">
  <h3>ALLOCATION/DE ALLOCATION</h3>
   <div class="input-field col s3">
	 <i class="material-icons prefix">account_circle</i>
       <input name="user_name" type="text" class="validate"/>
        <label for="username">USER NAME</label>
   </div>
   <div class="input-field col s3">
  <select class="browser-default" name="al_item">
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
  </div>
  <div class="col s3">
   NUMBER OF ITEMS:
  <p class="range-field">
      <input type="range" id="range" name="range" min="0" max="100" />
    </p>
  </div>
  <div class="col s3">
  <button class="btn waves-effect waves-#424242 blue" type="submit" name="allocate">allocate
  <i class="material-icons right">send</i></button>
  
  </div><br>
  
   <div class="col s3">
  <button class="btn waves-effect waves-#424242 blue" type="submit" name="deallocate">deallocate
  <i class="material-icons right">send</i></button>
  
  </div>
  </div>
  </form>
  
  
  
 
 
  
  
 
  
  
  
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
        alert('Logged in: ' + event.newValue);
		window.location.reload();
    }
}
window.addEventListener('storage', storageChange, false);
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

//items uploading script	
	
   if(isset($_POST['upload'])){
	
	
	$check="select * from items";
	$ret_val=mysqli_query($connect,$check);
	if (!$ret_val) {
     die(mysqli_error($connect)); 
   }
   $file = $_FILES['file']['tmp_name'];
   if($file==""){
	   echo "<script> alert('no file selected')</script>";
       echo "<script> window.open('stockmanager.php')</script>";
   }
   else{
		$handle = fopen($file, "r");
		$c = 0;
	
	if(mysqli_num_rows($ret_val)==0){
	
	while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
		{
			$category_id = $filesop[0];
			$item_id = $filesop[1];
			$item_name=$filesop[2];
			$item_description=$filesop[3];
			$quantity=$filesop[4];
			$sql = mysqli_query($connect,"INSERT INTO items (category_id, item_id,item_name,item_description,quantity) VALUES ".
			"('$category_id','$item_id','$item_name','$item_description',$quantity)");
			$c = $c + 1;
		}
		
			if(!$sql){
				die(mysqli_error($connect));
		
			}else{
				echo "Your database has imported successfully. You have inserted ". $c ." recoreds";
				
			}
	}
	else{
		while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
		{
			$category_id = $filesop[0];
			$item_id = $filesop[1];
			$item_name=$filesop[2];
			$item_description=$filesop[3];
			$quantity=$filesop[4];
			$sql="UPDATE items SET `quantity`=(`quantity`+$quantity) WHERE `item_id`='$item_id'";
			$ret_val=mysqli_query($connect,$sql);
			$c = $c + 1;
		}
		 if($ret_val){
				echo "You database has imported successfully. You have inserted ". $c ." recoreds";
			}else{
				echo "Sorry! There is some problem.";
			}
		
		
	}
   }
	
}

//availability checking script

if(isset($_POST['avail'])){
	$item_name=$_POST['item'];
	
	$sql="SELECT `quantity` FROM items WHERE `item_name`='$item_name'";
	$ret_val=mysqli_query($connect,$sql);
	if(!$ret_val)
		die(mysqli_error($connect));
	$result=mysqli_fetch_assoc($ret_val);
	
	

echo "<script>document.getElementById('availability').innerHTML = '".$item_name.$result['quantity']."'</script>";


}


//allocation script


if(isset($_POST['allocate'])){
	
	$user_id=$_POST['user_name'];
	$item_name=$_POST['al_item'];
	$result=mysqli_query($connect,"SELECT * FROM items WHERE `item_name`='$item_name'");
	$quantity=$_POST['range'];
	$items=mysqli_fetch_assoc($result);
	$item_id=$items['item_id'];
	
	//availability check
	if($quantity > $items['quantity'])
	{
		echo "not enough items to allocate";
		
	}
 
 else{
 //checking for is there any orders or not
   $sql="SELECT * from orders";
   $result=mysqli_query($connect,$sql);
   if(!$result)
	   die(mysqli_error($connect)); 
   if(mysqli_num_rows($result)==0){
	   $order_id=1;
   }
   else{
	  $result=mysqli_query($connect,"SELECT COUNT(*) FROM orders");
	  if(!$result)
	 die(mysqli_error($result));
    $order=mysqli_fetch_assoc($result);
     $order_id=$order['COUNT(*)']+1;
     }
	  date_default_timezone_set('Asia/Calcutta');
	$allocation_date=date('Y-m-d H:i:s');
	$return_date='0000-00-00 00:00:00';
	
 //checking this user take any items before and not given
 
   $check="SELECT * FROM orders WHERE `user_id`='$user_id' && `item_id`='$item_id'";
   
   $result=mysqli_query($connect,$check);
   
   if(!$result)
	die(mysqli_error($connect));
  
	$order=mysqli_fetch_assoc($result);
    $status=$order['status'];
	
	//checking category type
	$category="select * from items where `item_id`='$item_id'";
	$ret_val=mysqli_query($connect,$category);
	
	$items=mysqli_fetch_assoc($ret_val);
	$category_id=$items['category_id'];
  //no previous allocation (or) already returned so allocate new items 
  // and also decrement items number
  if ((mysqli_num_rows($result)==0)){
	  if(($category_id==2) || ($category_id==3))
	$status="nonreturnable";
	else 
   $status="allocated";
	  //decrement items
	$dec="UPDATE items SET `quantity`=(`quantity`-$quantity) WHERE `item_id`='$item_id'"; 
	
	$ret_val=mysqli_query($connect,$dec);
	if(!$ret_val)
		die(mysqli_error($connect));
	//insert new order
	$insert=mysqli_query($connect,"INSERT INTO orders (order_id, item_id,user_id,status,allocation_date,return_date,noofitems) VALUES ".
			"('$order_id','$item_id','$user_id','$status','$allocation_date','$return_date','$quantity')");
	if(!$insert)
		die(mysqli_error($connect));
	echo "sucees ful allocation";
	
	}  
	else if(($status=="nonreturnable") ){
		//decrement items
		$dec="UPDATE items SET `quantity`=(`quantity`-$quantity) WHERE `item_id`='$item_id'"; 
	
	$ret_val=mysqli_query($connect,$dec);
	if(!$ret_val)
		die(mysqli_error($connect));
	//update order
		$query="UPDATE orders SET `noofitems`=(`noofitems`+$quantity) WHERE `item_id`='$item_id' && `user_id`='$user_id'";
		$ret_val=mysqli_query($connect,$query);
		if(!ret_val)
			die(mysqli_error($connect));
		
		
		
	}
	
 else{
	 //decreasing items in items table
	 $dec="UPDATE items SET `quantity`=(`quantity`-$quantity) WHERE `item_id`='$item_id'"; 
	
	$ret_val=mysqli_query($connect,$dec);
	if(!$ret_val)
		die(mysqli_error($connect));
	
	 //already allocated but allocating some more returnable items
	 $update="UPDATE orders SET `noofitems`=(`noofitems`+$quantity) WHERE `item_id`='$item_id' && `user_id`='$user_id'";
	 $ret_val=mysqli_query($connect,$update);
	 if(!$ret_val)
		 die(mysqli_error($connect));
		
  	   
		  
	  }
	  
	  $ret_val=mysqli_query($connect,"SELECT COUNT(*) FROM transaction_details");
	  $result=mysqli_fetch_assoc($ret_val);
	  $transaction_id=$result['COUNT(*)'];
	  $transaction_id=$transaction_id+1;
	  
	  //insert transaction
	  $insert_transaction=mysqli_query($connect,"INSERT INTO transaction_details (user_id,transaction_id,status,allocation_date,return_date) VALUES ".
			"('$user_id','$transaction_id','$status','$allocation_date','$return_date')");
	if(!$insert_transaction)
		die(mysqli_error($connect));
	  echo"sucess ful transaction";
	  
   
 }
	
}




// De allocation script

if(isset($_POST['deallocate'])){
	
	$user_id=$_POST['user_name'];
	$item_name=$_POST['al_item'];
	$result=mysqli_query($connect,"SELECT * FROM items WHERE `item_name`='$item_name'");
	$items=mysqli_fetch_assoc($result);
	$item_id=$items['item_id'];
    $quantity=$_POST['range'];
	$result="SELECT * FROM orders where `user_id`='$user_id' && `item_id`='$item_id'";
	
	$query=mysqli_query($connect,$result);
	$orders=mysqli_fetch_assoc($query);
	$allocated=$orders['noofitems'];
	if(!$query)
		die(mysqli_error($connect));
	if ((mysqli_num_rows($query)==0) || $allocated == 0)
		echo $item_name ."is not allocated to".$user_id;
	
	else if($orders['status']=="nonreturnable")
		echo $item_name."is non returnable item";
	
	else if($quantity > $allocated)
		echo "can not de allocate morethan".$allocated;
	
	else{
		
	if($allocated == $quantity)
		$status="returned";
	else $status="allocated";
	
 $sql="UPDATE items SET `quantity`=(`quantity`+$quantity) WHERE `item_id`='$item_id'";
 $ret_val=mysqli_query($connect,$sql);
	if(!$ret_val)
		die(mysqli_error($connect));
	
	//update order for user_id for item_id
	date_default_timezone_set('Asia/Calcutta');
	$return_date=date('Y-m-d H:i:s');
	$sql="UPDATE orders SET `noofitems`=(`noofitems`-$quantity) ,`status`='$status',`return_date`='$return_date' WHERE `item_id`='$item_id' && `user_id`='$user_id'";
	
	$ret_val=mysqli_query($connect,$sql);
	if(!$ret_val)
		die(mysqli_error($connect));
	
	//insert transaction into transaction table
	$ret_val=mysqli_query($connect,"SELECT COUNT(*) FROM transaction_details");
	  $result=mysqli_fetch_assoc($ret_val);
	  $transaction_id=$result['COUNT(*)'];
	  $transaction_id=$transaction_id+1;
	$allocation_date='0000-00-00 00:00:00';
	 $insert_transaction=mysqli_query($connect,"INSERT INTO transaction_details (user_id,transaction_id,status,allocation_date,return_date) VALUES ".
			"('$user_id','$transaction_id','$status','$allocation_date','$return_date')");
	if(!$insert_transaction)
		die(mysqli_error($connect));
	  echo"sucess ful transaction";
	
	
	}
}





    

?>
	
	


