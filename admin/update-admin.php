<?php include 'partial/menu.php'; ?>

<div class="main-content">
	<div class="wrapper">
		<h1>Update Admin</h1>

		<?php 

			//get the id selected admin
			$id = $_GET['id'];

			//ceate the query
			$sql = "SELECT * FROM tbl_admin WHERE id=$id";

			//Execute the query
			$res = mysqli_query($con,$sql);

			//wether the query is executed or not
			if ($res == true) {
				# code...
				$count = mysqli_num_rows($res);
				if ($count==1) {
					# code...
					//we will get the details
					// echo "Admin Available";
					$row = mysqli_fetch_assoc($res);
					$full_name = $row['full_name'];
					$user_name = $row['username'];
				}else{
					header('location;'.SITEURL.'admin/manage-admin.php');
				}
			}

		 ?>

		<form action="" method="post">
				<table class="tbl-30">
					<tr>
						<td>Full Name:</td>
						<td><input type="text" name="full_name" value="<?php echo $full_name; ?>"></td>
					</tr>
					<tr>
						<td>User Name:</td>
						<td><input type="text" name="user_name" value="<?php echo $user_name; ?>" ></td>
					</tr>
					<tr>
						<td colspan="2" >
							<input type="hidden" name="id" value="<?php echo $id; ?>">
							<input class="btn-secondry" type="submit" name="submit" value="Update Admin"></td>
					</tr>
				</table>
			</form>
	</div>
</div>
<?php 
//check wether the button is clickd or not
	if (isset($_POST['submit'])) {
		# code...
		// echo "button clicked";
		//get all the values from form
		$id = $_POST['id'];
		$full_name = $_POST['full_name'];
		$user_name = $_POST['user_name'];

		$sql = "UPDATE tbl_admin SET full_name = '$full_name',username='$user_name' where id = $id";
		$res = mysqli_query($con,$sql);
		if ($res == true) {
			$_SESSION['update']= '<div class="success">Updated Admin Succssesfully</div>';
			header('location:'.SITEURL.'admin/manage-admin.php');
		}else{
			$_SESSION['update']='<div class="error">Failed to update. Try Again Later</div>';
	header('location:'.SITEURL.'admin/manage-admin.php');
		}
	}
 ?>

<?php include 'partial/footer.php' ?>