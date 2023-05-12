<?php
	//Auhorization -  Access control
	//check whether the user is logged in or not
	if (!isset($_SESSION['client'])) { //if user is not set
		//user is not logged in
		//redirect to login page message
		$_SESSION['no-login-message'] = "<div class = 'error text-center'>Please login to add Products to cart.</div><br><br>";
		//redirect to login page
		header('location:'.SITEURL."");


		
	}
 ?>