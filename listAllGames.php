<?php
	#Let's start a session
	session_start();
?>
<!doctype html>
<html>
<head>
     <title>SOME TEMP GAME | Lucha-Link</title>
     <link rel="stylesheet" href="etc/css/bootstrap.min.css">
     <link rel="stylesheet" href="etc/css/lucha.css">
</head>

<body>
     <div class="container-fluid">
          <div class="row" id="topbar">
               <div class="span4" id="logo">
                    <h2><a href="index.html">Lucha-Link</a></h2>
               </div>
               <div id="login">
                    <form class="pull-right form-stacked" action="SOMELOGOUT.php" method = "GET">
                         <h3>Pretend you're logged in :) </h3>
                         <a href="playerProfile.html?id=myid">My Profile</a>
                         <a href="dashboard.html">My Dashboard</a>
                         <input class="btn primary" type=submit name=submit value = "Log Out">
                    </form>
               </div><!--login-->
          </div><!--topbar-->
          <div class="row-fluid">
               <div id="title-box">
                    <h1>THIS IS A GAME TITLE</h1>
                    <h3>Made by: <a href="authorProfile.html">Some Author</a></h3>
               </div>
               <div class="span2" id="sidebar">
                    <h2>Highscores:</h2>
                    <ul>
                         <li><a href="playerProfile.html?id=someid">Dylan Rox</a></li>
                         <li><a href="playerProfile.html?id=someotherid">Kevin doesn't</a></li>
                         <li>Nobody else plays the dumb game</li>
                    </ul>
               </div><!--sidebar-->
 
               <div class="span8" id="body">
                    <p>Blah blah, game description, this is a cool game, and amazing things happen and you should play etc</p>
                    <h3><a href="im-not-sure">Launch *SOME GAME*</a></h3>
                    And it should probably lightbox up over top of stuff, but i dunno how to do that, or if its even possible with html5 games...but il figure it out laters
			<?php
				include 'db_connect.php';
				#Query for, and echo, all the games available
				$query = "SELECT * FROM Games;";
				$result = mysqli_query($db,$query)
   					or die("Error Querying Database");
				echo "Here's all the games on Luchalink:";
   				echo "<table id=\"hor-minimalist-b\">\n<tr><th>Game</th><th>Rating</th><tr>\n\n";
				#While there's rows in the DB, echo relevant data about the games.
   				while($row = mysqli_fetch_array($result)) {
  					$game= $row['title'];
  					$rating= $row['rating'];
					#The width here can be adjusted to accomidate larger titles,
					#but I'm looking for a dynamically adjusting column width solution.
					echo "<tr><td  width=300>$game</td><td >$rating</td></tr>\n";
	    			}
	    			echo "</table>\n";
			?>
               </div><!--body-->
          </div><!--row-fluid-->
     </div><!--container-fluid-->

</body>
</html>

