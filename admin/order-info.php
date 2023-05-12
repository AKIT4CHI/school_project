<?php include('partials/menu.php'); ?>

<div class="main-content">
	<div class="wrapper">
		<h1>Order Info</h1>
		<br><br><br>
		

		
	


			<!-- Button to add Admin -->
			
			
			

			<table class="tbl-full">
				<tr>
					<th>#</th>

					<th>Title</th>
					<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Price</th>
					<th>Image</th>
					<th>Quantity</th>
					
					
					


				</tr>

			<?php
			$id = $_GET['order_id'];

			$sql1 = "SELECT * FROM tbl_order WHERE id = $id";
			$res1 = mysqli_query($conn, $sql1);
			$count1 = mysqli_num_rows($res1);
			$sn=1;
			if ($count1 > 0) 
			{
				while ($row1 = mysqli_fetch_assoc($res1)) 
				{	
					$check = $row1['checked'];
					$product_id = $row1['product_id'];
					$product_id_exp = explode(",",$product_id);
					$product_num = count($product_id_exp);

					$qty = $row1['qty'];
					$qty_exp = explode(",",$qty);
					
					$i=0;
				
					foreach ($product_id_exp as $index => $value) 
						{	

							
							$idk = ${'something'.$i} = $value;
							$i++;
							$idk1 = $qty_exp[$index];
							$sql2 = "SELECT * FROM tbl_product WHERE id = $idk";
							$res2 = mysqli_query($conn, $sql2);
							$count2 = mysqli_num_rows($res2);
							if ($count2 > 0) 
							{
								
								while($row2 = mysqli_fetch_assoc($res2))
								{
									$id_product = $row2['id'];
									$title2 = $row2['title'];
									$image_name = $row2['image_name'];
									$description = $row2['description'];
									$price = $row2['price'];
									$stock = $row2['stock'];

									


									?>
										<tr>
								<td class="prdct"><?php echo $sn++; ?></td>

								<td class="prdct"><?php echo $title2; ?></td>
								
								<td class="prdct">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $price; ?> DH</td>




								
								

								<td class="prdct">
									<?php
									//check whether the image has a name or not
									if ($image_name!=="") {

										?>
										<img src="<?php echo SITEURL;?>images/food/<?php echo $image_name; ?>" width = "100px" height="90px">

										<?php
									}
									else{
										//Display the messgage
										echo "<div class = 'error'>Image is not available</div>";
									}
								 ?>
								</td>
								<td class="prdct"><?php echo $idk1; ?> </td>
								
								
							</tr>

									<?php 

								}
							}


						}
				}
			}


		
		 ?>
		 
			
			
				
				

			

		
	</table>
</div>
</div>

	
	<!-- Main Section Ends -->

<?php include('partials/footer.php'); ?>