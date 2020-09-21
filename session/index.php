<?php 
session_start();
if(isset($_SESSION['email'])){
echo 'xin chao:' . $_SESSION['email'];

}
else {
	header('location:login.php');
}
 ?>
<a href="logout.php">log out</a>