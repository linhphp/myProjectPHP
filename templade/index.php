<?php 
session_start();
if(isset($_SESSION['user'])){
include('../config/db_connect.php');


// write query for all pizzas
$sql = 'SELECT title, ingredients, id FROM pizza ORDER BY created_at';

//make query & get result
$result = mysqli_query($conn, $sql);

// //fetch th resulting rows as an array;
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
//close connection
mysqli_close($conn);

// echo '<pre>';
// print_r($pizzas);
// echo '</pre>';

// print_r(explode(',',$pizzas[0]['ingredients']));
 ?>


<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>

	<h4 class="center grey-text"> Product</h4>

	<div class="container">
		<div class="row">
			<?php foreach($pizzas as $pizza): ?>
				
				<div class="col s6 md3">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h6> <?php echo htmlspecialchars($pizza['title']); ?> </h6>
							<div> 
								<ul>
									<?php foreach(explode(',',$pizza['ingredients']) as $ing):?>
										<li><?php echo htmlspecialchars($ing); ?></li>

									<?php endforeach; ?>
								</ul>
							</div>
						</div>
						<div class="card-action right-align">
							<a href="../templade/detail.php?id=<?php echo $pizza['id']?>" class="brand-text">more info</a>
						</div>
					</div>
				</div>

			<?php endforeach; ?>
			<?php if (count($pizzas) >=3) {?>
				<p>there are 3 or more product</p>
			<?php } else{ ?>
				<p>there are less than 3 product</p>
			<?php }?>
		</div>
	</div>

	

	<?php include('footer.php'); ?>

</html>
<?php } else{
	header('location:login.php');
} ?>
