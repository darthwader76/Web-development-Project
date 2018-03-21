<?php
session_start();
if(!isset($_SESSION['email'])){
    header('location:index.php');    
}
session_destroy();
header('location:index.php')
#<assign licenseFirst = "/* ">
#<assign licensePrefix = " * ">
#<assign licenseLast = " */">
#<include "/Templates/Licenses/license-default.txt">
?>

