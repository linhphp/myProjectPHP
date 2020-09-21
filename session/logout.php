<?php 
session_star();
	if(isset($_SESSION['email'])){
		session_unset();
		echo 'da dang xuat';
		header('location:login.php');
	}
 ?>