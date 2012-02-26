<?php	session_start();
	include "db_connect.php";

	$email = $_POST['email'];

	$query = "DETLETE FROM Users WHERE email = '$email'";
	//$query2 = "DELETE FROM players WHERE email = '$email'";

	$result = mysqli_query($db, $query);
	//$result2 = mysqli_query($db, $query2);

	header("Location: index.html");

?>
