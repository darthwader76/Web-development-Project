<?php
require 'includes/common.php';
$user_id=$_SESSION['user_id'];
//echo $user_id;
$idd=$_GET['idd'];
$exploded=explode(",",$idd); //Limit is unspecified, so it will return all the substrings;	
//print_r($exploded);
foreach ($exploded as $value) {
    $query="DELETE FROM users_items WHERE user_id='$user_id' AND item_id='$value'";
    $execute= mysqli_query($link, $query) or die("Error: ". mysqli_error($link));

}
header("location:cart.php");

#<assign licenseFirst = "/* ">
#<assign licensePrefix = " * ">
#<assign licenseLast = " */">
#<include "/Templates/Licenses/license-default.txt">
?>

