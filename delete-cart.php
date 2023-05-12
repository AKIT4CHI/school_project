<?php include('config/constants.php');
$client_id = $_SESSION['client_id'];
 $id = $_GET['id'];

 $sql = "DELETE FROM tbl_cart WHERE id=$id, client_id = $client_id";

 $res = mysqli_query($conn, $sql);

 if ($res==TRUE) {
 	$_SESSION['cart-delete'] ='<script>alert("Product Deleted Successfully")</script>';
    header('location:'.SITEURL."shop-cart.php");
 }
 else{
 	$_SESSION['cart-delete'] ='<script>alert("Failed To Delete Product")</script>';
    header('location:'.SITEURL."shop-cart.php");
 }
	

?>