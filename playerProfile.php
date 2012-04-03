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
               <div class="span2" id="sidebar">
                    <img src="luchaMask.png"/>
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
                    <ul>

               </div><!--sidebar-->
 
               <div class="span8" id="body">
               <div id="title-box">
                    <h1><?php echo $name ?></h1>
               </div>
                    I'm  not entirely sure what goes here.
                    Probably all the games they play, most recent matches, short self-description?
               </div><!--body-->
          </div><!--row-fluid-->
     </div><!--container-fluid-->

</body>
</html>

