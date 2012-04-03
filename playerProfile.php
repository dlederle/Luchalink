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
                    <ul>

               </div><!--sidebar-->
 
               <div class="span8" id="body">
				
               </div><!--body-->
          </div><!--row-fluid-->
     </div><!--container-fluid-->

</body>
</html>

