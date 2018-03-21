<?php
    $host="localhost";
    $username="root";
    $password="";
    $database="store";
    $link= mysqli_connect($host, $username, $password, $database) or die("Error in connection".mysqli_error($link));
    session_start();
    
?>


