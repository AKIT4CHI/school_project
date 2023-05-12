<?php include('partials-font/menu.php'); ?>

		
<section class="food-search text-center">
        <div class="container">
            
           <br>
           <br>

        </div>
    </section>
		

			<?php 
			
				if (isset($_SESSION['update-order'])) {
					echo $_SESSION['update-order'];
					unset($_SESSION['update-order']);
				}
				if (isset($_SESSION['cancel-order'])) {
        echo $_SESSION['cancel-order'];
        unset($_SESSION['cancel-order']);
        
    }
			?>
			
         

			<table class="tbl-order">
				<tr>
					<th>#</th>
					<th>Total</th>
					<th>Order Date</th>
					<th>Status</th>
					<th>Name</th>
					<th>Contact</th>
					<th>Email</th>
					<th>Adress</th>
					<th>Actions</th>
				</tr>

				<?php

                $client_id = $_SESSION['client_id'];

                	

					$sql = "SELECT * FROM tbl_order where client_id = '$client_id'";
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
						
						<a href="<?php echo SITEURL ?>admin/order-info.php?order_id=<?php echo $id; ?>&client_id=<?php echo $client_id; ?>"  title="Order Inforamtion"><i class="fa fa-info-circle btn-primary-font" aria-hidden="true"></i></a>
						<?php if ($status=="Ordered") {
							?>
							<a href="<?php echo SITEURL ?>order-cancel.php?order_id=<?php echo $id; ?>&client_id=<?php echo $client_id; ?>"  title="Ask for Order Cancel"><i class="fa fa-times-circle btn-danger-font" aria-hidden="true" onclick="javascipt:return confirm('Are you sure to cancel this order');"></i></a>
							<?php

						} ?>
						
						
						</td>
						</tr>

						<?php 



						}

						
					}
					else{
						echo "<div class = 'error'>No Orders available</div>";
					}
				 ?>

				
				
			</table>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<hr>
<?php include('partials-font/footer.php'); ?>