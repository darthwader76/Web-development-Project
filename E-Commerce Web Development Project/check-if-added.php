<?php
function check_if_added_to_cart($item_id){
    //require 'includes/common.php';
    $host="localhost";
    $username="root";
    $password="";
    $database="store";
    $link= mysqli_connect($host, $username, $password, $database) or die("Error in connection".mysqli_error($link));
    $user_id=$_SESSION['user_id'];
    $query="SELECT * FROM users_items WHERE item_id='$item_id' AND user_id ='$user_id' and status='Added to cart'";
    $execute= mysqli_query($link, $query) or die("Error: ". mysqli_error($link));
    if(mysqli_num_rows($execute)>=1){
        return 1;
    }
    else{
        return 0;
    }
}

#<assign licenseFirst = "/* ">
#<assign licensePrefix = " * ">
#<assign licenseLast = " */">
#<include "/Templates/Licenses/license-default.txt">
?>

