<?php session_start();

include "db_connect.php";

$user_email = $_SESSION['email'];
$friend_id = $_POST['friend_id'];

$usernameQuery = "SELECT player_id FROM Users WHERE email='$user_email'";
$resultName = mysqli_query($db, $usernameQuery);
if ($row1 = mysqli_fetch_array($resultName)){
	
	$friend_idQuery = "SELECT player_id FROM Users WHERE player_id='$friend_id'";
	$result_friend_id = mysqli_query($db, $usernameQuery);
	
	if ($row2 = mysqli_fetch_array($result_friend_id){
		
		$checkFriendQuery = "SELECT player_id, friend_id FROM Friends WHERE player_id='$row1' AND friend_id='$row2'";
		$checkFriendQuery2 = "SELECT player_id, friend_id FROM Friends WHERE player_id='$row2' AND friend_id='$row1'";
		
		$resultCheck = mysqli_query($db, $checkFriendQuery);
		$resultCheck2 = mysqli_query($db, $checkFriendQuery2);
		
		if(!isset($resultCheck)){
			if (!isset($resultCheck2)){
				$addFriendQuery = "INSERT INTO Friends VALUES('$row1', '$row2')";
				$addFriendResult = mysqli_query($db, $addFriendQuery);
				header("Location: index.php");
				exit();
			}
			else{
				echo("Your already Friends with this guy!");
			}
		}
		else{
			echo("Your already friends with this guy! Part 2");
			
		}
		




	} 

?>
