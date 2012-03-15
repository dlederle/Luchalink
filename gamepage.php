<!doctype html>
<html>
<head>
	<title>Rock, Paper, Shotgun | Lucha-Link</title>
	<!--Pull the title from Db-->
     <link rel="stylesheet" href="etc/css/bootstrap.min.css">
     <link rel="stylesheet" href="etc/css/lucha.css">
	<script src="etc/js/jquery-1.7.1.min.js"></script>
	<script src="etc/js/jquery.colorbox-min.js"></script>
</head>

<body>
     <div class="container-fluid">
          <div class="row" id="topbar">
               <div class="span4" id="logo">
                    <h2><a href="index.html">Lucha-Link</a></h2>
               </div>
               <div id="login">
                    <form class="pull-right form-stacked" action="SOMELOGOUT.php" method = "GET">
                         <a href="playerProfile.html?id=myid">My Profile</a>
                         <a href="dashboard.html">My Dashboard</a>
                         <input class="btn primary" type=submit name=submit value = "Log Out">
                    </form>
               </div><!--login-->
          </div><!--topbar-->
          <div class="row-fluid">
               <div id="title-box">
                    <h1>Rock, Paper, Shotgun</h1>
                    <h3>Made by: <a href="authorProfile.html">Dlederle</a></h3>
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
                    <h3><a href="games/rps/rps.html" id="launchLink">Launch Rock, Paper, Shotgun</a></h3>
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
