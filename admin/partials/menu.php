<?php include ('../config/constants.php'); 
	  include('login-check.php');
	  error_reporting(0);
	  ini_set('display_errors', 0);

?>




<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Setup Game - Admin page</title>
	<link rel="stylesheet" href="../css/admin.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
</head>
<body>
	<!-- Menu Section Starts -->
	<div class="menu text-center">
		<div class="wrapper">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="manage-admin.php">Profile </a></li>
				<li><a href="manage-category.php">Category</a></li>
				<li><a href="manage-food.php">Products</a></li>
				<li><a href="manage-stock.php">Stock</a></li>
				<li><a href="manage-order.php">Order</a></li>
				<li><a href="logout.php">Logout</a></li>

			</ul>
		</div>
		
	</div>
	<!-- Menu Section ends -->