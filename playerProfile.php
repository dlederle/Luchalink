<?php 
	session_start();	
	include "db_connect.php";

	$profile = $_GET['id'];
	if(isset($profile)) {
		$infoquery = "SELECT display_name, first_name, last_name, description FROM Users WHERE player_id = '$profile'";
		$inforesult = mysqli_query($db, $infoquery);
		if($row = mysqli_fetch_array($inforesult)) {
			$dispname = $row['display_name'];
			$first = $row['first_name'];
			$last = $row['last_name'];
			$description = $row['description'];
		}
	} else {
		header("Location: index.php");
	}
?>
<!doctype html>
<html>
<head>
     <title><?php echo $dispname ?>'s profile | Lucha-Link</title>
     <link rel="stylesheet" href="etc/css/bootstrap.min.css">
     <link rel="stylesheet" href="etc/css/lucha.css">
</head>


<body>
     <div class="container-fluid">
	<?php include 'topbar.php' ?>
          <div class="row-fluid">
               <div class="span2" id="sidebar">
                    <img src="luchaMask.png"/>
                    <h2><?php echo $dispname ?></h2>
                    Info:
                    <ul>
					<li>Name: <?php echo $first." ".$last ?></li>
                    </ul>
               </div><!--sidebar-->
 
               <div class="span8" id="body">
               	<div id="title-box">
                    	<h1><?php echo $dispname ?></h1>
               	</div>
					<p><?php echo $description ?></p>
               </div><!--body-->
          </div><!--row-fluid-->
     </div><!--container-fluid-->

</body>
</html>

