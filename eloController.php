<?php	session_start();
	include "db_connect.php";
	
	$winner = $_POST[winnerUsername];
	$loser = $_POST[loserUsername];
	
	$k = 32;
	
	$query = "SELECT * FROM Avatars WHERE user_name = '$winner'";
	$query2 = "SELECT * FROM Avatars WHERE user_name = '$loser'";

	$result = mysqli_query($db, $query);
	$result2 = mysqli_query($db, $query2);

	if ($row = mysqli_fetch_array($result)){
		$winnerRank = $row['rank']
		exit();
	}
	if ($row2 = mysqli_fetch_array($result2)){
                $loserRank = $row2['rank']
                exit();
        }

	$probabiltyOfWinForWinner = 1/(1+10^(($loserRank-$winnerRank)/400));
	$probabilityOfWinForLoser = 1 - $expectedWinForWinner;

	$newRankForWinner = $winnerRank + $k(1 - $probabilityOfWinForWinner);
	$newRankForLoser = $loserRank + $k(0 - $probabilityOfWinForLoser);
	
	$query3 = "UPDATE Avatars SET rank = '$newRankForWinner' WHERE username = '$winner'";
	$query4 = "UPDATE Avatars SET rank = '$newRankForLoser' WHERE username = '$loser'";

	$result3 = mysqli_query($db, $query3);
	$result4 = mysqli_query($db, $query4);

	header("Location: ");

?php>
