<?php 
	if(isset($_COOKIE['name']) && isset($_COOKIE['pass'])){
		echo $_COOKIE['name'];
		echo '<br>';
		echo $_COOKIE['pass'];
	}
	else{
		echo 'khong ton tai cookie';
	}
 ?>
 <a href="delete.php">huy cookie</a>
 <a href="add.php">them cooike</a>