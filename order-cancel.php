<?php include ('config/constants.php'); ?>

<?php 
$order_id = $_GET['order_id']; 
$client_id = $_SESSION['client_id'];

$sql = "UPDATE tbl_order SET Cancel = 1 WHERE id = $order_id and client_id = $client_id";
$res = mysqli_query($conn, $sql);
if ($res==TRUE) {
	$_SESSION['cancel-order'] ='<script>alert("Order Cancel Request Sent Succesfully")</script>';
			header("Location: " . $_SERVER["HTTP_REFERER"]);
}
else{
			$_SESSION['cancel-order'] ='<script>alert("Failed to Send Cancel Request please try again")</script>';
			header("Location: " . $_SERVER["HTTP_REFERER"]);
    		
		}
?>