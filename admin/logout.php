<?php 
include '../config/dbcon.php';
	//destry the session 
session_destroy();

header('location:'.SITEURL.'admin/login.php');
 ?>