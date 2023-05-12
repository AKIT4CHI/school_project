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
			if (isset($_SESSION['add-category'])) {
				echo $_SESSION['add-category'];
				unset($_SESSION['add-category']);
			}

			if (isset($_SESSION['upload'])) {
				echo $_SESSION['upload'];
				unset($_SESSION['upload']);
			}
			if (isset($_SESSION['title-exist'])) {
				echo $_SESSION['title-exist'];
				unset($_SESSION['title-exist']);
			}

		 ?>

		<!-- add category form starts -->
		<div class="wrapper1">
	
	<h2>Add Category</h2>
	<form action="" method="POST" enctype="multipart/form-data">
		<!--information de compte-->
		
		<div class="input_group">
			<div class="input_box">
				<input type="text" placeholder="Category Title" required class="name" name="title">
				<i class="fa fa-desktop icon" aria-hidden="true"></i>
			</div>
			
		</div>
		<div class="input_group">
			<div class="input_box">
				<input type="file"  class="name" name="image" required>
				<i class="fa fa-file-image-o icon" aria-hidden="true"></i></i>
			</div>
		</div>
		
		
		
		

		<!--Informations de compte-->

		<!--Gender start-->

		<div class="input_group">
				<div class="input_box">
					<h4>Featured</h4>
					<input type="radio" name="featured" class="radio" id="bc1" value="Yes" checked>
					<label for="bc1"><span>
						<i class="fa fa-check" aria-hidden="true"></i>Yes</span></label>
						
						<input type="radio" name="featured" class="radio" id="bc2" value="No">
					<label for="bc2"><span>
						<i class="fa fa-times" aria-hidden="true"></i>No</span></label> 
				</div>
			</div>
			<div class="input_group">
				<div class="input_box">
					<h4>Active</h4>
					<input type="radio" name="active" class="radio" id="bc3" value="Yes" checked>
					<label for="bc3"><span>
						<i class="fa fa-check" aria-hidden="true"></i>Yes</span></label>
						
						<input type="radio" name="active" class="radio" id="bc4" value="No">
					<label for="bc4"><span>
						<i class="fa fa-times" aria-hidden="true"></i>No</span></label> 
				</div>
			</div>
		
		

		<!--Gender end-->

		<!--Payment details start-->

			
			
			<div class="input_group">
				<div class="input_box">
					<input type="submit" name="submit" value="Add Category" class="button">
				</div>
			</div>
		<!--Paymenet detail fin-->



	</form>

</div>


		<!-- add category form ends -->

		<?php 
			//check whether the submit is clicked or not
		if (isset($_POST['submit'])) {
			
			$title = $_POST['title'];
			

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
					$image_name = "Product_category_".rand(000, 999).'.'.$ext;// e.g "Food_category_153.jpg"

					$source_path = $_FILES['image']['tmp_name'];

					$destination_path = "../images/category/".$image_name;

					//Finally upload the image
					$upload = move_uploaded_file($source_path, $destination_path);

					//check whether the image is uploaded or not
					//And if the image is not uploaded then we will stop the process and redirect with error message
					if ($upload==false) {
						//Set Message
						$_SESSION['upload'] = "<div class = 'error'>Failed to upload Image.";
						//redirect to add category page
						header('location'.SITEURL."admin/add-category.php");
						//stop the process
						die();
					}
				}

				
			}
			else{
				//don't upload the image and set the image_value as blank
				$image_name = "";
			}

			$query = mysqli_query($conn, "SELECT * FROM tbl_category WHERE title = '$title'");
			if (mysqli_num_rows($query)>0) {
				
				echo '<script>alert("Sorry this title already exists")</script>';
			}
			else{
				$sql = "INSERT INTO tbl_category SET
				title = '$title',
				image_name = '$image_name',
				featured = '$featured',
				active = '$active'
				";
				$res = mysqli_query($conn, $sql);

				$sql1 = "INSERT into tbl_actions set
				user_id = $user_id,
				action = 'added category $title'
				";
				$res1 = mysqli_query($conn, $sql1);
				

			if ($res==TRUE) {

				$_SESSION['add-category'] = "<div class = 'success'> category added successfully</div>";
				header('location:'.SITEURL."admin/manage-category.php");
			}
			else{

				$_SESSION['add-category'] = "<div class = 'error'> Failed to add category</div>";
				header('location:'.SITEURL."admin/manage-category.php");

			}

			}

			

			
		}
		?>

