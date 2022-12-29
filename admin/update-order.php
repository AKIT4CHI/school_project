<?php include('../config/constants.php') ?>
<link rel="stylesheet"  href="../css/input.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/
font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Setup Game - Admin page</title>

	
</head>
<body>
	<!-- Menu Section Starts -->
	<?php require_once 'partials/menu1.php'  ?>

		<?php
			$user_id = $_SESSION['user_id'];
			$id = $_GET['id'];

			$sql = "SELECT * FROM tbl_order WHERE id=$id";
			$res = mysqli_query($conn, $sql);
			$count = mysqli_num_rows($res);

			if ($count > 0) {
				$row = mysqli_fetch_assoc($res);
				$customer_name = $row['customer_name'];
				$title = $row['food'];
				$total = $row['total'];
				$status = $row['status'];

			}
			else{

			}



		 ?>
	<div class="wrapper1">
	
	<h2>Update Order Status</h2>
	<form action="" method="POST" enctype="multipart/form-data">
		<!--information de compte-->
		<h4>Customer Name</h4>
		<div class="input_group">

			<div class="input_box">
				
				<input type="text" placeholder="Category Title" required class="name" name="title" value="<?php echo $customer_name ?>" disabled>
				<i class="fa fa-user icon"></i>
			</div>
			
		</div>
		<h4>Total</h4>
		<div class="input_group">

			<div class="input_box">
				
				<input type="text" placeholder="Category Title" required class="name" name="title" value="<?php echo $total ?> DH" disabled>
				<i class="fa fa-user icon"></i>
			</div>
			
		</div>
		<h4>Order Status</h4>
		<div class="input_group">

			<div class="input_box">
				
				<select name="status">
							<option <?php if ($status=="Ordered") {echo "selected";} ?> value="Ordered">Ordered</option>
							<option <?php if ($status=="On delivery") {echo "selected";} ?> value="On delivery">On delivery</option>
							<option <?php if ($status=="Delivered") {echo "selected";} ?> value="Delivered">Delivered</option>
							<option <?php if ($status=="Cancelled") {echo "selected";} ?> value="Cancelled">Cancelled</option>
						</select>
			</div>
			
		</div>
		
		
		
		
		
		

		<!--Informations de compte-->

		<!--Gender start-->

		
		
		

		<!--Gender end-->

		<!--Payment details start-->

			
			
			<div class="input_group">
				<div class="input_box">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="submit" name="submit" value="Update Order" class="button">
				</div>
			</div>
		<!--Paymenet detail fin-->



	</form>

</div>

		<?php
			if (isset($_POST['submit'])) {
				$id = $_POST['id'];
				$status = $_POST['status'];

				$sql2 = "UPDATE tbl_order SET
				status = '$status'
				WHERE id=$id
				";

				$res2 = mysqli_query($conn, $sql2);

				$sql3 = "INSERT into tbl_actions set
				admin_id = $user_id,
				action = 'updated order status for $customer_name to $status'
				";
				$res3 = mysqli_query($conn, $sql3);

				if ($res2==TRUE) {
					$_SESSION['update-order'] = '<script>alert("Order Status Updated !")</script>';
					header('location:'.SITEURL."admin/manage-order.php");
				}
				else{
					$_SESSION['update-order'] = '<script>alert("Failed to Update Order Status !")</script>';
					header('location:'.SITEURL."admin/manage-order.php");
				}
				
			}
		 ?>
	</div>
</div>












