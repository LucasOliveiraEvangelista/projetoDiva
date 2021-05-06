<?php
  $hostname = "localhost";
  $username = "root";
  $password = "lcs_160803";
  $dbname = "bd_diva";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>
