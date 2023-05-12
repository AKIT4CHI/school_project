<?php include ('../config/constants.php'); 
	  include('login-check.php');
	  

	  
	  if (isset($_SESSION['login'])) {
			echo $_SESSION['login'];
			unset($_SESSION['login']);
		}

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
	<?php
	$user_id = $_SESSION['user_id'];
		$sql = "SELECT COUNT(checked) as 'Check' FROM tbl_message WHERE checked='No' and user_id = $user_id";
		$res = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($res);
		$check = $row['Check'];
	 ?>
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
				<li><a href="clients.php">Clients</a></li>
				<li><a href="Messages.php">Messages <?php if ($check > 0) {
					echo "(!)";
				}  ?></a></li>
				<li><a href="logout.php">Logout</a></li>

			</ul>
		</div>
		
	</div>
	<!-- Menu Section ends -->