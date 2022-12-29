<?php include('../config/constants.php') ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login - Setup Game System</title>
	<link rel="stylesheet" href="../css/login.css">
</head>
<body>

	<div class="box">
		

		<?php
		if (isset($_SESSION['login'])) {
			echo $_SESSION['login'];
			unset($_SESSION['login']);
		}

		if (isset($_SESSION['no-login-message'])) {
			
			echo $_SESSION['no-login-message'];
			unset($_SESSION['no-login-message']);
		}
		 ?>

		<!-- Login Form Starts Here -->
		<form action="" method="POST">
			<span class="text-center">Login</span>
		<div class="input-container">
			<input type="text" name="username" />
			<label>Full Name</label>
		</div>	
		<div class="input-container">
			<input type="password" name="password"/>
			<label>Password</label>
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
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		//2. Sql To check wheter the user with username and password exist or not
		$sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";

		//3. Execute the Query
		$res = mysqli_query($conn, $sql);

		//4. Count Rows TO check Wheter the user exist or not
		$count = mysqli_num_rows($res);

		if ($count==1) {
			$row = mysqli_fetch_assoc($res);
			$_SESSION['user_id'] = $row['id'];
			//User Available And Login Success
			$_SESSION['login'] = "<div class = 'success'>Login Successfull. </div>";
			$_SESSION['user'] = $username; //To check whether the user is logged in or not and logout will unset it
			header('location:'.SITEURL."admin/");

		}
		else{

			//User not Available and Logi Fail
			$_SESSION['login'] = "<div class = 'error text-center'>Login Failed Username or password doesn't match </div>";
			header('location:'.SITEURL."admin/login.php");

		}
	}
 ?>