<?php	session_start();
	include "db_connect.php";

	$email = $_SESSION['current_user'];
	
	$query = "DELETE FROM Users WHERE email = '$email'";
	//$query2 = "DELETE FROM players WHERE email = '$email'";
	
	
	$result = mysqli_query($db, $query);
	//$result2 = mysqli_query($db, $query2);
	



	header("Location: index.php");

?>
