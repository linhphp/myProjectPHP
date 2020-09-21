<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>create new cookie</title>
</head>
<body>
	<form action="add.php" method="post">
		name: <input type="text" name="name">
		pass: <input type="text" name="pass">
		<input type="submit" name="submit" value="submit">
	</form>
	<?php if(isset($_POST['submit'])){
		setcookie('name', $_POST['name'], time()+15);
		setcookie('pass', $_POST['pass'], time()+15);
		header("Location:index.php");
	} ?>
</body>
</html>