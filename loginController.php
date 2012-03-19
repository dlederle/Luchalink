<?php session_start();

include "db_connect.php";

$email = $_GET['email'];
$pw = $_GET['password'];

$query = "SELECT Users.player_id, Users_info.display_name FROM Users NATURAL JOIN Users_info WHERE Users_info.email = '$email' AND Users_info.password = '$pw'";
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
