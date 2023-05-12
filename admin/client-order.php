<?php include('partials/menu.php') ?>
<?php $client_id = $_GET['client_id'] ?>
<div class="main-content">
	<div class="wrapper">
		<h1>Manage Order</h1>
		
			<br><br><br>

			<?php 
				if (isset($_SESSION['update-order'])) {
					echo $_SESSION['update-order'];
					unset($_SESSION['update-order']);
				}
			?>
			
            <br><br><br>

			<table class="tbl-order">
				<tr>
					<th>#</th>
					
					
					
					<th>Total</th>
					<th>Order Date</th>
					<th>Status</th>
					<th>Customer name</th>
					<th>Customer Contact</th>
					<th>Customer Email</th>
					<th>Customer Adress</th>
					<th>Actions</th>
				</tr>

				<?php





					$sql = "SELECT * FROM tbl_order where client_id = $client_id";
					$res = mysqli_query($conn, $sql);
					$count = mysqli_num_rows($res);
					$sn=1;

					if ($count > 0) {
						while($row = mysqli_fetch_assoc($res))
						{
						
						$id = $row['id'];
						
						$qty = $row['qty'];
						$total = $row['total'];
						$order_date = $row['order_date'];
						$status = $row['status'];
						$customer_name = $row['customer_name'];
						$customer_contact = $row['customer_contact'];
						$customer_email = $row['customer_email'];
						$customer_adress = $row['customer_address'];
						$product_id = $row['product_id'];
						$cancel = $row['cancel'];
						

						$product_id_exp = explode(",",$product_id);
						$product_num = count($product_id_exp);
						
						$i=0;
						foreach ($product_id_exp as $value) 
						{
							$idk = ${'something'.$i} = $value;
							$i++;
							$sql1 = "SELECT * FROM tbl_product WHERE id = $idk";
							$res1 = mysqli_query($conn, $sql1);
							$count1 = mysqli_num_rows($res1);
							if ($count1 > 0) 
							{
								while($row1 = mysqli_fetch_assoc($res1))
								{
									$title1 = $row1['title'];
									
								}
							}


						}
						

						
						?>
						<tr>
						<td><?php echo $sn++; ?> </td>
						
						
						
						<td><?php echo$total ?> </td>
						<td><?php echo$order_date ?> </td>
						<td>
							<?php
								if ($status=="Ordered") {
									echo "<label>$status</label>";
								}
								elseif($status=="On delivery"){
									echo "<label style='color : orange;'>$status</label>";
								}
								elseif ($status=="Delivered") {
									echo "<label style='color : green;'>$status</label>";
								}
								elseif ($status=="Cancelled") {
									echo "<label style='color : red;'>$status</label>";
								}
							 ?>
						</td>
						<td><?php echo$customer_name ?> </td>
						<td><?php echo$customer_contact ?> </td>
						<td><?php echo$customer_email ?> </td>
						<td><?php echo$customer_adress ?> </td>
						<td>
						<a href="<?php echo SITEURL ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-secondary" title="Update Order Status"><i class="fa fa-refresh" aria-hidden="true"></i></a>
						<a href="<?php echo SITEURL ?>admin/order-info.php?order_id=<?php echo $id; ?>" class="btn-primary" title="Order Inforamtion"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
						<?php if ($cancel==1) {
							?>
							<a href="<?php echo SITEURL ?>admin/cancel-order.php?order_id=<?php echo $id; ?>" class="btn-danger" title="Accept Client Cancel To Order"><i class="fa fa-check" aria-hidden="true"></i></a>
							<?php
						}


						?>
						
						
						</td>
						</tr>

						<?php 



						}

						
					}
					else{
						echo "<div class = 'error'>No Customer available</div>";
					}
				 ?>

				
				
			</table>
	</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>

<?php include('partials/footer.php') ?>