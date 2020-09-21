<?php 
session_start();
if(isset($_SESSION['user'])){
	include('../config/db_connect.php');
 ?>
<?php 
	
	if(isset($_POST['delete'])){
		$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_delete']);
		$sql = "DELETE FROM pizza WHERE id = $id_to_delete";
		if(mysqli_query($conn, $sql)){
			header('Location:../templade/index.php');
		}
		else{
			echo 'query error: ' . mysqli_error($conn);
		}
	}

	if(isset($_GET['id'])){
		$id = mysqli_real_escape_string($conn, $_GET['id']);
		//query database
		$sql = "SELECT * FROM pizza WHERE id = $id";

		$result = mysqli_query($conn, $sql);
		$product = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
		mysqli_close($conn);
	}

 ?>
 <!DOCTYPE html>
<html>
	<?php include('../templade/header.php') ?>

	<div class="container center">
		<h4><?php echo htmlspecialchars($product['title']); ?></h4>
		<p>email: <?php echo htmlspecialchars($product['email']); ?></p>
		<p>created at: <?php echo htmlspecialchars($product['created_at']); ?></p>
		<h5>ingredients:  <?php echo htmlspecialchars($product['ingredients']); ?> </h5>
		<a href="../../php_sun/edit.php?id=<?php echo $product['id'] ?>" class="btn brand-text z-depth-0">edit</a>
		<form style="display: inline;" action="detail.php" method="POST">
			<input type="hidden" name="id_delete" value="<?php echo htmlspecialchars($product['id']) ; ?>">
			<input type="submit" name="delete" value="delete" class="btn brand z-depth-0">
		</form>
	</div>

	<?php include('../templade/footer.php'); ?>
	<?php } else{
	header('location:login.php');
} ?>