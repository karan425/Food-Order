<?php include '../config/dbcon.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Food Order system</title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>

	<div class="login">
		<h1 class="text-center">Login</h1><br>

			<?php 
				if (isset($_SESSION['login'])) {
					# code...
					echo $_SESSION['login'];
					unset($_SESSION['login']); 
				}
				if (isset($_SESSION['no login msg'])) {
					# code...
					echo $_SESSION['no login msg'];
					unset($_SESSION['no login msg']);
				}

			 ?>
			 <br><br>
			<!-- login form starts here -->
			<form action="" method="post" class="text-center">
				Usre Name <br>
				 <input type="text" name="user_name" placeholder="Enter user name"> <br>
				Password <br>
				 <input type="Password" name="password" placeholder="Enter Password"> <br><br>
				<input class="btn-primery" type="submit" name="submit" value="login">
			
			</form><br><br>
			
			<!-- login form end here -->


		<p class="text-center">Created by <a href="#">Karan Gorai</a></p>
	</div>

</body>
</html>

<?php 

//wether the submit button is clicked or not
if (isset($_POST['submit'])) {
	# code...
	//Process for login
	//get the deta from login from
	$user_name = $_POST['user_name'];
	$password = md5($_POST['password']);

	//sql to check the user user name and password in match or not
	$sql = "SELECT * FROM tbl_admin WHERE username = '$user_name' AND password = '$password'";

	//execute the qury
	$res = mysqli_query($con,$sql);

	//count rows to check wether the user exist or not
	$count = mysqli_num_rows($res);

	if ($count == 1) {
		# code...
		//user availeble
		$_SESSION['login']='<div class="success">Login Successfully</div>';
		$_SESSION['user']='$user_name';//check user logedin or not
		header('location:'.SITEURL.'admin/');
	}else{
		
		$_SESSION['login']='<div class="error text-center">Username and Password did not match</div>';
		header('location:'.SITEURL.'admin/login.php');
	}
	
}
 ?>
