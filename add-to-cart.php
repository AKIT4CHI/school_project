<?php include ('config/constants.php'); ?>
<?php 

if (isset($_SESSION['client_id'])) {
	$client_id = $_SESSION['client_id'];



$id = $_GET['id'];

$sql = "SELECT * FROM tbl_product WHERE id=$id";
$res = mysqli_query($conn, $sql);

if ($res==TRUE)
{
	$count = mysqli_num_rows($res);
	if ($count==1) {
		$row = mysqli_fetch_assoc($res);
		$product_id = $row['id'];

		$query = mysqli_query($conn, "SELECT * FROM tbl_cart WHERE product_id=$id and client_id = $client_id");
		if (mysqli_num_rows($query) > 0) {
			$_SESSION['product-exist'] ='<script>alert("Product Already Exist in your cart")</script>';
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
		else{
			$sql1 = "INSERT INTO tbl_cart SET product_id=$product_id, quantity=1, client_id = $client_id";
			$res1 = mysqli_query($conn, $sql1);
			if ($res1==TRUE) {
			$_SESSION['add-to-cart'] ='<script>alert("Product added Successfully")</script>';
			header("Location: " . $_SERVER["HTTP_REFERER"]);
    		
		}
		else{
			$_SESSION['add-to-cart'] ='<script>alert("Failed to add Product")</script>';
			header("Location: " . $_SERVER["HTTP_REFERER"]);
    		
		}

		}

		
	}
	else{

	}
}
else{

}

}

else{
	$_SESSION['add-to-cart'] ='<script>alert("please login to add Products to cart")</script>';
			header("Location: " . $_SERVER["HTTP_REFERER"]);
}

?>


 