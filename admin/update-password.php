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
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
			}
		 ?>

		<div class="wrapper1">
	
	<h2>Update Password</h2>
	<form action="" method="POST">
		<!--information de compte-->
		<div class="input_group">
			<div class="input_box">
				<input type="password" placeholder="Current password" reguired class="name" name="current_password" id="myInput">
				<i class="fa fa-unlock-alt icon" aria-hidden="true"></i>
			</div>
		</div>
		<input type="checkbox" onclick="myFunction()"><i class="fa fa-eye" aria-hidden="true"></i>
		<div class="input_group">
			<div class="input_box">
				<input type="password" placeholder="New Password" reguired class="name" name="new_password" id="myInput1">
				<i class="fa fa-unlock-alt icon" aria-hidden="true"></i>
			</div>
		</div>
		<input type="checkbox" onclick="myFunction1()"><i class="fa fa-eye" aria-hidden="true"></i>
		<div class="input_group">
			<div class="input_box">
				<input type="password" placeholder="Confirm your password" reguired class="name" name="confirm_password" id="myInput2">
				
				<i class="fa fa-unlock-alt icon" aria-hidden="true"></i>
			</div>
		</div>
		<input type="checkbox" onclick="myFunction2()"><i class="fa fa-eye" aria-hidden="true"></i>
		<div class="input_group">
				<div class="input_box">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="submit" name="submit" value="Update Password" class="button">
				</div>
			</div>
		<!--Paymenet detail fin-->



	</form>

</div>


<?php 

	//Check wheter the submit button is clicked or not
	if (isset($_POST["submit"])) {

		//echo "button is clicked";
	
		//1. Get the data from the form

		$id = $_POST['id'];
		$current_password = md5($_POST['current_password']);
		$new_password = md5($_POST['new_password']);
		$confirm_password = md5($_POST['confirm_password']);

		//2. check wheter the user with current id or password exist or not
		$sql = "SELECT * FROM tbl_admin WHERE id =$id AND password = '$current_password'";
		//Execute the Query

		$res = mysqli_query($conn, $sql);

		if ($res==TRUE) {

			//Check wheter the data is available or not

			$count = mysqli_num_rows($res);
			if ($count==1) {

				//User Exist and Password can be changed
				//Check whete the New password and confirm password match or not
				if ($new_password==$confirm_password) {

					//Update password
					$sql2 = "UPDATE tbl_admin SET
						password = '$new_password'
						WHERE id = $id
					";
					// execute the Query

					$res = mysqli_query($conn, $sql2);

					//check wheter the Query is executed or not

					if ($res==TRUE) {

						$_SESSION['change-pad'] = "<div class = 'success'>Password changed successfully</div>";
					header('location:'.SITEURL."admin/manage-admin.php");
					}
					
				}
				else{
					//Redirect to manage admin With Error Message
					echo '<script>alert("Your entered passwords dont match")</script>';

				}
			}
			else{
				//User does not Exist Set message and redirect
				echo '<script>alert("Your Current password is wrong")</script>';
			}
		}

		//3. check wheter the new passowrd and confirm match or not

		//4. change password if all above is true
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
function myFunction2() {
  var x = document.getElementById("myInput2");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>


