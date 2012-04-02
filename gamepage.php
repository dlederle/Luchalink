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
               <div id="title-box">
			<h1><?php echo $gameTitle ?></h1>
			<h3>Made by: <a href="authorProfile.html"><?php echo $author ?></a></h3>
               </div>
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
					echo "<br>Name:		Wins/Losses</br>";
					while($row = mysqli_fetch_array($result)) {
						$avatar= $row['user_name'];
						$wins = $row['wins'];
						$losses = $row['losses'];
						$wLRatio = $wins/$losses;
						#echo "<li><a href=gamepage.php?gameID=$avatar>$wLRatio</a></li>"; 
						echo "<br>$avatar		$wins/"."$losses</br>";
					}
			?>
                    </ul>
               </div><!--sidebar-->
 
               <div class="span8" id="body">
				<p><?php echo "$desc"?></p>
<?php
	if($id)
?>
		<h3><a href='<?php echo "$path$currGame.html" ?>' id="launchLink">Launch Rock, Paper, Shotgun</a></h3>
<script>
$(document).ready(function () {
	$('#launchLink').colorbox({height: "85%", width: "85%"});
});
</script>
               </div><!--body-->
          </div><!--row-fluid-->
     </div><!--container-fluid-->
</body>
</html>
