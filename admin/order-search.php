<?php include('partials/menu.php'); ?>

<?php $search = $_POST['search']; ?>
<div class="main-content">
	<div class="wrapper">
		<h1>Manage Order</h1>
		
			<br><br><br>

<h2>Order on Your Search "<?php echo $search; ?>"</h2>

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
				    $search = $_POST['search'];
					$sql = "SELECT * FROM tbl_order WHERE customer_name LIKE '%$search%'";
					$res = mysqli_query($conn, $sql);
					$count = mysqli_num_rows($res);
					$sn=1;

					if ($count > 1) {
						while($row = mysqli_fetch_assoc($res))
						{
						
						$id = $row['id'];
						$title = $row['food'];
						$price = $row['price'];
						$qty = $row['qty'];
						$total = $row['total'];
						$order_date = $row['order_date'];
						$status = $row['status'];
						$customer_name = $row['customer_name'];
						$customer_contact = $row['customer_contact'];
						$customer_email = $row['customer_email'];
						$customer_adress = $row['customer_address'];
						?>
						<tr>
						<td><?php echo$sn++ ?> </td>
						
						
						
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










<?php include('partials/footer.php'); ?>