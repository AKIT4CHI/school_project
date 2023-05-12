<?php include('partials/menu.php'); ?>


<div class="main-content">
	<div class="wrapper">
		<h1>Stock History</h1>
		<br><br>

		
			<table class="tbl-full1">
				<tr>
					<th>#</th>
					<th>Title</th>
					<th>Image</th>
					<th>Date</th>
					<th>Stock Added</th>
					
					


				</tr>

				<?php
					$sql = "SELECT * FROM tbl_stock ORDER BY stock_date DESC";

					$res = mysqli_query($conn, $sql);


					$count = mysqli_num_rows($res);

					$sn = 1;

					if ($count > 0) {
						
						while ($row = mysqli_fetch_assoc($res)) {
							
							$id = $row['id'];
							$product_id = $row['product_id'];
							$stock_date = $row['stock_date'];
							$stock = $row['stock'];

							
							

							
							$sql1 = "SELECT * FROM tbl_product WHERE id=$product_id";
							$res1 = mysqli_query($conn, $sql1);
							$row1 = mysqli_fetch_assoc($res1);
							$image_name = $row1['image_name'];
							$title = $row1['title'];
							?>

							<tr>
								<td class="prdct "><?php echo $sn++; ?></td>
								<td class="prdct "><?php echo $title; ?></td>
								
								
								
								

								<td class="prdct ">
									<?php
									//check whether the image has a name or not
									if ($image_name!=="") {

										?>
										<img src="<?php echo SITEURL;?>images/food/<?php echo $image_name; ?>" width = "100px">

										<?php
									}
									else{
										//Display the messgage
										echo "<div class = 'error'>Image is not available</div>";
									}
								 ?>
								</td>
								<td class="prdct "><?php echo $stock_date; ?></td>
								<td class="prdct "><?php echo $stock; ?></td>
								
								
							</tr>
							<?php 

						}
					}
					else{
						echo "<div class = 'error'>No Product available.</div>";
					}



				 ?>

				
			</table>
		
	</div>
</div>


























<?php include('partials/footer.php') ?>