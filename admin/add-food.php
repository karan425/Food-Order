<?php include 'partial/menu.php'; ?>

<div class="main-content">
	<div class="wrapper">
		<h1>Add Food</h1><br><br>

		<form action="" method="post" enctype="multipart/form-data">
			<table class="tbl-30">
				<tr>
					<td>Title: </td>
					<td><input type="text" name="title" placeholder="Title of the food"></td>
				</tr>
				<tr>
					<td>Description: </td>
					<td><textarea name="description" rows="3" placeholder="Description of the food"></textarea></td>
				</tr>
				<tr>
					<td>Price: </td>
					<td><input type="number" name="price"></td>
				</tr>
				<tr>
					<td>Image: </td>
					<td><input type="file" name="image"></td>
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
										<option value="<?php echo $id; ?>"><?php echo $title; ?></option>
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
						<input type="radio" name="featured" value="yes">Yes
						<input type="radio" name="featured" value="no">No
					</td>
				</tr>
				<tr>
					<td>Active: </td>
					<td>
						<input type="radio" name="active" value="yes">Yes
						<input type="radio" name="active" value="no">No
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" name="submit" value="Add Food" class="btn-secondry">
					</td>
				</tr>
			</table>
		</form>



		<?php 
		//whether the button is clicked or not
		if (isset($_POST['submit'])) {
			# code...
			//add the food in database
			//get the data from form
			$title  = $_POST['title'];
			$description = $_POST['description'];
			$price = $_POST['price'];
			$category = $_POST['category'];

			//wheter the radio is checked or not
			if (isset($_POST['featured'])) {
				# code...
				$featured = $_POST['featured'];
			}else{
				$featured = "no";
			}

			if (isset($_POST['active'])) {
				# code...
				$active = $_POST['active'];
			}else{
				$active = "no";
			}


			//uploade the image if selecter
			//checked whether the image is ckecked or not
			if (isset($_FILES['image']['name'])) {
					# code...
					//Uploade the image
					//to upload image two thing image name  sorce name and destinamtion path
					$image_name = $_FILES['image']['name'];
					//auto rename section
					// $ext = end(explode(".", $image_name));
					// $image_name = "food_category".rand(000,999).'.'.$ext;

					$source_path = $_FILES['image']['tmp_name'];
					$destination_path = "../images/food/$image_name";

					//Uploade the image
					move_uploaded_file($source_path,$destination_path);

			
			}else{
				$imagename = "";//satting default valuer as blank
			}

			//insert into database
			// echo $title;
			// echo $description;
			// echo $price;
			// echo $category;
			// echo $featured;
			// echo $active;
			// echo $image_name;
			$sql2 = "INSERT INTO `tbl_food`(`title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES ('$title','$description','$price','$image_name','$category','$featured','$active')";
			$res2 = mysqli_query($con,$sql2);
			if ($res2 == true) {
				# code...

				$_SESSION['add']='<div class="success">Food Added Successfully</div>';
				header('location:'.SITEURL.'admin/manage-food.php');
			}else{
				$_SESSION['add']='<div class="error">Failed to add food</div>';
				header('location:'.SITEURL.'admin/manage-food.php');
			}

			//redirect withe msg 


		}


		 ?>




	</div>
	
</div>


<?php include 'partial/footer.php'; ?>
