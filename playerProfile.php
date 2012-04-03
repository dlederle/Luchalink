<?php session_start() ?>

<?php 
	$name = $_SESSION['user_name'];
?>
<!doctype html>
<html>
<head>
     <title><?php echo $name ?>'s profile | Lucha-Link</title>
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
               <div class="span2" id="sidebar">
                    <h1>HERE BE THEIR PROFILE PIC</h1>
                    <h2><?php echo $name ?></h2>
                    Info:
                    <ul>
                         <li>Some profile info</li>
                         <li>Some other profile info</li>
                    </ul>
                    Achievements:
                    <ul>
                         <li>Ranked 500000/500000 in 2 player tetris</li>
                         <li>Really bad at some other games</li>
                    </ul>
		    <?php
			
			if ($_SESSION['pid'] != $_GET['id']){
   				$query1 = "SELECT * FROM Friends WHERE player_id = '$_SESSION['pid']' AND friend_id = '$_GET['id']'";
				$query2 = "SELECT * FROM Friends WHERE player_id = '$_GET['id']' AND friend_id = '$_SESSION['pid']'";

				$resultCheck = mysqli_query($db, $query1);
				$resultCheck2 = mysqli_query($db, $query2); 
	                if(!isset($resultCheck)){
	                        if (!isset($resultCheck2)){
	                                echo "<form action= \"friendController.php \" method = POST>\n
							<input type = \"hidden\" value = $_GET['id'] name= \"friend_id\">\n
							<input type = \"submit\" value = \"ADD FRIEND!\" name = submit>\n
						</form>\n
						";
	                        }   
	                        else{
	                                echo("Your already Friends with this guy!");
	                        }   
	                }   
	                else{
	                        echo("Your already friends with this guy! Part 2");
    
	                }   


			}
	


		    ?>
               </div><!--sidebar-->
 
               <div class="span8" id="body">
                    I'm  not entirely sure what goes here.
                    Probably all the games they play, most recent matches, short self-description?
               </div><!--body-->
          </div><!--row-fluid-->
     </div><!--container-fluid-->

</body>
</html>

