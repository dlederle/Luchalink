<!doctype html>
<html>
<head>
     <title>Lucha-Link</title>
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
               <form class="pull-right form-stacked" action="loginController.php" method = "GET">
                    <label for="topbarEmail">Email: </label>
                    <input type=text size=25 name="email" id="topbarEmail">
                    <label for="topbarPass">Password: </label>
                    <input type=password size=25 name="password" id="topbarPass">
                    <input class="btn primary" type=submit name=submit value="Log In">
               </form>
               </div><!--login-->
          </div><!--topbar-->
          <div class="row-fluid">
               <div class="span2" id="sidebar">
                    <h2>Games:</h2>
                    <ul>
                         <li>Oh woops, we don't have any games yet</li>
                         <li><a href="gamepage.php">Temp Game Page</a></li>
                         <li>But if we did, they could scroll up here</li>
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

               </div><!--body-->
          </div><!--row-fluid-->
     </div><!--container-fluid-->

</body>
</html>
