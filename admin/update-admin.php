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

			if (isset($_SESSION['user-update-exist'])) {
					echo $_SESSION['user-update-exist'];//Displaying Session Message
					unset($_SESSION['user-update-exist']);//Removing Session Message
				}
			//1. Get the ID of the selected Admin
			$id = $_GET['id'];

			//2. Create SQL Query to Get the Details
			$sql="SELECT * FROM tbl_user WHERE id='$id'";

			//EXECUTE THE QUERY
			$res=mysqli_query($conn, $sql);

			//check wheter the query is executed ot not

			if ($res==TRUE) {
				// check wheter the data is available or not
				$count = mysqli_num_rows($res);
				// check wheter we have admin data or not
				if ($count==1) {
					// Get the Details
					//echo "Admin is Available";
					$row = mysqli_fetch_assoc($res);

					$full_name=$row['full_name'];
					$email=$row['email'];
					$username=$row['username'];
					$phone=$row['phone'];
					$sexe=$row['sexe'];
					$adress=$row['adress'];
					$password=$row['password'];
				}
				else{
					//redirect TO Manage Admin page
					header('location:'.SITEURL.'admin/manage-admin.php');
				}
			}
		 ?>

	<div class="wrapper1">
	
	<h2>Update Admin</h2>
	<form action="" method="POST">
		<!--information de compte-->
		<h4>Account</h4>
		<div class="input_group">
			<div class="input_box">
				<input type="text" placeholder="Full name" required class="name" name="full_name" value="<?php echo $full_name ?>">
				<i class="fa fa-user icon"></i>
			</div>
			
		</div>
		<div class="input_group">
			<div class="input_box">
				<input type="email" placeholder="Email Address" required class="name" name="email"value="<?php echo $email ?>">
				<i class="fa fa-envelope icon"></i>
			</div>
		</div>
		<div class="input_group">
			<div class="input_box">
				<input type="password" placeholder="Your password" required class="name" name="password" id="myInput">
				<i class="fa fa-unlock-alt icon" aria-hidden="true"></i>
			</div>
		</div>
		<input type="checkbox" onclick="myFunction()"><i class="fa fa-eye" aria-hidden="true"></i>
		<div class="input_group">
			<div class="input_box">
				<input type="text" placeholder="username" required class="name" name="username" value="<?php echo $username ?>">
				<i class="fa fa-user icon"></i>
			</div>
			
		</div>
		<div class="input_group">
			<div class="input_box">
				<input type="tel" placeholder="Phone" reguired class="name" name="phone" value="<?php echo $phone ?>">
				<i class="fa fa-phone icon" aria-hidden="true"></i>
			</div>
		</div>
		<div class="input_group">
			<div class="input_box">
				<input type="text" placeholder="Address" reguired class="name" name="adress" value="<?php echo $adress ?>">
				<i class="fa fa-map-marker icon"aria-hidden="true"></i>
			</div>
		</div>
		

		<!--Informations de compte-->

		<!--Gender start-->

		<div class="input_group">
				<div class="input_box">
					<h4>Sexe</h4>
					<input type="radio" name="sexe" class="radio" id="bc1" value="Male" <?php if ($sexe=="Male") {
							
						?> checked <?php } ?>>
					<label for="bc1"><span>
						<i class="fa fa-mars" aria-hidden="true"></i>Male</span></label>
						
						<input type="radio" name="sexe" class="radio" id="bc2" value="Female" <?php if ($sexe=="Female") {
							
						?> checked <?php } ?>>
					<label for="bc2"><span>
						<i class="fa fa-venus" aria-hidden="true"></i></i>Female</span></label> 
				</div>
			</div>
		
		

		<!--Gender end-->

		<!--Payment details start-->

			
			
			<div class="input_group">
				<div class="input_box">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="submit" name="submit" value="Update Admin" class="button">
				</div>
			</div>
		<!--Paymenet detail fin-->



	</form>

</div>


<?php
	// check wheter the submit button is clicked or not
if (isset($_POST['submit'])) {

	//echo "Button clicked";
	//Get all values from form to update;
	$id = $_POST['id'];
	$full_name = $_POST['full_name'];
	$email = $_POST['email'];
	$username1 = $_POST['username'];
	$phone = $_POST['phone'];
	$sexe = $_POST['sexe'];
	$adress = $_POST['adress'];
	$password1 = md5($_POST['password']);
	if ($password1==$password) {
		$query= mysqli_query($conn, "SELECT * FROM tbl_user WHERE username='$username1'");
		if (mysqli_num_rows($query) > 0 && ($username1!=$username)) {
			
			
			
			echo '<script>alert("Sorry this username already exists")</script>';
		}
		else{
			$sql = "UPDATE tbl_user SET 
				full_name='$full_name',
				email='$email',
				username='$username1',
				phone='$phone',
				sexe='$sexe',
				adress='$adress'
				WHERE id = '$id'
			";

				$res = mysqli_query($conn, $sql);

				//check wheter the query is executed or not
				if ($res==TRUE) {
					//Query executed and admin updated
					$_SESSION['update'] = "<div class='success'>Admin updated successfully. </div>";
					//Redirect To manage Admin page
					header("location:".SITEURL."admin/manage-admin.php");
				}
				else{
					//Failed to update admin
					$_SESSION['update'] = "<div class='erroe'>Failed to update admin. </div>";
					//Redirect To manage Admin page
					header("location:".SITEURL."admin/manage-admin.php");
				}
			}
	}
	else{
		echo '<script>alert("Your password is wrong")</script>';
	}

	//Create SQL Query to update admin
	


	

	// EXECUTE  the Query

	
}


 ?>
 <script type="text/javascript">
 	function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
 </script>


