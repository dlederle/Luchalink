<?php session_start();

include "db_connect.php";

$email = $_POST['email'];
$pw = $_POST['password'];

$query = "SELECT * FROM Users WHERE email = '$email' AND password = '$pw'";
$result = mysqli_query($db, $query);

//echo"'$query'";

if (mysqli_fetch_array($result)){

	$_SESSION['current_user'] = $email;
	header("Location: playerProfile.php");
	exit();
}
else{
	header("Location: index.html?e=badLogin");
	exit();
}

?>
