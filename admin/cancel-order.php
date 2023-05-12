<?php include('../config/constants.php'); ?>

<?php
$order_id = $_GET['order_id'];
$sql = "UPDATE tbl_order SET status = 'Cancelled', Cancel=0 where id = $order_id";
$res = mysqli_query($conn,$sql);
if ($res==TRUE) {
	$_SESSION['order-cancel-client'] ='<script>alert("Order Cancelled Successfully")</script>';
			header("Location: " . $_SERVER["HTTP_REFERER"]);
}
else{
	$_SESSION['order-cancel-client'] ='<script>alert("Failed To Cancel Order")</script>';
			header("Location: " . $_SERVER["HTTP_REFERER"]);
 }
 ?>
