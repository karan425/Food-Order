<?php 
session_start();

define('SITEURL', 'http://localhost/food-order/');
define('LOCALHOST', 'localhost');
define('DB_USRNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'fooe_order');

$con = mysqli_connect(LOCALHOST,DB_USRNAME,DB_PASSWORD,DB_NAME) or die(mysqli_error());

 ?>