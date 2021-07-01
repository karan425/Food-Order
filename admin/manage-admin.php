<!DOCTYPE html>
<html>
<head>
	<title>Food Order website - Home Page</title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>
	<?php include 'partial/menu.php'; ?>
	<!-- Main Content section start -->
	<div class="main-content">
		<div class="wrapper">
			<h1>Manage Admin</h1>
			<?php 
				if (isset($_SESSION['add'])) {
					# code...
					echo $_SESSION['add'];
					unset($_SESSION['add']); 
				}
				if (isset($_SESSION['delete'])) {
					# code...
					echo $_SESSION['delete'];
					unset($_SESSION['delete']);
				}
				if (isset($_SESSION['update'])) {
					# code...
					echo $_SESSION['update'];
					unset($_SESSION['update']);
				}
				if (isset($_SESSION['user not found'])) {
					# code...
					echo $_SESSION['user not found'];
					unset($_SESSION['user not found']);
				}
				if (isset($_SESSION['Password not Match'])) {
					# code...
					echo $_SESSION['Password not Match'];
					unset($_SESSION['Password not Match']);
				}
				if (isset($_SESSION['change password'])) {
					# code...
					echo $_SESSION['change password'];
					unset($_SESSION['change password']);
				}
				


			 ?>
			 <br>
			 <br>
			<!-- Button for adding admin-->
			<a href="add-admin.php" class="btn-primery ">Add Admin</a><br><br><br>
			
				<table class="tbl-full">
				<tr>
					<th>S.N</th>
					<th>Full Name</th>
					<th>User Name</th>
					<th>Actions</th>
				</tr>


				<?php 

					$sql = "SELECT * FROM tbl_admin";
					$res = mysqli_query($con,$sql);

					if ($res == true) {
						# code...
						$count = mysqli_num_rows($res);
						$sn = 1;
						if ($count >0) {
							# code...
							while ($count = mysqli_fetch_assoc($res)) {
								# code...
								$id=$count['id'];
								$Full_name= $count['full_name'];
								$user_name = $count['username'];

								//disply the value
								?>
								<tr>
									<td><?php echo $sn++; ?></td>
									<td><?php echo $Full_name; ?></td>
									<td><?php echo $user_name; ?></td>
									<td>
										<a href="<?php echo SITEURL; ?>admin/update-pass-admin.php?id=<?php echo $id; ?>" class="btn-primery">Change Passwoerd</a>
										<a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondry">Update Admin</a>
										<a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id;  ?>"  class="btn-denger">Delete Admin</a>
									</td>
								</tr>							


								<?php



							}
						}else{
							//we do not have data
						}
					}
				 ?>

				
			</table>
			

		</div>
	</div>
	<!-- Main Content section end -->
	<?php include 'partial/footer.php' ?>

</body>
</html>