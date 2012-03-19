<?php
	#Let's start a session
	session_start();
?>
<!doctype html>
<html>
<head>
     <title> Games | Lucha-Link</title>
     <link rel="stylesheet" href="etc/css/bootstrap.min.css">
     <link rel="stylesheet" href="etc/css/lucha.css">
</head>

<body>
	<div class="container-fluid">
			<?php
				include 'topbar.php';
				include 'db_connect.php';
				echo "<div class=row-fluid>\n";
				echo "<div class=row12 id=body>\n";
				#Query for, and echo, all the games available
				$query = "SELECT * FROM Games;";
				$result = mysqli_query($db,$query)
   					or die("Error Querying Database");
				echo "<h1>Here's all the games on Luchalink:</h1>";
   				echo "<table class=table>\n<thead>\n<tr><th>Game Title</th><th>Rating</th><th>Author</th></tr>\n</thead>\n<tbody>\n";
				#While there's rows in the DB, echo relevant data about the games.
   				while($row = mysqli_fetch_array($result)) {
  					$game= $row['title'];
  					$rating= $row['rating'];
					$author = $row['author'];
					$id = $row['titleID'];
					#The width here can be adjusted to accomidate larger titles,
					#but I'm looking for a dynamically adjusting column width solution.
					echo "<tr><td><a href=gamepage.php?gameID=$id>$game</a></td><td>$rating</td><td>$author</td></tr>\n";
	    			}
	    			echo "</tbody>\n</table>\n";
				echo "</div>\n";
				echo "</div>\n";
			?>
     </div><!--container-fluid-->
</body>
</html>

