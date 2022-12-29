<?php include('partials/menu.php'); ?>
<?php $search = $_POST['search']; ?>

<div class="main-content">
	<div class="wrapper">
		
		<br><br>

		
			<br><br>
			<h2>Product on Your Search "<?php echo $search; ?>"</h2>

			<!-- Button to add Admin -->
			
			<br><br><br>

			

			
			

			<table class="tbl-full">
				<tr>
					<th>S.N.</th>
					<th>Title</th>
					<th>Image</th>
					<th>Featured</th>
					<th>Active</th>
					<th>Actions</th>
				</tr>

				<?php
					//Query to get all data from database
					$sql = "SELECT * FROM tbl_category WHERE title LIKE '%$search%'";

					//Execute Query
					$res = mysqli_query($conn, $sql);


					//count Rows
					$count = mysqli_num_rows($res);

					$sn=0;

					if ($count>0) {
						
						//We have data in database
						//Get the data and display
						while($row=mysqli_fetch_assoc($res)){

							$id = $row['id'];
							$title = $row['title'];
							$image_name = $row['image_name'];
							$featured = $row['featured'];
							$active = $row['active'];
							$sn++;


							?>

						<tr>
							<td><?php echo $sn; ?></td>
							<td><?php echo $title; ?></td>
							<td>
								<?php
									//check whether the image has a name or not
									if ($image_name!=="") {

										?>
										<img src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>" width = "100px">

										<?php
									}
									else{
										//Display the messgage
										echo "<div class = 'error'>Image is not available</div>";
									}
								 ?>
							</td>

							<td><?php echo $featured; ?></td>
							<td><?php echo $active; ?></td>
							<td>
								<a href="<?php echo SITEURL;?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary" title="Update Category"><i class="fa fa-refresh" aria-hidden="true"></i></a>
								<a href="<?php echo SITEURL;?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger" title="Delete Category"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
							</td>
						</tr>

						<?php

						}
					}
					else{
						//We do not have Data
						//We'll display the message inside the table
						?>

						<tr>
							<td colspan="6"><div class="error">No category Added</div></td>
						</tr>

						<?php
					}
				 ?>

				
				
			</table>
	</div>
</div>


<?php include('partials/footer.php') ?>