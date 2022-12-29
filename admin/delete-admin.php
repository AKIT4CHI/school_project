<?php
	
	//Include constants.php file here
	include('../config/constants.php');

	// 1.get the ID of the admin to be deleted
	echo $id = $_GET['id'];
	// 2.create sql query to delete admin
	$sql = "DELETE FROM tbl_admin WHERE id=$id";

	// 3. execute the query

	$res = mysqli_query($conn, $sql);

	// check wheter the query executed successfully or not

	if ($res==TRUE) {
		//Query executed successfully and admin deleted
		//echo "Admin Deleted";
		// Create Session variable to display Message
		$_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";
		//redirect to Manage admin page
		header('location:'.SITEURL."admin/manage-admin.php");
	}
	else{
		//echo "Failed to delete admin";

		$_SESSION['delete'] = "<div class='error'>Failed to delete Admin try again later</div>";
		header('location:'.SITEURL."admin/manage-admin.php");
	}
	// 4. redirect to Manage Admin page with message (success/error)
 ?>