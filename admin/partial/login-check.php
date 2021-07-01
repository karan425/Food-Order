<?php 
if (!isset($_SESSION['user'])) {
	# code...
	$_SESSION['no login msg']='<div class="error text-center">Please login to access admin panal</div>';
	header('location:'.SITEURL.'admin/login.php');
}

 ?>