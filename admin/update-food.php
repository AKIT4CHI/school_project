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
			$id = $_GET['id'];
			$user_id = $_SESSION['user_id'];


			$sql = "SELECT * FROM tbl_food WHERE id = '$id'";
			
			$res = mysqli_query($conn, $sql);

			if ($res==TRUE) {
				
				$count = mysqli_num_rows($res);

				if ($count==1) {
					
					$row = mysqli_fetch_assoc($res);

					$Stitle = $row['Stitle'];
					$title = $row['title'];
					$description = $row['description'];
					$price = $row['price'];
					$current_image = $row['image_name'];
					$featured = $row['featured'];
					$active = $row['active'];
				}
				else{
					header('location:'.SITEURL."admin/manage-food.php");
				}
			}


		 ?>


		<div class="wrapper1">
	
	<h2>Update Product</h2>
	<form action="" method="POST" enctype="multipart/form-data">
		<!--information de compte-->
		
		<div class="input_group">
			<div class="input_box">
				<input type="text" placeholder="Product Title" required class="name" name="title" value="<?php echo $title; ?>">
				<i class="fa fa-desktop icon" aria-hidden="true"></i>
			</div>
			
		</div>
		<div class="input_group">
			<div class="input_box">
				<input type="text" placeholder="Product Brand" required class="name" name="Stitle" value="<?php echo $Stitle; ?>">
				<i class="fa fa-desktop icon" aria-hidden="true"></i>
			</div>
			
		</div>
		<div class="input_group">
			<div class="input_box">
				<textarea required class="name" name="description" placeholder="description" cols="30" rows="5"><?php echo $description; ?></textarea>
				<i class="fa fa-user icon"></i>
			</div>
		</div>
			<div class="input_group">

			<div class="input_box">
				<h4>Current Image:</h4>
				<?php 
							if ($current_image != "") {
								
								?><img src="<?php echo SITEURL; ?>images/food/<?php echo $current_image; ?>" width = "100px"><?php

							}
							else{
								echo "<div class = 'error'>Image is not available.</div>";
							}
						?>
			</div>
		</div>
			
		
		<div class="input_group">
			<div class="input_box">
				<input type="file"  class="name" name="image" >
				<i class="fa fa-file-image-o icon" aria-hidden="true"></i>
			</div>
		</div>
		<input type="hidden" name="image" value="<?php echo $current_image ?>" checked>
		<div class="input_group">
			<div class="input_box">
				<input type="number" placeholder="Price" required class="name" name="price" value="<?php echo $price; ?>">
				<i class="fa fa-money icon" aria-hidden="true"></i>
			</div>
			
		</div>

		<div class="input_group">
			<div class="input_box">
				<h4>Category</h4>
				<select name="category" required>
							<?php 
								//Create php code to display category from database
								//1. Create SQL to get active category
								$sql = "SELECT * FROM tbl_category WHERE active = 'Yes'";
								$res = mysqli_query($conn, $sql);

								$count = mysqli_num_rows($res);
								$sn=1;

								if ($count > 0) {
									// We have category
									while ($row1 = mysqli_fetch_assoc($res)) {
										//Get the details
										$id1 = $row1['id'];
										$title1 = $row1['title'];
										?>
										<option value="<?php echo $id1; ?>"><?php echo $title1; ?></option>
										<?php 
									}
								}
								else{
									// we don't have category
									?>
									<option value="0">No category Found</option>
									<?php 
								}

								//2. Display on dropdown

							 ?>
							
						</select>
			</div>
			
		</div>

		
		
		
		

		<!--Informations de compte-->

		<!--Gender start-->

		<div class="input_group">
				<div class="input_box">
					<h4>Featured</h4>
					<input type="radio" name="featured" class="radio" id="bc1" value="Yes" <?php if ($featured=="Yes") {
							
						?> checked <?php } ?>>
					<label for="bc1"><span>
						<i class="fa fa-check" aria-hidden="true"></i>Yes</span></label>
						
						<input type="radio" name="featured" class="radio" id="bc2" value="No" <?php if ($featured=="No") {
							
						?> checked <?php } ?>>
					<label for="bc2"><span>
						<i class="fa fa-times" aria-hidden="true"></i>No</span></label> 
				</div>
			</div>
			<div class="input_group">
				<div class="input_box">
					<h4>Active</h4>
					<input type="radio" name="active" class="radio" id="bc3" value="Yes" <?php if ($active=="Yes") {
							
						?> checked <?php } ?>>
					<label for="bc3"><span>
						<i class="fa fa-check" aria-hidden="true"></i>Yes</span></label>
						
						<input type="radio" name="active" class="radio" id="bc4" value="No" <?php if ($active=="No") {
							
						?> checked <?php } ?>>
					<label for="bc4"><span>
						<i class="fa fa-times" aria-hidden="true"></i>No</span></label> 
				</div>
			</div>
		
		

		<!--Gender end-->

		<!--Payment details start-->

			
			
			<div class="input_group">
				<div class="input_box">
					<input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="submit" name="submit" value="Update Product" class="button">
				</div>
			</div>
		<!--Paymenet detail fin-->



	</form>

