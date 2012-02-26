<?php
     include "db_connect.php";

     $username = $_POST['username'];
     $pw = sha1($_POST['pw']);
     $testquery = "SELECT * FROM users WHERE username = $username";
     if(!is_null($testquery)):
          header(/index.html?error=notunique);
          //Check, if not null, user exists, return an error message
     else:
          //Else, create the user and log them in
          $query = "INSERT INTO users (username, password) VALUES ('$username', '$pw')";
          $result = mysqli_query($db, $query);
          header(/dashboard.
     endif;
?>
