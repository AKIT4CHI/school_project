<?php include('partials/menu.php') ?>

<div class="main-content">
	<div class="wrapper">
		<h1>Manage Category</h1>
		<br><br>

		<?php
			if (isset($_SESSION['add-category'])) {
				echo $_SESSION['add-category'];
				unset($_SESSION['add-category']);
			}
			if (isset($_SESSION['delete-cat'])) {
				echo $_SESSION['delete-cat'];
				unset($_SESSION['delete-cat']);
			}
			?>
			<br><br>

			<!-- Button to add Admin -->
			<a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary1">Add Category</a>
			

			<form action="<?php echo SITEURL; ?>admin/category-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Product..." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary-s">
            </form>
            <br><br><br>

			
			

			<table class="tbl-full">
				<tr>
					<th>#</th>
					<th>Title</th>
					<th>Image</th>
					<th>Featured</th>
					<th>Active</th>
					<th>Actions</th>
				</tr>

				<?php
					//Query to get all data from database
					$sql = "SELECT * FROM tbl_category";

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
								<a href="<?php echo SITEURL;?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger" title="Delete Category" ><i class="fa fa-trash-o" aria-hidden="true" onclick="javascipt:return confirm('Are you sure to delete this');"></i></a>
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