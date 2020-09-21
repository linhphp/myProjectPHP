<?php 
	if(isset($_COOKIE['name']) && isset($_COOKIE['pass'])){
		setcookie('name', $_POST['name'], time()-15);
		setcookie('pass', $_POST['pass'], time()-15);
	}
	header('location:index.php');
 ?>