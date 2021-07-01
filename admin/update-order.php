<?php include 'partial/menu.php'; ?>

<div class="main-content">
	<div class="wrapper">
		<h1>Update Order</h1><br><br>

		<?php 
		//cheack whether id is set or not
		if (isset($_GET['id'])) {
			//get the order detailes
			$id = $_GET['id'];
			//get all other detailed form the id 
			//sql query to get order deatailes
			$sql = "SELECT * FROM tbl_order WHERE id=$id";
			//execute the query
			$res = mysqli_query($con,$sql);
			//count the rows
			$count = mysqli_num_rows($res);
			//cheack whether the order is available or not
			if ($count>0) {
				# code...
				//order is available
				$row=mysqli_fetch_assoc($res);
				$food = $row['food'];
				$price = $row['price'];
				$qty = $row['qty'];
				$status = $row['status'];
				$customer_name = $row['customer_name'];
				$customer_contact = $row['customer_contact'];
				$customer_email = $row['customer_email'];
				$customer_address = $row[
					'customer_address'];
			}else{
				//order is not available
				header('location:'.SITEUTL.'admin/manage-order.php');
			}

		}else{
			//redirect to the manege order page
			header('location:'.SITEUTL.'admin/manage-order.php');
		}

		 ?>

		<form action="" method="POST">
			<table class="tbl-30">
				<tr>
					<td>Food Name: </td>
					<td><b><?php echo $food; ?></b></td>
				</tr>
				<tr>
					<td>Price: </td>
					<td><b><?php echo $price; ?></b></td>
				</tr>
				<tr>
					<td>Qty: </td>
					<td><input type="number" name="qty" value="<?php echo $qty; ?>"></td>
				</tr>
				<tr>
					<td>Status: </td>
					<td>
						<select name="status">
							<option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
							<option <?php if($status=="On Delivery"){echo "selected";} ?> value="On Delivery">On Delivery</option>
							<option <?php if($status=="Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
							<option <?php if($status=="Cancled"){echo "selected";} ?> value="Cancled">Cancled</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Customer_Name: </td>
					<td><input type="text" name="c-name" value="<?php echo $customer_name; ?>"></td>
				</tr>
				<tr>
					<td>Customer_Contact: </td>
					<td><input type="text" name="c-contact" value="<?php echo $customer_contact; ?>"></td>
				</tr>
				<tr>
					<td>Customer_Email: </td>
					<td><input type="text" name="c-email" value="<?php echo $customer_email; ?>"></td>
				</tr>
				<tr>
					<td>Customer_Address: </td>
					<td>
						<textarea name="c-address">
							<?php echo $customer_address; ?>
						</textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="hidden" name="price" value="<?php echo $price; ?>">
						<input type="submit" class="btn-secondry" name="update">
					</td>
				</tr>

			</table>

		</form>

		<?php 
		//cheaack whether update button is clicked or not
		if (isset($_POST['update'])) {
			# code...
			//get all the detailes from form
			$id = $_POST['id'];
			$price = $_POST['price'];
			$qty = $_POST['qty'];
			$total = $price*$qty;
			$status = $_POST['status'];
			$customer_name = $_POST['c-name'];
			$customer_contact = $_POST['c-contact'];
			$customer_email = $_POST['c-email'];
			$customer_address = $_POST['c-address'];
			//update the value
			$sql2 ="UPDATE tbl_order SET
			qty=$qty,
			total=$total,
			status='$status',
			customer_name='$customer_name',
			customer_contact='$customer_contact',
			customer_email='$customer_email',
			customer_address='$customer_address' WHERE id = $id";
			//execute the query
			$res2 = mysqli_query($con,$sql2);
			//cheack whether the query is updated or not
			if ($res2 == true) {
				# code...
				//updated
				$_SESSION['update']="<div class='success'>Update Successfully</div>";
				header('location:'.SITEURL.'admin/manage-order.php');
			}else{
				//not updated
				$_SESSION['update']="<div class='error'>Failed toUpdate</div>";
				 header('location:'.SITEURL.'admin/manage-order.php');
			}

			//redirect to manage order with msg
		}

		 ?>
		
	</div>
</div>
<?php include 'partial/footer.php'; ?>
