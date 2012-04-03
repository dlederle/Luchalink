<?php
if(isset($_SESSION['user_name']) && isset($_SESSION['pid'])) {
	$name = $_SESSION['user_name'];
	$id = $_SESSION['pid'];
	
?>

 	  <div class="row" id="topbar">
               <div class="span4" id="logo">
                    <h2><a href="index.php">Lucha-Link</a></h2>
               </div>
               <div id="login">
                    <form class="pull-right form-stacked" action="logout.php" method = "POST">
				<a href="playerProfile.php?id=<?php echo $id ?>">My Profile</a>
                         <a href="dashboard.php">My Dashboard</a>
                         <input class="btn primary" type=submit name=submit value = "Log Out">
                    </form>
               </div><!--login-->
          </div><!--topbar-->

<?php   }
	else{
?>

	  <div class="row" id="topbar">
               <div class="span4" id="logo">
                    <h2><a href="index.php">Lucha-Link</a></h2>
               </div>
               <div id="login">
               <form class="pull-right form-stacked" action="loginController.php" method = "GET">
                    <label for="topbarEmail">Email: </label>
                    <input type=text size=25 name="email" id="topbarEmail">
                    <label for="topbarPass">Password: </label>
                    <input type=password size=25 name="password" id="topbarPass">
                    <input class="btn primary" type=submit name=submit value="Log In">
               </form>
               </div><!--login-->
          </div><!--topbar-->
<?php } ?>
