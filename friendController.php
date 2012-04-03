<?php session_start();

include "db_connect.php";

	$user_id = $_SESSION['pid'];
	$friend_id = $_POST['friend_id'];
	
	$query = "INSERT INTO Friends VALUES ('$user_id', '$friend_id')";
	$result = mysqli_query($db, $query);

	header("Location: playerProfile.php?id=$friend_id");
?>
