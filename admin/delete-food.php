<?php 


		include('../config/constants.php');

		$user_id = $_SESSION['user_id'];

		$id = $_GET['id'];

		$sql1 = "SELECT title from tbl_food where id = $id";
	$res1 = mysqli_query($conn,$sql1);
	$count = mysqli_num_rows($res1);
	if ($count > 0) {
		$row = mysqli_fetch_assoc($res1);
		$title = $row['title'];
	}

	$sql3 = "INSERT into tbl_actions set
			admin_id = $user_id,
			action = 'deleted product $title'
				";
	$res3 = mysqli_query($conn, $sql3);

		$sql = "DELETE FROM tbl_food WHERE id = '$id'";

		$res = mysqli_query($conn, $sql);


		if ($res==TRUE) {
			
			$_SESSION['delete-food'] = "<div class = 'success'>Product Deleted Successfully.</div";
			header('location:'.SITEURL."admin/manage-food.php");
		}
		else{
			$_SESSION['delete-food'] = "<div class = 'error'>Failed to delete Product.</div";
			header('location:'.SITEURL."admin/manage-food.php");
		}



 ?>