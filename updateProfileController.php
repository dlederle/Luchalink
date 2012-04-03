<?php session_start() ?>
<?php 

$pid = $_SESSION['pid'];

//$query = "UPDATE Users SET email = '$email', profile_pic = '$pic', display_name = '$d_name' WHERE player_id = $pid";

include "db_connect.php";

//$query1 = "";
//$query2 = "";
//$query3 = "";

if(isset($_POST['email'])){
$email = $_POST['email'];
$query1 = "UPDATE Users SET email = '$email' WHERE player_id = $pid";
}

$pic = $_FILES['profPic']['name'];
if($pic){
	$imgFile = fopen("images/".$pid, "w");
	fwrite($imgFile, $pic);
	fclose($imgFile);

	$query2 = "UPDATE Users SET profile_pic = '$pic' WHERE player_id = $pid";
}

if(isset($_POST['displayName'])){
$d_name = $_POST['displayName'];
$query3 = "UPDATE Users SET display_name = '$d_name' WHERE player_id = $pid";
$_SESSION['user_name'] = $d_name;
}

//echo "q1 is... ".$query1;
//echo "q2 is... ".$query2;
//echo "q3 is... ".$query3;

if(isset($query1)){
$result1 = mysqli_query($db, $query1);
}
if(isset($query2)){
$result2 = mysqli_query($db, $query2);
}
if(isset($query3)){
$result3 = mysqli_query($db, $query3);
}

	header("Location: dashboard.php");
        exit();

 ?>

