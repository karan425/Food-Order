<?php include 'partial/menu.php'; ?>

	<div class="main-content">
		<div class="wrapper">
			<h1>Add Categort</h1> <br><br>

			<?php 
				if (isset($_SESSION['add-category'])) {
					# code...
					echo $_SESSION['add-category'];
					unset($_SESSION['add-category']);
				}
				if (isset($_SESSION['upload'])) {
					# code...
					echo $_SESSION['upload'];
					unset($_SESSION['upload']);
				}

			 ?>

			<!-- Add  category form start -->
			<form action="" method="post" enctype="multipart/form-data">
				<table class="tbl-30">
					<tr>
						<td>Title: </td>
						<td><input type="text" name="title" placeholder="Category title"></td>
					</tr>
					<tr>
						<td>Select Image: </td>
						<td><input type="file" name="image" placeholder="Select Image"></td>
					</tr>
					<tr>
						<td>Featured: </td>
						<td>
							<input type="radio" name="featured" value="yes"> Yes
							<input type="radio" name="featured" value="no"> No
						</td>
					</tr>
					<tr>
						<td>Active</td>
						<td>
							<input type="radio" name="active" value="yes">Yes
							<input type="radio" name="active" value="no">No

						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input class="btn-secondry " type="submit" name="submit" value="submit">
						</td>
					</tr>

				</table>
			</form>

			<!-- Add  category form start -->

			<?php 

			//whether the button is clicked or not
			if (isset($_POST['submit'])) {
				# code...
				//get the value from category form
				$title = $_POST['title'];

				//for radio input tag 
				if (isset($_POST['featured'])) {
					# code...
					$featured = $_POST['featured']; 
				}else{
					//set the defaild value
					$featured = "no";
				}
				if (isset($_POST['active'])) {
					# code...
					$active = $_POST['active'];
				}else{
					//set the deraild value
					$active = "no";
				}

				//whether the image is selected or not
				// print_r($_FILES['image']);
				// die();
				if (isset($_FILES['image']['name'])) {
					# code...
					//Uploade the image
					//to upload image two thing image name  sorce name and destinamtion path
					$image_name = $_FILES['image']['name'];
					//auto rename section
					$ext = end(explode(".", $image_name));
					$image_name = "food_category".rand(000,999).'.'.$ext;

					$source_path = $_FILES['image']['tmp_name'];
					$destination_path = "../images/category/$image_name";

					//Uploade the image
					move_uploaded_file($source_path,$destination_path);
					
					 
				}else{
					//dont uploade image 
					$image_name ="";
				}
				//create sql query 
				$sql = "INSERT INTO `tnl_category`(`title`,`image_name`,`featured`, `active`) VALUES ('$title','$image_name','$featured','$active')";
				//Execute the quert and save the data
				$res = mysqli_query($con,$sql);
				//whether the query is exucted or not
				if ($res == true) {
					# code...
					$_SESSION['add-category']='<div class="success">Category Added Successfully</div>';
					header('location:'.SITEURL.'admin/manage-category.php');
				}else{
					//failed to add - category
					$_SESSION['add-category']='<div class="error">Failed to Added Category</div>';
					header('location:'.SITEURL.'admin/add-category.php');
				}

			}
			 ?>

		</div>

	</div>

<?php include 'partial/footer.php';?>