<?php include('../config/constants.php'); ?>
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
				
		$id = $_GET['id'];
		$user_id = $_SESSION['user_id'];

		if (isset($_SESSION['login'])) {
			echo $_SESSION['login'];
			unset($_SESSION['login']);
		}

			$sql = "SELECT * FROM tbl_product WHERE id=$id";
			$res = mysqli_query($conn, $sql);
			$count = mysqli_num_rows($res);

			if ($count==1) {
				$row = mysqli_fetch_assoc($res);
				
				
				$image_name = $row['image_name'];
				$stock = $row['stock'];
				$moneySpent = $row['Money_spent'];

				$sql1 = "SELECT SUBSTRING_INDEX(title,' ', 6) as DesiredWord from tbl_product WHERE id=$id";
				$res1 = mysqli_query($conn,$sql1);
				$row1 = mysqli_fetch_assoc($res1);
				$title = $row1['DesiredWord'];
				

			}
			else{

			}
				

			?>

		<div class="wrapper1">
	
	<h2>Add Stock</h2>
	<form action="" method="POST" enctype="multipart/form-data">
		<!--information de compte-->
		
		<div class="input_group">
			<div class="input_box">
				<h4>Product</h4>
				<div class="input_group">

			<div class="input_box">
				
				<input type="text" placeholder="Product Title" required class="name" name="title" value="<?php echo $title ?>" disabled>
				<i class="fa fa-user icon"></i>
			</div>
			
		</div>
						

			</div>

			
		</div>

		<div class="input_group">
			<div class="input_box">
				<h4>Image</h4>
				<div class="input_group">

			<div class="input_box">
				
				<?php 
							if ($image_name != "") {
								
								?><img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width = "100px"><?php

							}
							else{
								echo "<div class = 'error'>Image is not available.</div>";
							}
						?>
			</div>
			
		</div>
						

			</div>

			
		</div>
		

		<div class="input_group">
			<div class="input_box">
				<input type="number" placeholder="Stock Amount" required class="name" name="stock1">
				<i class="fa fa-envelope icon"></i>
			</div>
		</div>
		<div class="input_group">
			<div class="input_box">
				<input type="number" placeholder="Stock Price" required class="name" name="price">
				<i class="fa fa-envelope icon"></i>
			</div>
		</div>

		
		
		
		

		<!--Gender end-->

		<!--Payment details start-->

			
			
			<div class="input_group">
				<div class="input_box">
					<input type="submit" name="submit" value="Add Stock" class="button">
				</div>
			</div>
		<!--Paymenet detail fin-->



	</form>

</div>

<?php

if (isset($_POST['submit'])) {
	$stock1 = $_POST['stock1'];
	$stock_date = date("Y-m-d h:i:sa");
	$stock += $stock1;
	$stock_price = $_POST['price'];
	$moneySpent += $stock_price;
	
	

	$sql2 = "INSERT INTO tbl_stock SET
	product_id = $id,
	stock_date = '$stock_date',
	stock = $stock1,
	stock_price = $stock_price

	";



	$res2 = mysqli_query($conn,$sql2);

	$sql3 = "UPDATE tbl_product set Money_spent = $moneySpent,
	stock = $stock
	 where id = $id";
	$res3 = mysqli_query($conn,$sql3);

	$sql5 = "INSERT into tbl_revenue set product_id = $id,
	Money_spent = $stock_price
	";
	$res5 = mysqli_query($conn, $sql5);

	

	$sql4 = "INSERT into tbl_actions set
				user_id = $user_id,
				action = 'added stock of $stock1 to $title'
				";
				$res4 = mysqli_query($conn, $sql4);



	if ($res3==true) {
	$_SESSION['add-stock'] = '<script>alert("Stock Added Successfully !")</script>';
	header('location:'.SITEURL."admin/manage-food.php");
}
else{
	$_SESSION['add-stock'] = '<script>alert("Failed To add Stock !")</script>';
	header('location:'.SITEURL."admin/manage-food.php");
}
}


	


	




?>


