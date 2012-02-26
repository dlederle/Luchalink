<?php
     include "db_connect.php";

     $email = $_POST['email'];
     $pw = $_POST['password'];
     //We're storing in plaintext for sprint 1, we can work on the encryption for sprint 2
     //$testquery = "SELECT * FROM Users WHERE email = '$email'";
     //$testresult = mysqli_query($db, $testquery);
     //if(!is_null($testresult)):
          //echo($testquery);
          //echo($testresult);
          //header("Location:   index.html?error=notunique");
          //Check, if not null, user exists, return an error message
     //else:
          //Else, create the user and log them in
          $query = "INSERT INTO Users (email, password) VALUES ('$email', '$pw')";
          $result = mysqli_query($db, $query);
          echo($query);
          header("Location: loginController.php?email=$email&password=$pw&submit=Log-In");
     //endif;
?>
