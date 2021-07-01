<?php include 'partial/menu.php' ?>

<div class="main-content">
	<div class="wrapper">
		<h1>Update Password</h1><br><br>

		<?php if (isset($_GET['id'])) {
			# code...
			$id = $_GET['id'];
		} ?>

		<form method="post" action="">
			<table class="tbl-30">
					<tr>
						<td>Current Password:</td>
						<td><input type="Password" name="current_password" value="" placeholder="Enter Current Password"></td>
					</tr>
					<tr>
						<td>New Password:</td>
						<td><input type="Password" name="new_password" value=""  placeholder="Enter new Password" ></td>
					</tr>
					<tr>
						<td>Cunform Password:</td>
						<td><input type="Password" name="conform_passsword" value=""  placeholder="Enter Conform Password" ></td>
					</tr>
					<tr>
						<td colspan="2" >
							<input type="hidden" name="id" value="<?php echo $id; ?>">
							<input class="btn-secondry" type="submit" name="submit" value="Update Password"></td>
					</tr>
				</table>
		</form>

	</div>
</div>

<?php 
//check whethe the submit button is clicked or not
if (isset($_POST['submit'])) {
	# code...
	$id = $_POST['id'];
	$current_password = md5($_POST['current_password']);
	$new_password = md5($_POST['new_password']);
	$conform_password = md5($_POST['conform_passsword']);

	$sql = "SELECT * FROM tbl_admin WHERE id = $id AND password='$current_password'";
	$res = mysqli_query($con,$sql);
	if ($res == true) {
		# code...
		//deta is availane or not
		$count = mysqli_num_rows($res);
		if ($count == 1) {
			# code...
			//check whether the new password and conform password match
			if ($new_password == $conform_password) {
				# code...

				$sql2 = "UPDATE tbl_admin SET password ='$new_password' WHERE id=$id";
				$res2 = mysqli_query($con,$sql2);
				if ($res2 == true) {
					# code...
					$_SESSION['change password']=' <div class="success">Change Password Successfully</div>';
					header('location:'.SITEURL.'admin/manage-admin.php');
				}else{
					$_SESSION['change password']=' <div class="error">Failed to Change Password</div>';
					header('location:'.SITEURL.'admin/manage-admin.php');
				}
			}else{
				$_SESSION['Password not Match']=' <div class="error">password did`t match</div>';
				header('location:'.SITEURL.'admin/manage-admin.php');
			}

		
		}else{
			//user dos not exist
			$_SESSION['user not found']=' <div class="error">User Not Found</div>';
			//redirect to user
			header('location:'.SITEURL.'admin/manage-admin.php');
			
		}
	}
}


 ?>

<?php include 'partial/footer.php' ?>