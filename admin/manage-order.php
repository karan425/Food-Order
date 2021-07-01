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
			<h1>Manage Order</h1><br><br><br>
			<?php 
			if (isset($_SESSION['update'])) {
				# code...
				echo $_SESSION['update'];
				unset($_SESSION['update']);
			}
			 ?>
			
				<table class="tbl-full" >
				<tr>
					<th>S.N</th>
					<th>Food</th>
					<th>Price</th>
					<th>Qty</th>
					<th>Total</th>
					<th>Date</th>
					<th>Status</th>
					<th>Name</th>
					<th>Contact</th>
					<th>Email</th>
					<th>Address</th>
					<th>Action</th>
				</tr>
				<?php 
				//get all the orders from database
				$sql = "SELECT * FROM tbl_order ORDER BY id DESC";
				//execute the query
				$res = mysqli_query($con,$sql);
				//coount the rows
				$count = mysqli_num_rows($res);
				$sn = 1;
				//check whether the order is available or not
				if ($count>0) {
					# code...
					//Order is available
					while ($row=mysqli_fetch_assoc($res)) {
						# code...
						//get all the detailes
						$id = $row['id'];
						$food = $row['food'];
						$price = $row['price'];
						$qty = $row['qty'];
						$status = $row['status'];
						$order_date = $row['order_date'];
						$total = $row['total'];
						$customer_name = $row['customer_name'];
						$customer_contact = $row['customer_contact'];
						$customer_email = $row['customer_email'];
						$customer_address = $row['customer_address'];

						?>
						<tr>
							<td><?php echo $sn++; ?></td>
							<td><?php echo $food; ?></td>
							<td><?php echo $price; ?></td>
							<th><?php echo $qty; ?></th>
							<th><?php echo $total; ?></th>
							<th><?php echo $order_date; ?></th>
							<th>
								<?php 
								//Ordered,On Delivery,Delivered,Cancled
								if ($status=="Ordered") {
									# code...
									echo "<label>$status</label>";
								}elseif ($status=="On Delivery") {
									# code...
									echo "<label style='color:orange '>$status</label>";
								}elseif ($status=="Delivered") {
									# code...
									echo "<label style='color:green '>$status</label>";
								}elseif ($status=="Cancled") {
									# code...
									echo "<label style='color:red '>$status</label>";
								}


								 ?>
							</th>
							<th><?php echo $customer_name; ?></th>
							<th><?php echo $customer_contact; ?></th>
							<th><?php echo $customer_email; ?></th>
							<th><?php echo $customer_address; ?></th>
							<td>
								<a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-secondry">Update Order</a>
							</td>
						</tr>

						<?php
					}
				}else{
					//Order is not available
					echo "<tr><td colspan='12'>Order is not available</td></tr>";
				}

				 ?>
				
				
			</table>

		</div>
	</div>
	<!-- Main Content section end -->
	<?php include 'partial/footer.php' ?>

</body>
</html>