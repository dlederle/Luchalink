<!doctype html>
<html>
<head>
     <title>Create Account | Lucha-Link</title>
     <link rel="stylesheet" href="etc/css/bootstrap.min.css">
     <link rel="stylesheet" href="etc/css/lucha.css">
</head>

<body>
     <div class="container-fluid">
          <div class="row" id="topbar">
               <div class="span4" id="logo">
                    <h2><a href="index.html">Lucha-Link</a></h2>
               </div>
          </div><!--topbar-->
          <div class="row-fluid">
               <div class="span8" id="body">
                    <h1>Create a New Account</h1>
                    <form class="pull-right form-stacked" action= "registerController.php" method = "GET">
                         <label for="newEmail">Email: </label>
                         <input type=text size=25 name="email" id="newEmail">
                         <label for="newPass">Password: </label>
                         <input type=password size=25 name="password" id="newPass">
                         <label for="confirmPass">Confirm Password: </label>
                         <input type=password size=25 name="password" id="confirmPass">
                    </form>
               </div><!--body-->
          </div><!--row-fluid-->
     </div><!--container-fluid-->

</body>
</html>

