<?php
     include "db_connect.php";

     $username = $_POST['username'];
     $pw = sha1($_POST['pw']);
     $testquery = "SELECT * FROM users WHERE username = $username";
     //Check, if not null, return an error message

     $query = "INSERT INTO users (username, password) VALUES ('$username', '$pw')";
     $result = mysqli_query($db, $query);
?>
