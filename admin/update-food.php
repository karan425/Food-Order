<?php include 'partial/menu.php'; ?>

<div class="main-conrent">
	<div class="wrapper">
		<h1>Update Food</h1><br><br>

		<?php 
			//check whether the id is set or not
		if (isset($_GET['id'])) {
			# code...
			//get the id selected admin
			$id = $_GET['id'];

			//ceate the query
			$sql2 = "SELECT * FROM tbl_food WHERE id=$id";

			//Execute the query
			$res2 = mysqli_query($con,$sql2);
			//wether the query is executed or not
			
			$row2 = mysqli_fetch_assoc($res2);
		
			$title = $row2['title'];
			$description = $row2['description'];
			$price = $row2['price'];
			$current_image = $row2['image_name'];
			$current_category = $row2['category_id'];
			$featured = $row2['featured'];
			$active = $row2['active'];
		}

		 ?>


		<form action="" method="post" enctype="multipart/form-data">
			<table class="tbl-30">
				
				<tr>
					<td>Title: </td>
					<td><input type="text" name="title" value="<?php echo $title; ?>"></td>
				</tr>
				<tr>
					<td>Description: </td>
					<td><textarea name="description" rows="3"><?php echo "$description"; ?></textarea></td>
				</tr>
				<tr>
					<td>Price: </td>
					<td><input type="number" name="price" value="<?php echo $price; ?>"></td>
				</tr>
				<tr>
					<td>Curren Image: </td>
					<td>
						<?php 
							if ($current_image == "") {
								# code...
								//image is available
								echo "<div class='error'>Image is not available</div>";

							}else{
								//image is not available
								?>
									<img src="<?php echo SITEURL; ?>images/food/<?php echo $current_image; ?>" style="width: 70px;">
								<?php
							}
						 ?>
					</td>
				</tr>
				<tr>
					<td>New Image: </td>
					<td><input type="file" name="new_image"></td>
				</tr>
				<tr>
					<td>Category: </td>
					<td>
						<select name="category">

							<?php 
								//dusplay category from category
								$sql = "SELECT * FROM tnl_category WHERE active='yes'";
								//this is executing qury
								$res = mysqli_query($con,$sql);
								$count = mysqli_num_rows($res);
								//if count is greater then 0
								if ($count > 0) {
									# code...
									//we have category
									while ($row = mysqli_fetch_assoc($res)) {
										# code...
										$id = $row['id'];
										$title = $row['title'];
										?>
										<option value="<?php echo $title; ?>"><?php echo $title; ?></option>
										<?php
									}
								}else{
									//we do not have category
									?>
									<option value="0">No Category</option>
									<?php
								}

							 ?>

						</select>
					</td>
				</tr>
				<tr>
					<td>Featured: </td>
					<td>
						<input <?php if ($featured=="yes"){echo "Checked";} ?> type="radio" name="featured" value="yes">Yes
						<input <?php if ($featured=="no"){echo "Checked";} ?> type="radio" name="featured" value="no">No
					</td>
				</tr>
				<tr>
					<td>Active: </td>
					<td>
						<input <?php if ($active=="yes"){echo "Checked";} ?> type="radio" name="active" value="yes">Yes
						<input <?php if ($active=="no"){echo "Checked";} ?> type="radio" name="active" value="no">No
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
						<input type="submit" name="submit" value="Add Food" class="btn-secondry">
					</td>
				</tr>
			</table>
			
		</form>
	</div>
</div>

<?php 
	if (isset($_POST['submit'])) {
		# code...
			//get all the detalils from the form
			$id = $_GET['id'];
			$title = $_POST['title'];
			$description = $_POST['description'];
			$price = $_POST['price'];
			$current_image = $_POST['current_image'];
			$category = $_POST['category'];
			$featured = $_POST['featured'];
			$active = $_POST['active'];

			//update the image if selected
			if (isset($_FILES['new_image']['name'])) {
				# code...
					//Uploade the image
					//to upload image two thing image name  sorce name and destinamtion path
					$image_name = $_FILES['new_image']['name'];
					//auto rename section
					// $ext = end(explode(".", $image_name));
					// $image_name = "food_name".rand(000,999).'.'.$ext;

					$source_path = $_FILES['new_image']['tmp_name'];
					$destination_path = "../images/food/$image_name";

					//Uploade the image
					move_uploaded_file($source_path,$destination_path);

			}else{
				$image_name = $current_image;
			}

			//update 
			$sql3 = "UPDATE `tbl_food` SET `title`='$title',`description`='$description',`price`='$price',`image_name`='$image_name',`category_id`='$category',`featured`='$featured',`active`='$active' WHERE id = $id";
			$res3 = mysqli_query($con,$sql3);
			if ($res3 == true) {
			$_SESSION['update']= '<div class="success">Food Updated  Succssesfully</div>';
			header('location:'.SITEURL.'admin/manage-food.php');
			}else{
			$_SESSION['update']='<div class="error">Failed to update. Try Again Later</div>';
			header('location:'.SITEURL.'admin/manage-food.php');
		}

	}

 ?>

<?php include 'partial/footer.php'; ?>