<?php 
	include('../config/constants.php');
	$user_id = $_SESSION['user_id'];

	//1. Get the Id of the category
	$id = $_GET['id'];
	$sql1 = "SELECT title from tbl_category where id = $id";
	$res1 = mysqli_query($conn,$sql1);
	$count = mysqli_num_rows($res1);
	if ($count > 0) {
		$row = mysqli_fetch_assoc($res1);
		$title = $row['title'];
	}

	$sql3 = "INSERT into tbl_actions set
			user_id = $user_id,
			action = 'deleted category $title'
				";
	$res3 = mysqli_query($conn, $sql3);

	//2. Create sql query to delete category
	$sql = "DELETE FROM tbl_category WHERE id = $id";

	
	//3. Execute the query
	$res = mysqli_query($conn, $sql);

	//4. check whether the query is executed or not
	if ($res==TRUE) {

		$_SESSION['delete-cat'] = "<div class = 'success'>Category deleted successfully.</div>";
		header('location:'.SITEURL."admin/manage-category.php");
	}
	else{
		$_SESSION['delete-cat'] = "<div class = 'erroe'>Failed to add category</div>";
		header('location:'.SITEURL."admin/manage-category.php");

	}




?>