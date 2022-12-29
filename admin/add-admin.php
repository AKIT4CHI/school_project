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
				if (isset($_SESSION['add'])) {
					echo $_SESSION['add'];//Displaying Session Message
					unset($_SESSION['add']);//Removing Session Message
				}
				if (isset($_SESSION['user-exist'])) {
					echo $_SESSION['user-exist'];//Displaying Session Message
					unset($_SESSION['user-exist']);//Removing Session Message
				}
			?>

		<div class="wrapper1">
	
	<h2>Add Admin</h2>
	<form action="" method="POST">
		<!--information de compte-->
		<h4>Account</h4>
		<div class="input_group">
			<div class="input_box">
				<input type="text" placeholder="Full name" required class="name" name="full_name">
				<i class="fa fa-user icon"></i>
			</div>
			
		</div>
		<div class="input_group">
			<div class="input_box">
				<input type="email" placeholder="Email Address" required class="name" name="email">
				<i class="fa fa-envelope icon"></i>
			</div>
		</div>
		<div class="input_group">
			<div class="input_box">
				<input type="text" placeholder="username" required class="name" name="username">
				<i class="fa fa-user icon"></i>
			</div>
			
		</div>
		<div class="input_group">
			<div class="input_box">
				<input type="tel" placeholder="Phone" reguired class="name" name="phone">
				<i class="fa fa-phone icon" aria-hidden="true"></i>
			</div>
		</div>
		<div class="input_group">
			<div class="input_box">
				<input type="text" placeholder="Address" reguired class="name" name="adress">
				<i class="fa fa-map-marker icon"aria-hidden="true"></i>
			</div>
		</div>
		

		<!--Informations de compte-->

		<!--Gender start-->

		<div class="input_group">
				<div class="input_box">
					<h4>Sexe</h4>
					<input type="radio" name="sexe" class="radio" id="bc1" value="Male" checked>
					<label for="bc1"><span>
						<i class="fa fa-mars" aria-hidden="true"></i>Male</span></label>
						
						<input type="radio" name="sexe" class="radio" id="bc2" value="Female">
					<label for="bc2"><span>
						<i class="fa fa-venus" aria-hidden="true"></i></i>Female</span></label> 
				</div>
			</div>
		<div class="input_group">
			<div class="input_box">

				<input type="password" placeholder="password" reguired class="name" name="password" id="myInput">
				<i class="fa fa-unlock-alt icon" aria-hidden="true" ></i>

			</div>
			
		</div>
		<input type="checkbox" onclick="myFunction()"><i class="fa fa-eye" aria-hidden="true"></i>

		<div class="input_group">
			<div class="input_box">
				<input type="password" placeholder="Confirm your password" reguired class="name" name="confirm_password" id="myInput1">
				<i class="fa fa-unlock-alt icon" aria-hidden="true"></i>
			</div>
		</div>
		<input type="checkbox" onclick="myFunction1()"><i class="fa fa-eye" aria-hidden="true"></i>
		
		

		<!--Gender end-->

		<!--Payment details start-->

			
			
			<div class="input_group">
				<div class="input_box">
					<input type="submit" name="submit" value="Add Admin" class="button">
				</div>
			</div>
		<!--Paymenet detail fin-->



	</form>

</div>










<?php 
	//Process the value from the value and save it in database
	//check wheter the button is clicked or not

	if (isset($_POST['submit'])) {
		// Button Clicked
		//echo "button clicked";

		//1. Get the Data from form
		$full_name = $_POST['full_name'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$phone = $_POST['phone'];
		$sexe = $_POST['sexe'];
		$adress = $_POST['adress'];
		$password = ($_POST['password']); //Password Encryption with MD5
		$confirm_password = ($_POST['confirm_password']);
		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number    = preg_match('@[0-9]@', $password);
		
		

		//2. SQL Query to save data to database
		$query= mysqli_query($conn, "SELECT * FROM tbl_admin WHERE username='$username'");
		
		
		if (mysqli_num_rows($query) > 0) {
			
			echo '<script>alert("this username already exists")</script>';
			
			
		}
		else{
			if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
				echo '<script>alert("Password should be at least 8 characters in length and should include at least one upper case letter,one lowercase case letter, one number.")</script>';
			}
			else{
				if ($confirm_password!=$password) {
				echo '<script>alert("Your entered passwords dont match")</script>';
			}
			else{
				$password1 = md5($password); 
				$sql = "INSERT INTO tbl_admin SET
				full_name='$full_name',
				email='$email',
				username='$username',
				phone='$phone',
				sexe='$sexe',
				adress='$adress',
				password='$password1'
				";
				//4.executing query and saving data in database
				$res = mysqli_query($conn, $sql) or die(mysqli_error());
				//5. check wheter the (query is executed) data is inerted or not and display appropriate message
				if ($res==TRUE) {
					//Data inserted
					//echo "Data inserted";
					//Create a variable to Display a Message
					$_SESSION['add'] = "<div class='success'>Admin Added Successfully</div>";
					//Redirect page to manage admin
					header("location:".SITEURL.'admin/manage-admin.php');
				}
				else{
					//Data failed to insert
					//echo "Failed to insert Data";
					//Create a variable to Display a Message
					$_SESSION['add'] = "<div class='error'>Failed To add to Admin</div>";
					//Redirect page to Add admin
					header("location:".SITEURL.'admin/add-admin.php');
				}
				}

			}
			

			}
			
		
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
function myFunction1() {
  var x = document.getElementById("myInput1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

</script>
