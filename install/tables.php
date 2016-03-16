<?php

class Table
{
	function __construct()
	{
		$this->createDatabase();
		$database=$GLOBALS['database'];
		$connect=$GLOBALS['connect'];
		mysqli_select_db($connect,$database);
		$this->createCategoryTable();
		$this->createItemsTable();
		$this->createUserTable();
		$this->createOrderTable();
		$this->createTransactionTable();
		
	}
	function createDatabase()
	{
		$database=$GLOBALS['database'];
		$connect=$GLOBALS['connect'];
		$create="create DATABASE $database";
		$retval=mysqli_query($connect,$create);
		if(!$retval)
			die('Database Creation Error'.mysqli_error($connect));
	}
	function createCategoryTable()
	{
		
		$query="create table category(".
		"category_name varchar(225) NOT NULL,".
		"category_id varchar(225),".
		"primary key(category_id),".
		"category_description varchar(1000));";
		$connect=$GLOBALS['connect'];
		$retval=mysqli_query($connect,$query);
		if(!$retval)
			die('Category Table Creation Error-'.mysqli_error($connect));
		//insertion of catgories
		$insert1="INSERT INTO category (`category_name`,`category_id`,`category_description`) VALUES('ELECTRONICS',1,'electronics like projectors etc');";
		$insert2="INSERT INTO category (`category_name`,`category_id`,`category_description`) VALUES('PAPER PRODUCTS',2,'paper products like books etc');";
		$insert3="INSERT INTO category (`category_name`,`category_id`,`category_description`) VALUES('WRITING INSTRUMENTS',3,'writing items like pens etc');";
		$ret_val1=mysqli_query($connect,$insert1);
		$ret_val2=mysqli_query($connect,$insert2);
		$ret_val3=mysqli_query($connect,$insert3);
		if(!$ret_val1 || !$ret_val2 || !$ret_val3)
			die('insertion failed at category table'.mysqli_error($connect));
	
	}
	function createItemsTable()
	{
		$query="create table items(".
		"category_id varchar(225),".
		"item_id varchar(225),".
		"item_name varchar(225) NOT NULL,".
		"item_description varchar(1000) NOT NULL,".
		"quantity INT(225),".
		"primary key(item_id),".
		"foreign key(category_id) REFERENCES category(category_id));";
		$connect=$GLOBALS['connect'];
		$retval=mysqli_query($connect,$query);
		if(!$retval)
			die('item Table Creation Error-'.mysqli_error($connect));
	}	
	
	
	function createUserTable()
	{
		$query="create table user_details(".
		"user_id varchar(225),".
		"first_name varchar(225) NOT NULL,".
		"last_name varchar(225) NOT NULL,".
		"email varchar(225) NOT NULL UNIQUE,".
		"address varchar(225) NOT NULL,".
		"password varchar(225) NOT NULL,".
		"primary_phone_number varchar(12) NOT NULL UNIQUE,".
		"secondary_phone_number varchar(12),".
		"user_type varchar(225) NOT NULL,".
		"primary key(user_id));";
		$connect=$GLOBALS['connect'];
		$retval=mysqli_query($connect,$query);
		if(!$retval)
			die('user Table Creation Error-'.mysqli_error($connect));
	}
	function createOrderTable()
	{
		$query="create table orders(".
		"order_id varchar(225),".
		"item_id varchar(225),".
		"noofitems int(10),".
		"user_id varchar(225),".
		"status varchar(225) NOT NULL,".
		"allocation_date DATETIME NOT NULL,".
		"return_date DATETIME NOT NULL,".
		"foreign key(item_id) REFERENCES items(item_id),".
		"foreign key(user_id) REFERENCES user_details(user_id),".
		"primary key(order_id));";
		$connect=$GLOBALS['connect'];
		$retval=mysqli_query($connect,$query);
		if(!$retval)
			die('Order Table Creation Error-'.mysqli_error($connect));
	}
	function createTransactionTable()
	{
		$query="create table transaction_details(".
		"user_id varchar(225),".
		"order_id varchar(225),".
		"transaction_id varchar(225),".
		"transaction_no INT(225),".
		"allocation_date DATETIME NOT NULL,".
		"return_date DATETIME NOT NULL,".
		"status varchar(225),".
		"foreign key(user_id) REFERENCES user_details(user_id),".
		"foreign key(order_id) REFERENCES orders(order_id),".
		"primary key(transaction_id));";
			
		$connect=$GLOBALS['connect'];
		$retval=mysqli_query($connect,$query);
		if(!$retval)
			die('Transaction Table Creation Error-'.mysqli_error($connect));
	}
}
	
?>	
