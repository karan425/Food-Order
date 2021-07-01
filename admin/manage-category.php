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
			<h1>Manage Category</h1><br>
			<?php 
				if (isset($_SESSION['add-category'])) {
					# code...
					echo $_SESSION['add-category'];
					unset($_SESSION['add-category']);
				}
				if (isset($_SESSION['category-delete'])) {
					# code...
					echo $_SESSION['category-delete'];
					unset($_SESSION['category-delete']);
				}
			 ?><br><br>

			<!-- Button for adding admin-->
			<a href="add-category.php" class="btn-primery ">Add Category</a><br><br><br>
			
				<table class="tbl-full">
				<tr>
					<th>S.N</th>
					<th>Title</th>
					<th>Image</th>
					<th>Featured</th>
					<th>Active</th>
				</tr>
				<?php 
					$sql = "SELECT * FROM tnl_category";
					$res = mysqli_query($con,$sql);
					$count = mysqli_num_rows($res);
					$sn =1;
					if ($count>0) {
						# code... 
						while ($row = mysqli_fetch_assoc($res)) {
							# code...
							$id = $row['id'];
							$title = $row['title'];
							$image = $row['image_name'];
							$featured = $row['featured'];
							$active = $row['active'];
							?>
							<tr>
								<td><?php echo $sn++; ?></td>
								<td><?php echo $title; ?></td>

								<td><img src="../images/category/<?php echo $image; ?> " style="width: 70px;"></td>

								<td><?php echo $featured; ?></td>
								<td><?php echo $active; ?></td>
								<td>
								<a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondry">Update Category</a>
								<a href ="<?php echo SITEURL;?>admin/delete-category.php?id=<?php echo $id;?>&image_name=<?php echo $image; ?>" class="btn-denger">Delete Category</a>
								</td>
							</tr>
							<?php
						}

					}else{
						//we will display the msg in the table
						?>
						<tr>
							<td><div class="error">No Category Added</div></td>
						</tr>
						<?php

					}


				 ?>
				
				
			</table>

		</div>
	</div>
	<!-- Main Content section end -->
	<?php include 'partial/footer.php' ?>

</body>
</html>