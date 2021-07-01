<?php 
//include dbcon.php file here
include '../config/dbcon.php';

if (isset($_GET['id']) AND isset($_GET['image_name'])) {
	# code...
		
	//get the id of admin to be deleted
	$id = $_GET['id'];
	$image_name = $_GET['image_name'];

	if ($image_name!="") {
		# code...
		$path = "../images/category/$image_name";
		//remove the image
		$remove = unlink($path);
		
	}
	$sql = "DELETE FROM tnl_category WHERE id=$id";

	//execute the query
	$res = mysqli_query($con,$sql);

	//cheack wehere the query entered successfully or not
	if ($res==true) {
		# code...
		//deleted admin
		// create session veriable to disply msg
		$_SESSION['category-delete']=' <div class="success">Category Deleted successfully</div>';
		header('location:'.SITEURL.'admin/manage-category.php');
		}else{
		$_SESSION['category-delete']='<div class="error">Failed to Delete Category. Try Again Later</div>';
		header('location:'.SITEURL.'admin/manage-category.php');
	}
}
else{
		header('location:'.SITEURL.'admin/manage-category.php');
}


 ?>