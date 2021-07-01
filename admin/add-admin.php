<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>
	<?php include 'partial/menu.php'; ?>

	<!-- Main menu contet start -->
	<div class="main-content">
		<div class="wrapper">
			<h1>Add Admin</h1><br><br>

			<?php 
				if (isset($_SESSION['add'])) {
					# code...
					echo $_SESSION['add'];
					unset($_SESSION['add']);
				}

			 ?>

			<form action="" method="post">
				<table class="tbl-30">
					<tr>
						<td>Full Name:</td>
						<td><input type="text" name="full_name" placeholder="Enter your full name"></td>
					</tr>
					<tr>
						<td>User Name:</td>
						<td><input type="text" name="user_name" placeholder="Enter user name"></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type="Password" name="password" placeholder="Enter your Password"></td>
					</tr>
					<tr>
						<td colspan="2" ><input class="btn-secondry" type="submit" name="submit" value="Add Admin"></td>
					</tr>
				</table>
			</form>

		</div>
	</div>





	<?php include 'partial/footer.php'; ?>

</body>
</html>
<?php 

//proccess the value from form save it to database
//check whether the buttn is click or not
if (isset($_POST['submit'])) {
	# code...
	$full_name = $_POST['full_name'];
	$user_name = $_POST['user_name'];
	$password = md5($_POST['password']);

	$sql = "INSERT INTO `tbl_admin`(`full_name`, `username`, `password`) VALUES ('$full_name','$user_name','$password')";
	
	
	$res = mysqli_query($con,$sql) or die(mysqli_error());

	if ($res == true) {
		# code...
		$_SESSION['add']='<div class="success">Admin Added Successfully</div>';
		header('location:'.SITEURL.'admin/manage-admin.php');
	}else{
		$_SESSION['add']='<div class="error">Failed to add admin</div>';
		header('location:'.SITEURL.'admin/add-admin.php');
	}
}


 ?>
