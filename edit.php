<?php 
session_start();
if(isset($_SESSION['user'])){
include "config/db_connect.php";
	if(isset($_GET['id'])){
		$edit_id = mysqli_real_escape_string($conn, $_GET['id']);
		$sql = "SELECT title, email, id, ingredients FROM pizza WHERE id = $edit_id";
		$result = mysqli_query($conn,$sql);
		$product = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		mysqli_close($conn);
	}
	$errors = array('email'=> '','title' => '', 'ingredients' => '');
	$title =$email = $ingredients = '';
	// update

	if(isset($_POST['submit'])){
		//check email
		if (empty($_POST['email'])) {
			$errors['email'] = 'An email is required <br>';
		}
		else{
			$email = $_POST['email'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] = 'Email must be a valid email address';
			}
		}
		//check title
		if (empty($_POST['title'])) {
			$errors['title'] = 'A title is required <br>';		
		}
		else{
			$title = $_POST['title'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $title))
				$errors['title'] = 'title must be letters spaces only';
		}
		//check ingredients
		if (empty($_POST['ingredients'])) {
			$errors['ingredients'] = 'A ingredients is required <br>';		
		}
		else{
			$ingredients = $_POST['ingredients'];
			if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-z]*)*$/', $ingredients)) {
				$errors['ingredients'] = 'ingredients must be a comma separated list';
			}
		}

		if (array_filter($errors)) {
			// echo 'errors in the form';
		}
		else{
			$id_update = mysqli_real_escape_string($conn, $_POST['id_update']);
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$title = mysqli_real_escape_string($conn, $_POST['title']);
			$ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);
			//update
			$sql = "UPDATE pizza SET title = '$title', email = '$email',ingredients = '$ingredients' WHERE id = $id_update";
			if(mysqli_query($conn, $sql)){
				header('Location:templade/index.php');
			}
			else{
				echo 'query error: ' . mysqli_error($conn);
			}
		}
	}
 ?>
 <!DOCTYPE html>
 <html>
 	<?php include('templade/header.php') ?>

 	<section class="container grey-text">
		<h4 class="center">Edit a product</h4>
		<form action="edit.php" class="white" method="POST">
			<input type="hidden" name="id_update" value="<?php echo $product['id']; ?>">
			<label>Your Email:</label>
			<input type="text" name="email" value="<?php echo htmlspecialchars($product['email']); ?>">
			<div class="red-text"> <?php echo $errors['email']; ?> </div>
			<label>title pro:</label>
			<input type="text" name="title" value="<?php echo htmlspecialchars($product['title']); ?>">
			<div class="red-text"> <?php echo $errors['title']; ?> </div>

			<label>Ingredients (comma separated)</label>
			<input type="text" name="ingredients" value="<?php echo htmlspecialchars($product['ingredients']); ?>">
			<div class="red-text"> <?php echo $errors['ingredients']; ?> </div>

			<div class="center">
				<input type="submit" name="submit" value="update" class="btn brand">
			</div>
		</form>
	</section>

 	<?php include('templade/footer.php') ?>

 </html>
 <?php } else{
	header('location:templade/login.php');
} ?>