<?php 
//include dbcon.php file here
include '../config/dbcon.php';

//get the id of admin to be deleted
$id = $_GET['id'];
$sql = "DELETE FROM tbl_admin WHERE id=$id";

//execute the query
$res = mysqli_query($con,$sql);

//cheack wehere the query entered successfully or not
if ($res==true) {
	# code...
	//deleted admin
	// create session veriable to disply msg
	$_SESSION['delete']=' <div class="success">Admin Deleted successfully</div>
';
	header('location:'.SITEURL.'admin/manage-admin.php');
}else{
	$_SESSION['delete']='<div class="error">Failed to Delete Admin. Try Again Later</div>';
	header('location:'.SITEURL.'admin/manage-admin.php');
}

//we need to sql query to delete admin
//redirect to manage-admin page with msg either successes or not




 ?>
