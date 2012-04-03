<?php session_start() ?>
<!doctype html>
<html>
<head>
     <title>Lucha-Link</title>
     <link rel="stylesheet" href="etc/css/bootstrap.min.css">
	<link rel="stylesheet" href="etc/css/lucha.css">
</head>

<body>
     <div class="container-fluid">
<?php 
	include 'topbar.php';
	include 'db_connect.php';
 ?>
          <div class="row-fluid">
               <div class="span2" id="sidebar">
                    <h2>Games:</h2>
                    <ul>
				<?php
					$query = "SELECT * FROM Games ORDER BY rank DESC LIMIT 0,10";
					$result = mysqli_query($db, $query)
						or die("error querying database");
					while($row = mysqli_fetch_array($result)) {
						$game= $row['title'];
						$id = $row['titleID'];
						echo "<li><a href=gamepage.php?gameID=$id>$game</a></li>"; 
					}
				?>
					<li><a href=listAllGames.php>See all</a></li>
                    </ul>
               </div><!--sidebar-->
               <div class="span8" id="body">
                    <h1>Create an account: </h1>
                    <form class="pull-left form-stacked" action= "registerController.php" method = "POST">
                         <label for="newEmail">Email: </label>
                         <input type=text size=25 name="email" id="newEmail">
                         <label for="newPass">Password: </label>
                         <input type=password size=25 name="password" id="newPass">
                         <label for="confirmPass">Confirm Password: </label>
                         <input type=password size=25 name="confirmpassword" id="confirmPass">
                         <input class="btn primary" type=submit name=submit value="Create Account">
                    </form>
				<h2>About</h2>
				<p>Lucha-Link is a place to play games. As you play more games, Luchalink will maintain a rating of your skills. We can use this to connect you with well matched opponents.  Make an account, check out <a href=listAllGames.php>our games</a> or, if you're a developer go check out our <a href=devPages.php>developer pages</a> and get your game on Luchalink!</p>

               </div><!--body-->
          </div><!--row-fluid-->
     </div><!--container-fluid-->

</body>
</html>

