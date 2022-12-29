<?php
	//Auhorization -  Access control
	//check whether the user is logged in or not
	if (!isset($_SESSION['user'])) { //if user is not set
		//user is not logged in
		//redirect to login page message
		$_SESSION['no-login-message'] = "<div class = 'error text-center'>Please login to access to admin panel.</div><br><br>";
		//redirect to login page
		header('location:'.SITEURL."admin/login.php");


		
	}
 ?>