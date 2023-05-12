<?php include('../config/constants.php'); ?>


<?php
$message_id = $_GET['Message_id'];
	$sql = "UPDATE tbl_message set checked = 'Yes' where id = $message_id";
	$res = mysqli_query($conn, $sql);
	if ($res==TRUE) {
		header("Location: " . $_SERVER["HTTP_REFERER"]);
	}
	
 ?>