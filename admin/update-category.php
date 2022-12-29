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

			if (isset($_SESSION['title-update-exist-1'])) {
				echo $_SESSION['title-update-exist-1'];
				unset($_SESSION['title-update-exist-1']);
			}

			?>
			<?php
			//1.get id
			$id = $_GET['id'];

			$sql = "SELECT * FROM tbl_category WHERE id = '$id'";

			$res = mysqli_query($conn, $sql);



			if ($res==TRUE) {

				$count = mysqli_num_rows($res);

				if ($count==1) {
					//Get the Details
					$row = mysqli_fetch_assoc($res);

					$title = $row['title'];
					$current_image = $row['image_name'];
					$featured = $row['featured'];
					$active = $row['active'];
				}
				else{
					header('location:'.SITEURL."admin/manage-category.php");
				}
				
			}
		 ?>

	<div class="wrapper1">
	
	<h2>Add Category</h2>
	<form action="" method="POST" enctype="multipart/form-data">
		<!--information de compte-->
		
		<div class="input_group">
			<div class="input_box">
				<input type="text" placeholder="Category Title" required class="name" name="title" value="<?php echo $title ?>">
				<i class="fa fa-user icon"></i>
			</div>
			
		</div>
		<div class="input_group">

			<div class="input_box">
				<h4>Current Image:</h4>
				<?php 
							if ($current_image != "") {
								
								?><img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width = "100px"><?php

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
				<i class="fa fa-file-image-o icon" aria-hidden="true"></i></i>

			</div>

		</div>
		<input type="hidden" name="image" value="<?php echo $current_image ?>" checked>
		
		
		
		

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
							
						?> checked  <?php } ?>>
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
					<input type="submit" name="submit" value="Update Category" class="button">
				</div>
			</div>
		<!--Paymenet detail fin-->



	</form>

</div>


<?php
	if (isset($_POST['submit'])) {
			
			$id = $_POST['id'];
			$title1 = $_POST['title'];
			
			

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

				if ($image_name != "") {
					//Auto Rename our image
					//Get the extension of our image
					$ext = end(explode('.', $image_name));

					//Rename the image
					$image_name = "Food_category_".rand(000, 999).'.'.$ext;// e.g "Food_category_153.jpg"

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

			if (isset($_POST['image']) && $image_name == "") {
				
				$image_name = $current_image;
			}
			

			$query = mysqli_query($conn, "SELECT * FROM tbl_category WHERE title = '$title1'");
			if (mysqli_num_rows($query)>0 && ($title1!=$title) ) {
				
				echo '<script>alert("Sorry this title already exists")</script>';
			}
			else{
				$sql1 = "UPDATE tbl_category SET
				title = '$title1',
				image_name = '$image_name',
				featured = '$featured',
				active = '$active'
				WHERE id = $id
			";

			$sql2 = "INSERT into tbl_actions set
				admin_id = $user_id,
				action = 'updated category $title'
				";
				$res2 = mysqli_query($conn, $sql2);

			$res1 = mysqli_query($conn, $sql1);

			if ($res1==TRUE) {

				$_SESSION['add-category'] = "<div class = 'success'> category updated successfully</div>";
				header('location:'.SITEURL."admin/manage-category.php");
			}
			else{

				$_SESSION['add-category'] = "<div class = 'error'> Failed to update category</div>";
				header('location:'.SITEURL."admin/manage-category.php");

			}
		}
			}


			

			
 ?>
















