<?php include('partials/menu.php');  ?>

	<!-- Main Section Starts -->
	<div class="main-content">
		<div class="wrapper">
			<h1>Manage Admin</h1>
			<br><br>

			<?php 

				$user_id = $_SESSION['user_id'];

				if (isset($_SESSION['add'])) {
					echo $_SESSION['add'];//Displaying Session Message
					unset($_SESSION['add']);//Removing Session Message
				}

				if (isset($_SESSION['delete'])) {
					echo $_SESSION['delete'];
					unset($_SESSION['delete']);
				}

				if (isset($_SESSION['update'])) {
					echo $_SESSION['update'];
					unset($_SESSION['update']);
					 
				}
				if (isset($_SESSION['user-not-found'])) {
					echo $_SESSION['user-not-found'];
					unset($_SESSION['user-not-found']);
					
				}
				if (isset($_SESSION['pad-not-match'])) {
					echo $_SESSION['pad-not-match'];
					unset($_SESSION['pad-not-match']);
					
				}

				if (isset($_SESSION['change-pad'])) {
					echo $_SESSION['change-pad'];
					unset($_SESSION['change-pad']);
					
				}
				if (isset($_SESSION['user-update-exist'])) {
					echo $_SESSION['user-update-exist'];
					unset($_SESSION['user-update-exist']);
					
				}
			?>
			

			<!-- Button to add Admin -->
			
			<br><br><br><br><br>
			

			<table class="tbl-full">
				<tr>
					
					<th>Full Name</th>
					<th>Email</th>
					<th>Username</th>
					<th>Phone</th>
					<th>Sexe</th>
					<th>Adress</th>
					<th>Actions</th>
				</tr>

				<?php 
					//Query to Get all admin
					$sql = "SELECT * FROM tbl_user where id = $user_id";
					//Execute the Query
					$res = mysqli_query($conn, $sql);

					//check whether the Query is executed or not

					if ($res==TRUE) {
						// Count Rows To Check whether we have data in database or not
						$count = mysqli_num_rows($res);

						$sn=0;//Create variable And Assign the value

						if ($count>0) {
							// We have data is database
							while ($rows=mysqli_fetch_assoc($res)) {
								//Using while loop to get all data from database
								//And while loop will run as long as we have data in database
								//Get individal Data
								$id=$rows['id'];
								$full_name=$rows['full_name'];
								$email=$rows['email'];
								$username=$rows['username'];
								$phone=$rows['phone'];
								$sexe=$rows['sexe'];
								$adress=$rows['adress'];
								$sn++;


								//display the values in uor table
								?>

								<tr>
									
									<td ><?php echo $full_name; ?></td>
									<td ><?php echo $email; ?></td>
									<td ><?php echo $username; ?></td>
									<td ><?php echo $phone; ?></td>
									<td ><?php echo $sexe; ?></td>
									<td ><?php echo $adress; ?></td>
									<td >
										<a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary" title="Change Password"><i class="fa fa-unlock-alt" aria-hidden="true"></i></a>
										<a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary" title="Update Admin"><i class="fa fa-refresh" aria-hidden="true"></i></a>
										
									</td>
								</tr>

								<?php

							}
						}
						else{
							
							echo "<div class = 'error'>No Admins available</div>";
						}
					}
					else{
						echo"test";
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
	<!-- Main Section Ends -->

<?php include('partials/footer.php'); ?>