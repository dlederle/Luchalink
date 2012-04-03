<?php
	session_start();
	include "db_connect.php";
	$currGame = $_GET['gameID'];
	if(isset($currGame)) {
		$query = "SELECT title, rating, path, author, description FROM Games WHERE titleID = '$currGame'";
		$result = mysqli_query($db, $query);
		if($row = mysqli_fetch_array($result)) {
			$gameTitle = $row['title'];
			$rating = $row['rating'];
			$path = $row['path'];
			$author = $row['author'];
			$desc = $row['description'];
		}
	}
	else {
		header("Location: index.php");
	}
?>
<!doctype html>
<html>
<head>
<title> <?php echo $gameTitle ?> | Lucha-Link</title>
     <link rel="stylesheet" href="etc/css/bootstrap.min.css">
     <link rel="stylesheet" href="etc/css/lucha.css">
	<script src="etc/js/jquery-1.7.1.min.js"></script>
	<script src="etc/js/jquery.colorbox-min.js"></script>
</head>

<body>
     <div class="container-fluid">
	<?php include("topbar.php");?>
         <div class="row-fluid">
               <div class="span2" id="sidebar">
                    <h2>Highscores:</h2>
                    <ul>
			<!--
			 <li><a href="playerProfile.html?id=someid">Dylan Rox</a></li>
                         <li><a href="playerProfile.html?id=someotherid">Kevin doesn't</a></li>
			 <li>Nobody else plays the dumb game</li>
			-->
			<?php
				#Display high scores for the game for each user that plays the game
				$query = "SELECT * FROM Avatars INNER JOIN Games ON Avatars.game_id = '$currGame';";
					$result = mysqli_query($db, $query)
						or die("error querying database");
					echo "<h4>Name | Wins/Losses</h4>";
					#Highscore table
					while($row = mysqli_fetch_array($result)) {
						$avatar= $row['user_name'];
						$wins = $row['wins'];
						$losses = $row['losses'];
						//$wLRatio = $wins/$losses;
						#echo "<li><a href=gamepage.php?gameID=$avatar>$wLRatio</a></li>"; 
						echo "$avatar | $wins/"."$losses <br />";
					}
			?>
                    </ul>
               </div><!--sidebar-->
 
			<div class="span8" id="body">
				<div id="title-box">
					<h1><?php echo $gameTitle ?></h1>
					<h3>Made by: <?php echo $author ?></h3>
					<p><?php echo "$desc"?></p>
				</div>
<?php
					if(isset($id)) {
						//Check if current player has joined the game
		$query1 = "SELECT * FROM Avatars WHERE Avatars.game_id = '$currGame' AND Avatars.owner_id = $id";
		$result1 = mysqli_query($db, $query1);
		//if($result1) {
		if($row = mysqli_fetch_array($result1)) {
			$userName = $row['user_name'];
			echo "<h2>Welcome back, $userName</h2>"
?>
		<h3><a href='<?php echo "$path$currGame.html" ?>' id="launchLink">Launch Rock, Paper, Shotgun</a></h3>
<script>
$(document).ready(function () {
	$('#launchLink').colorbox({height: "85%", width: "85%"});
});
</script>
<?php
		} else {
?>
	<h2>Join This Game!</h2>	
<?php
//echo "<form class='pull-left form-stacked' action='joinGameController.php?game=$currGame&player=$id' method = 'GET'>";
?>
	<form class='pull-left form-stacked' action='joinGameController.php' method = 'GET'>
<?php
	echo "<input type='hidden' name='game' value=$currGame>";
	echo "<input type='hidden' name='player' value=$id>";
?>
		<label for="username">Desired Username: </label>
		<input type=text size=20 name="username">	
		<input class="btn primary" type=submit value="Join this game">
	</form>
<?php
		}
	} else {
		echo "<h3>Please log in to play this game!</h3>";
	}
?>
               </div><!--body-->
          </div><!--row-fluid-->
     </div><!--container-fluid-->
</body>
</html>
