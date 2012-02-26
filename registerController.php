<?php
     include "db_connect.php";

     $username = $_POST['username'];
     $pw = $_POST['password'];
     //We're storing in plaintext for sprint 1, we can work on the encryption for sprint 2
     $testquery = "SELECT * FROM users WHERE username = $username";
     if(!is_null($testquery)):
          header(/index.html?error=notunique);
          //Check, if not null, user exists, return an error message
     else:
          //Else, create the user and log them in
          $query = "INSERT INTO users (username, password) VALUES ('$username', '$pw')";
          $result = mysqli_query($db, $query);
          //header(/loginController);
     endif;
?>
