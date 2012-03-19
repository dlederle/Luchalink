<?php session_start() ?>
<!doctype html>

<html>
<head>
     <title>Dashboard | Lucha-Link</title>
     <link rel="stylesheet" href="etc/css/bootstrap.min.css">
     <link rel="stylesheet" href="etc/css/lucha.css">
</head>

<body>
     <div class="container-fluid">
	<?php include 'topbar.php' ?>
          <div class="row-fluid">
		<div id="title-box">
                    <h1><?php echo $name ?></h1>
                </div>
		<div class="span3" id="sidebar">
                    <h1>HERE BE THEIR PROFILE PIC</h1>
			<form action="updateProfileController.php" method=POST>
				Update Profile Picture: <input type="file" name="profPic"><br>
				Change Display Name: <input type="text" name="displayName"><br>
				Update E-mail: <input type="text" name="email"><br>
				<input type="submit" name="submit" value=update><br>
			</form>


		<form action="deleteAccountController.php" method=POST>
			<input type = "submit" name="GET PWNED" value="Delete Account">
		</form>
               </div><!--sidebar-->
          </div><!--row-fluid-->
     </div><!--container-fluid-->

</body>
</html>

