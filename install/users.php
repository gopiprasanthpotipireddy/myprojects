<?php
$admin_user='gopi';
$admin_password='';
class Users
{
	function __construct()
	{
		$admin_user=$GLOBALS['admin_user'];
		$admin_password=$GLOBALS['admin_password'];
		$this->create_admin($admin_user,$admin_password);
		$this->create_guest('guest','');
		echo "stockregister database created successfully";
	}
	function create_admin($username,$password)
	{
		$server=$GLOBALS['server'];
		$database=$GLOBALS['database'];
		$connect=$GLOBALS['connect'];
		$create="CREATE USER '$username'@'$server' IDENTIFIED BY '$password'";
		$retval=mysqli_query($connect,$create);
		if(!$retval)
			die('User Account Error'.mysqli_error($connect));
		$permissions="GRANT ALL PRIVILEGES ON stockregister . * TO '$username'@'$server'";
		$retval=mysqli_query($connect,$permissions);
		if(!$retval)
			die('User Account Privileges Error');
		$final="FLUSH PRIVILEGES;";
		$retval=mysqli_query($connect,$final);
		if(!$retval)
			die('User Account Finishing Error');
	}
	function create_guest($username,$password)
	{
		$server=$GLOBALS['server'];
		$database=$GLOBALS['database'];
		$connect=$GLOBALS['connect'];
		$create="CREATE USER '$username'@'$server' IDENTIFIED BY '$password'";
		$retval=mysqli_query($connect,$create);
		if(!$retval)
			die('User Account Error');
		$read_table=array('category','items','user_details');
		foreach($read_table as $table)
		{
			$permissions="GRANT SELECT ON $database.$table TO '$username'@'$server'";
			$retval=mysqli_query($connect,$permissions);
			if(!$retval)
				die('Guest Account Read Privileges Error');
		}
		/*$permissions="GRANT INSERT ON $database.user_details TO '$username'@'$server'";
		$retval=mysqli_query($connect,$permissions);
		if(!$retval)
			die('Guest Account Read Privileges Error');
		*/
		$final="FLUSH PRIVILEGES;";
		$retval=mysqli_query($connect,$final);
		if(!$retval)
			die('User Account Finishing Error');
	}
}
?>	
