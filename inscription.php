<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register - Setup Game</title>
	<link rel="stylesheet" href="css/login.css">
</head>
<body>

	<div class="box">
		

		

		<!-- Login Form Starts Here -->
		<form action="" method="POST">
			<span class="text-center">Register</span>
		<div class="input-container">
			<input type="text" name="full_name"/>
			<label>full name</label>
		</div>

		
		<div class="input-container">
			<input type="text" name="email" />
			<label>Email</label>
		</div>	
		<div class="input-container">
			<input type="password" name="password"/>
			<label>Password</label>
		</div>
		<div class="input-container">
			<input type="password" name="confPass"/>
			<label>Confirm Password</label>
		</div>


			<input type="submit" name="submit" class="btn">
		</form>



</div>

		<!-- Login Form Ends Here -->
		
	

</body>
</html>



<?php
	
	//Check Wheter the Submit is clicked or not
	if (isset($_POST['submit'])) {

		//Process For login
		//1. Get the data from login form
		$email = $_POST['email'];
		$full_name = $_POST['full_name'];
		$password = $_POST['password'];
		$confirm_password = $_POST['confPass'];

		$query1 = mysqli_query($conn, "SELECT * FROM tbl_client where email = '$email'");

		if (mysqli_num_rows($query1) > 0) {
			echo '<script>alert("sorry this email already exists")</script>';
			
		}
		else{
			if ($password != $confirm_password) {
			echo '<script>alert("Your entered passwords dont match")</script>';
			}
			else{
				$password = md5($_POST['password']);
				$sql2 = "INSERT into tbl_client set 
				full_name = '$full_name',
				email = '$email',
				password = '$password'
				";
				$res2 = mysqli_query($conn, $sql2);

				if ($res2==TRUE) {
					echo '<script>alert("Login Successfull")</script>';
					header("location:".SITEURL.'login.php');
				}
			}
		}


		



		//2. Sql To check wheter the user with username and password exist or not
		

		
	}
 ?>