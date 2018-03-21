<?php
require 'includes/common.php';
$user_id=$_SESSION['user_id'];

$item_id=$_GET['id'];
$query="INSERT INTO users_items(user_id, item_id, status) VALUES('$user_id', '$item_id', 'Added to cart')";
$execute= mysqli_query($link, $query) or die("Error: ". mysqli_error($link));
header("location:products.php");

#<assign licenseFirst = "/* ">
#<assign licensePrefix = " * ">
#<assign licenseLast = " */">
#<include "/Templates/Licenses/license-default.txt">
?>

