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
			<h1>Manage Food</h1><br><br>

			<!-- Button for adding admin-->
			<a href="add-food.php" class="btn-primery ">Add Admin</a><br><br><br>

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

				 ?>
			
				<table class="tbl-full">
				<tr>
					<th>S.N</th>
					<th>Title</th>
					<th>Price</th>
					<th>Image</th>
					<th>Featured</th>
					<th>Active</th>
					<th>Action</th>
				</tr>
				<?php 
					//create sql query 
				$sql = "SELECT * FROM tbl_food";
				$res = mysqli_query($con,$sql);
				$count = mysqli_num_rows($res);
				$si = 1;
				if ($count > 0) {
					# code...
					while ($row = mysqli_fetch_assoc($res)) {
						# code...
						$id = $row['id'];
						$title = $row['title'];
						$Price = $row['price'];
						$image_name = $row['image_name'];
						$featured  = $row['featured'];
						$active = $row['active'];
						?>
							<tr>

								<td><?php echo $si++; ?></td>
								<td><?php echo $title; ?></td>
								<td><?php echo $Price; ?></td>
								<td><img src="../images/food/<?php echo $image_name; ?> " style="width: 70px;"></td>
								<td><?php echo $featured; ?></td>
								<td><?php echo $active; ?></td>
								<td>
									<a href="update-food.php?id=<?php echo $id;?>" class="btn-secondry">Update Food</a>
									<a href="delete-food.php?id=<?php echo $id;?>&img_name=<?php echo $image_name; ?>" class="btn-denger">Delete Food</a>
								</td>
				
							</tr>

						<?php
					}
				}else{
					echo "<tr><td colspan='7' class='error'>Food Not Added yet</td></tr>";
				}

				 ?>
				
				
			</table>

		</div>
	</div>
	<!-- Main Content section end -->
	<?php include 'partial/footer.php' ?>

</body>
</html>
