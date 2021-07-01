<?php 
include '../config/dbcon.php';

if (isset($_GET['id']) && isset($_GET['img_name'])) {
	# code...
	//get id and image name
	$id = $_GET['id'];
	$image_name = $_GET['image_name'];
	//remove the image if aviable
	if ($image_name != "") {
		# code...
		//it has image we need to delete from folder

		$path = "../images/food/$image_name";
		//remove image file from folder
		$remove  = unlink($path);

	}

	//delete food from database
	$sql = "DELETE FROM `tbl_food` WHERE id = $id";
	//execute the query
	$res = mysqli_query($con,$sql);
	if ($res==true) {
		# code...
		$_SESSION['delete']='<div class="success">Food deleted successfully</div>';
		header('location:'.SITEURL.'admin/manage-food.php');
	}else{
		$_SESSION['delete']='<div class="error">Falied to delete food</div>';
		header('location:'.SITEURL.'admin/manage-food.php');
	}
	//redirect to manage food 
}else{
	$_SESSION['delete']='<div class="error">Anothoraised Access</div>';
	header('location:'.SITEURL.'admin/manage-food.php');	
}

 ?>
