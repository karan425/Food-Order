<?php include 'partial/menu.php'; ?>

<div class="main-content">
	<div class="wrapper">
		<h1>Update Category</h1>

		<?php 

		//check whether the id is set or not
		if (isset($_GET['id'])) {
			# code...
			//get the id selected admin
			$id = $_GET['id'];

			//ceate the query
			$sql = "SELECT * FROM tnl_category WHERE id=$id";

			//Execute the query
			$res = mysqli_query($con,$sql);
			//wether the query is executed or not
			if ($res == true) {
				# code...
				$count = mysqli_num_rows($res);
				if ($count==1) {
					# code...
					//we will get the details
					// echo "Admin Available";
					$row = mysqli_fetch_assoc($res);
				
					$title = $row['title'];
					$image = $row['image_name'];
					$featured = $row['featured'];
					$active = $row['active'];
				}else{
					header('location;'.SITEURL.'admin/manage-admin.php');
				}
			}

		}else{
			header('location:'.SITEURL.'admin/manage-category.php');
		}
		?>


		<form action="" method="post" enctype="multipart/form-data">
				<table class="tbl-30">
					<tr>
						<td>Title: </td>
						<td><input type="text" name="title" value="<?php echo $title; ?>"></td>
					</tr>
					<tr>
						<td>Current Image: </td>
						<td><img src="../images/category/<?php echo $image; ?>  " style="width: 70px;"></td>
					</tr>
					<tr>
						<td>New Image: </td>
						<td>
							<input type="file" name="image">
						</td>
					</tr>
					<tr>
						<td>Featured</td>
						<td>
							<input <?php if ($featured=="yes"){echo "Checked";} ?> type="radio" name="featured" value="yes">Yes
							<input <?php if ($featured=="no"){echo "Checked";} ?> type="radio" name="featured" value="no">No

						</td>
					</tr>
					<tr>
						<td>Active</td>
						<td>
							<input <?php if ($active=="yes"){echo "Checked";} ?> type="radio" name="active" value="yes">Yes
							<input <?php if ($active=="no"){echo "Checked";} ?> type="radio" name="active" value="no">No

						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input class="btn-secondry " type="submit" name="submit" value="submit">
						</td>
					</tr>

				</table>
			</form>
	</div>
</div>
<?php 
//check wether the button is clickd or not
	if (isset($_POST['submit'])) {
		# code...
		// echo "button clicked";
		//get all the values from form
		
		$title = $_POST['title'];
		
		$featured = $_POST['featured'];
		$active = $_POST['active'];
		

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
					$image_name =  $image;
				}

		$sql="UPDATE `tnl_category` SET `title`='$title',`image_name`='$image_name',`featured`='$featured',`active`='$active' WHERE id = $id";
		$res = mysqli_query($con,$sql);
		if ($res == true) {
			$_SESSION['update']= '<div class="success">Category Updated  Succssesfully</div>';
			header('location:'.SITEURL.'admin/manage-category.php');
		}else{
			$_SESSION['update']='<div class="error">Failed to update. Try Again Later</div>';
	header('location:'.SITEURL.'admin/manage-category.php');
		}
	}
 ?>




<?php include 'partial/footer.php' ?>