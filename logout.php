<?php
  session_start();
  $conn = mysqli_connect("localhost", "root", "", "authentication");
  $_SESSION = [];
  session_unset();
  session_destroy();
  header("Location: index.html");
  
?>