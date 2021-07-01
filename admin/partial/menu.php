<?php 
include '../config/dbcon.php';
include 'login-check.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Food Order website - Home Page</title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>
	<!-- Menu section start -->
	<div class="menu text-center">
		<div class="wrapper">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="manage-admin.php">Admin</a></li>
				<li><a href="manage-category.php">Caregory</a></li>
				<li><a href="manage-food.php">Food</a></li>
				<li><a href="manage-order.php">Order</a></li>
				<li><a href="logout.php">Logout</a></li>

			</ul>
		</div>
	</div>
	<!-- Menu section end -->
</body>
</html>