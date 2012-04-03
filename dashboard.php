<?php session_start() ?>
<!doctype html>

<html>
<?php include 'db_connect.php' ?>
<head>
     <title>My Dashboard | Lucha-Link</title>
     <link rel="stylesheet" href="etc/css/bootstrap.min.css">
     <link rel="stylesheet" href="etc/css/lucha.css">
</head>


<body>
     <div class="container-fluid">
	<?php include 'topbar.php' ?>
          <div class="row-fluid">
<?php  
	$query = "SELECT email, profile_pic FROM Users WHERE player_id = '$id'";
	$result = mysqli_query($db, $query);

	if ($row = mysqli_fetch_array($result)){
		$email = $row['email'];
		$pic = $row['profile_pic'];
	}

//	$imgFile = fopen("images/".$id, "r");	
//	$profPic = fgets($imgFile);
//	fclose($imgFile);
?>
		<div class="span2" id="sidebar"><br/>
			<form action="deleteAccountController.php" method=POST>
				<input class="btn btn-danger" type="submit" name="GET PWNED" value="Delete Account">
			</form>
                </div><!--sidebar-->

		<div class="span8" id="dash">
			<div id="title-box">
                    		<h1><?php echo $name ?></h1>
                	</div>

			<img height=500 width=200 src="luchamask.png"/><br/>			
			<form action="updateProfileController.php" method=POST>
				Update Profile Picture: <input type="file" enctype="multipart/form-data" name="profPic"><br/>
				Change Display Name: <input type="text" name="displayName" value=<?php echo $name ?>><br/>
				Update E-mail: <input type="text" name="email" value=<?php echo $email ?>><br/>
				<input type="submit" name="submit" value=update><br/>
			</form>

               </div><!--body-->




          </div><!--row-fluid-->
     </div><!--container-fluid-->

</body>
</html>

