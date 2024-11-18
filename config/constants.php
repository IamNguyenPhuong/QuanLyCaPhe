<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    define('SITEURL','http://localhost/QuanLyCaPhe/');
    define('LOCALHOST','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','coffeestore');

    $conn= mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database connection
    $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error()); //Selecting Database
?>