<?php session_start();

include "db_connect.php";

$username = $_GET['username'];
$game = $_GET['game'];
$player = $_GET['player'];

echo "$username, $game, $player";

$query = "SELECT user_name FROM Avatars WHERE user_name = $username AND game_id = $game";
$result = mysqli_query($db, $query);

if ($result){
	echo "if";
	header("Location: gamepage.php?gameID=$game&error=duplicate");
	exit();
} else {
	echo "else";
	$query1 = "INSERT INTO Avatars (game_id, owner_id, user_name) VALUES ('$game', $player, '$username')";
	$result1 = mysqli_query($db, $query1);
	header("Location: gamepage.php?gameID=$game");
	exit();
}

?>
