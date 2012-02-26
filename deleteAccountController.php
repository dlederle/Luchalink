<?php session_start(); ?>
<html>
<body>
<?php
	include "db_connect.php";

	$username = $_POST['username'];

	$query = "DETLETE FROM users WHERE username = '$username'";
	$query2 = "DELETE FROM players WHERE username = '$username'";

	$result = mysqli_query($db, $query);
	$result2 = mysqli_query($db, $query2);

	header("Location: http://localhost/LuchaLink/index.html");

?>
