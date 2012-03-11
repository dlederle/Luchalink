<?php session_start();

include "db_connect.php";

$email = $_GET['email'];
$pw = $_GET['password'];

$query = "SELECT * FROM Users WHERE email = '$email' AND password = '$pw'";
$result = mysqli_query($db, $query);

//echo"'$query'";

if ($row = mysqli_fetch_array($result)){

	$_SESSION['current_user'] = $email;
	$_SESSION['user_name'] = $row['user_name'];
	header("Location: playerProfile.php");
	exit();
}
else{
	header("Location: index.html?error=badlogin");
	exit();
}

?>