</div>

		<?php
			if (isset($_POST['submit'])) {

			
			$title1 = $_POST['title'];
			$description = $_POST['description'];
			$price = $_POST['price'];
			$category = $_POST['category'];
			$Stitle = $_POST['Stitle'];
			

			//For radio if checked or not, we need to check whether the button is selected or not
			if (isset($_POST['featured'])) {
				
				$featured = $_POST['featured'];
			}
			else{
				$featured = "No";
			}
			if (isset($_POST['active'])) {
				
				$active = $_POST['active'];
			}
			else{
				$active = "No";
			}
			

			//check whether the image is selected or not and set the value for image name accordinaly


			//print_r($_FILES['image']);

			//die();

			if (isset($_FILES['image']['name'])) {

				//upload the image
				//To upload the image we need source path and destination path
				$image_name = $_FILES['image']['name'];

				if ($image_name !="") {
					//Auto Rename our image
					//Get the extension of our image
					$image_info = explode (".", $image_name);
					$ext = end ($image_info);

					//Rename the image
					$image_name = "Food_Name_".rand(0000, 9999).".".$ext;// e.g "Food_category_153.jpg"

					$source_path = $_FILES['image']['tmp_name'];

					$destination_path = "../images/food/".$image_name;

					//Finally upload the image
					$upload = move_uploaded_file($source_path, $destination_path);

					//check whether the image is uploaded or not
					//And if the image is not uploaded then we will stop the process and redirect with error message
					if ($upload==false) {
						//Set Message
						$_SESSION['upload'] = "<div class = 'error'>Failed to upload Image.";
						//redirect to add food page
						header('location'.SITEURL."admin/update-food.php");
						//stop the process
						die();
					}
				}

				
			}
			else{
				//don't upload the image and set the image_value as blank
				$image_name = "";
			}
			if (isset($_POST['image'])) {
				
				$image_name = $current_image;
			}

			$query = mysqli_query($conn, "SELECT * FROM tbl_food WHERE title = '$title1'");
			if (mysqli_num_rows($query)>0 && ($title1!=$title)) {
				
				echo '<script>alert("Sorry this title already exists")</script>';
			}
			else{

				
				$sql2 = "UPDATE tbl_food SET
				title = '$title1',
				Stitle = '$Stitle',
				price  = $price,
				image_name = '$image_name',
				description = '$description',
				featured = '$featured',
				active = '$active',
				category_id = '$category'
				WHERE id = $id";

				$res2 = mysqli_query($conn, $sql2);	

				$sql3 = "INSERT into tbl_actions set
				admin_id = $user_id,
				action = 'updated product $title'
				";
				$res3 = mysqli_query($conn, $sql3);

				if ($res2==TRUE) {

					$_SESSION['update-food'] = "<div class = 'success'> Product updated successfully</div>";
					?>
				<script type="text/javascript">
					window.location.href='http://localhost/food-order/admin/manage-food.php';

				</script>

				<?php
				}
				else{

					$_SESSION['update-food'] = "<div class = 'error'> Failed to update Product</div>";
					?>
				<script type="text/javascript">
					window.location.href='http://localhost/food-order/admin/manage-food.php';

				</script>

				<?php

				}

			}

			

			
		}
		
		 ?>
	</div>
</div>