<?php
session_start();
$connect=mysqli_connect("localhost","gopi","","stockregister");
  
if(isset($_POST['login']))  {
	
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
	echo "<script>";
	echo "alert('logout from current session')";
	echo "</script>";
	
	$user_type=$_SESSION['user_type'];
	 if($user_type=$_SESSION['user_type']=="admin"){
		echo "<script>window.open('admin.php','_self')</script>";
	}
	else if($user_type=$_SESSION['user_type']=="user"){
		echo "<script>window.open('user.php','_self')</script>";
	}
	else{
		echo "<script>window.open('stockmanager.php','_self')</script>";
	}
	
}

	
else {	
	
	
    $user_id=$_POST['user_id'];  
    $password=$_POST['password']; 
 
    $check_user="select * from user_details WHERE user_id='$user_id' AND password='$password'";  
  
    $ret_val=mysqli_query($connect,$check_user);  
    
	if (!$ret_val) {
     die(mysqli_error($connect)); 
   }
   
   else{
    if(mysqli_num_rows($ret_val)>=1)  {//user or updater or userupdater
      echo "<script>";
	  echo "localStorage.setItem('log_in','true')";
	  echo "</script>";
	  $user=mysqli_fetch_assoc($ret_val);
	  
	  if($user['user_type']=="user"){//user
		  $_SESSION['user_id']=$user_id;
		  $_SESSION['user_type']="user";
      echo "<script>window.open('user.php','_self')</script>";  
	  }
	  
	  else {
         /*if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
		 echo "<script>";
		 echo "alert('first logout from current session')";
		 echo "</script>";
        */		 
		 
		  $_SESSION['user_id']=$user_id;
		  $_SESSION['user_type']="updater";
       echo "<script>window.open('stockmanager.php','_self')</script>";  
        
		}

	  }		
	
	else if($user_id=="gopiprasanth" && $password=="hero zero"){//admin page
		   $_SESSION['user_id']=$user_id;
		   $_SESSION['user_type']="admin";
		  echo "<script>window.open('admin.php','_self')</script>";  
	}
	
	else  
    {  
      echo "<script>alert('userid or password is incorrect!')</script>"; 
      echo "<script>window.open('index.html','_self')</script>";	  
    }  
   
   }
   }
}
 

?>  
