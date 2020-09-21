<?php
session_start();

include('../config/db_connect.php');?>

<?php 

	$errors = array('eamil' => '','password' => '','false' => '');
	if(isset($_POST['submit'])){
		if(empty($_POST['email'])){
			$errors['email'] = 'email không được để trống';
		}
		else{
			$email = $_POST['email'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] = 'không đúng định dạng email';
			}
		}
		if(empty($_POST['password'])){
			$errors['password'] = 'password không được để trống';
		}
		else{
			$password = $_POST['password'];
			if(!preg_match('/^([a-zA-Z0-9])+$/',$password)){
				$errors['password'] ='password không bao gồm khoảng trắng';
			}
		}
		if (array_filter($errors)) {
			// echo 'errors in the form';
		}
		else{
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$password = mysqli_real_escape_string($conn, $_POST['password']);
			$password = md5($password);
			$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
			$result = mysqli_query($conn,$sql);
			$user = mysqli_fetch_assoc($result);
			

			if($user){
				$_SESSION['user'] = $user['name'];
				header('location:index.php');
			}
			else{
				$errors['false'] = 'đăng nhập thất bại';
			}
		}
		
	}
 ?> 
<?php
	
?>
<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
	<section class="container grey-text">
		<h4 class="center">login</h4>
			<div class="red-text center"> <?php echo $errors['false']; ?> </div>

		<form action="login.php" class="white" method="POST">
			<label>Your Email:</label>
			<input type="text" name="email" >
			<div class="red-text"> <?php echo $errors['email']; ?> </div>
			<label>password:</label>
			<input type="text" name="password">
			<div class="red-text"> <?php echo $errors['password']; ?> </div>


			<div class="center">
				<input type="submit" name="submit" value="login" class="btn brand">
			</div>
		</form>
	</section>

<?php include('footer.php');?>
