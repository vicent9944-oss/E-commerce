<?php
    // include configure.php
        //DATABASE CONNECTION.
 session_start();

  define('SITEURL', 'http://localhost/esp-software/');
  define('LOCALHOST', 'localhost');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', '');
  define('DB_NAME', 'esp_registration');

  $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD); //db connection
  $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn)); //selecting db

    // 1. Destroy the session
    session_destroy(); // unset $_SESSION['user'] = $username;

    // 2.Redirect to login page
    header('location:' .SITEURL. 'build/sign-in.php');
?>