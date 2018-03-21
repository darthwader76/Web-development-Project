<?php
require 'includes/common.php';
$user_id=$_SESSION['user_id'];
//echo $user_id;
$item_id=$_GET['id'];
//echo $item_id;
$query="DELETE FROM users_items WHERE user_id='$user_id' AND item_id='$item_id'";
$execute= mysqli_query($link, $query) or die("Error: ". mysqli_error($link));
header("location:cart.php");

#<assign licenseFirst = "/* ">
#<assign licensePrefix = " * ">
#<assign licenseLast = " */">
#<include "/Templates/Licenses/license-default.txt">
?>

