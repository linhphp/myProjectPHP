<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>login | singin</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
	<div class="container">
		<h4 class="center">Login</h4>
		<form action="login.php" method="post">
				<label>Your Email:</label>
				<input type="text" name="email" placeholder="enter your email">
				<label>Your password:</label>
				<input type="text" name="pass" placeholder="enter your pass">
				<input type="submit" name="login" class="btn">
		</form>
		
	</div>
	<div class="container">
		<h4 class="center">Singin</h4>
		<form action="login.php" method="post">
				<label>Your Email:</label>
				<input type="text" name="email" placeholder="enter your email">
				<label>Your password:</label>
				<input type="text" name="pass" placeholder="enter your pass">
				<input type="submit" name="singin" class="btn">
		</form>
		
	</div>
	
	<?php 
	if (isset($_POST['singin'])) {
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['pass'] = $_POST['pass'];
	}
		if(isset($_POST['login'])){
			if(($_SESSION['email'] == $_POST['email'])&&($_SESSION['pass'] == $_POST['pass'])){
				header('location:index.php');
			}
			else {
				echo 'login error';
			}
		}
	 ?>
</body>
</html>