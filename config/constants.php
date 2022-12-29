<?php 

	//Start Session

	session_start();



	//Create Constants store non repeating values
	define('SITEURL', 'http://localhost/food-order/');
	define('LOCALHOST', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'food-order');
	
	//3. Execute Query and Save data in database
		$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database connection
		$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //Selecting database
?>