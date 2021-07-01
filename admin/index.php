<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/admin.css">
	
	<title>Document</title>
</head>
<body>
	<?php include 'partial/menu.php'; ?>
	<!-- Main Content section start -->
	<div class="main-content">
		<div class="wrapper">
			<h1>DESHBORD</h1><br>
			<?php 
				if (isset($_SESSION['login'])) {
					# code...
					echo $_SESSION['login'];
					unset($_SESSION['login']);
				}
			 ?><br>

			<div class="col-4 text-center">
				<?php 
				//sql query
				$sql = "SELECT * FROM tnl_category";
				//execute the query
				$res = mysqli_query($con,$sql);
				//count the rows
				$count = mysqli_num_rows($res);

				 ?>
				<h1><?php echo $count; ?></h1><br>
				categoris
			</div>
			<div class="col-4 text-center">
				<?php 
				//sql query
				$sql2 = "SELECT * FROM tbl_food";
				//execute the query
				$res2 = mysqli_query($con,$sql2);
				//count the rows
				$count2 = mysqli_num_rows($res2); 
				 ?>
				<h1><?php echo $count2; ?></h1><br>
				Foods
			</div>
			<div class="col-4 text-center">
				<?php 
				//sql query
				$sql3 = "SELECT * FROM tbl_order";
				//execute the query
				$res3 = mysqli_query($con,$sql3);
				//count the rows
				$count3 = mysqli_num_rows($res3);
				 ?>
				<h1><?php echo $count3; ?></h1><br>
				Total Orders
			</div>
			<div class="col-4 text-center">
				<?php 
				//sql query
				$sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status = 'Delivered'";
				//execute the query
				$res4 = mysqli_query($con,$sql4);
				//get the values
				$rows = mysqli_fetch_assoc($res4);
				//get the total values
				$total_revenew = $rows['Total'];

				 ?>
				<h1>Rs- <?php echo $total_revenew; ?></h1><br>
				Revnew Generated 
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- Main Content section end -->
	<?php include 'partial/footer.php'; ?>


</body>
</html>