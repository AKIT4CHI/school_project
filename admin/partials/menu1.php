<?php include('login-check.php'); ?>

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



