<?php session_start() ?>

<!doctype html>
<html>
<head>
     <title>SOMEBODY's profile | Lucha-Link</title>
     <link rel="stylesheet" href="etc/css/bootstrap.min.css">
     <link rel="stylesheet" href="etc/css/lucha.css">
</head>

<?php 
	$name = $_SESSION['user_name'];
?>

<body>
     <div class="container-fluid">
          <div class="row" id="topbar">
               <div class="span4" id="logo">
                    <h2><a href="index.html">Lucha-Link</a></h2>
               </div>
               <div id="login">
                    <form class="pull-right form-stacked" action="logout.php" method = "POST">
                         <h3>Pretend you're logged in :) </h3>
                         <a href="playerProfile.html?id=myid">My Profile</a>
                         <a href="dashboard.html">My Dashboard</a>
                         <input class="btn primary" type=submit name=submit value = "Log Out">
                    </form>
               </div><!--login-->
          </div><!--topbar-->
          <div class="row-fluid">
               <div id="title-box">
                    <h1>PLAYERS NAME</h1>
               </div>
               <div class="span2" id="sidebar">
                    <h1>HERE BE THEIR PROFILE PIC</h1>
                    <h2>PLAYER NAME</h2>
                    Info:
                    <ul>
                         <li>Some profile info</li>
                         <li>Some other profile info</li>
                    </ul>
                    Achievements:
                    <ul>
                         <li>Ranked 500000/500000 in 2 player tetris</li>
                         <li>Really bad at some other games</li>
                    <ul>

               </div><!--sidebar-->
 
               <div class="span8" id="body">
                    I'm  not entirely sure what goes here.
                    Probably all the games they play, most recent matches, short self-description?
               </div><!--body-->
          </div><!--row-fluid-->
     </div><!--container-fluid-->

</body>
</html>

