<?php session_start();

include "db_connect.php";

$email = $_GET['email'];
$pw = $_GET['password'];

$query = "SELECT email, display_name FROM Users WHERE email = '$email' AND password = '$pw'";
$result = mysqli_query($db, $query);

if ($row = mysqli_fetch_array($result)){

	$_SESSION['current_user'] = $email;
	$_SESSION['user_name'] = $row['display_name'];
	header("Location: playerProfile.php");
	exit();
}
else{
	header("Location: index.php?error=badlogin");
	exit();
}

?>
