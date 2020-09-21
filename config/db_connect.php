<?php	//mySQLI or PDO
//connect to database
$conn = mysqli_connect('localhost','root','thuclinh','pizza');
//check connection
if(!$conn){
	echo 'connection error: ' . mysqli_connect_errors();
	die();
}
?>