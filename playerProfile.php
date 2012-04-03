<?php 
	session_start();	
	include "db_connect.php";

	$profile = $_GET['id'];
	if(isset($profile)) {
		$query = "SELECT display_name, first_name, last_name, description FROM Users WHERE player_id = $profile";
		$result = mysqli_query($db, $query);
		if($row = mysql_fetch_array($result)) {
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
                    <img src="luchamask.png"/>
                    <h2><?php echo $dispname ?></h2>
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
				
               	<div id="title-box">
                    	<h1><?php echo $dispname ?></h1>
               	</div>
               </div><!--body-->
          </div><!--row-fluid-->
     </div><!--container-fluid-->

</body>
</html>

