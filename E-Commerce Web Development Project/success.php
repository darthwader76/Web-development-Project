<?php
 require 'includes/common.php';
    if (!isset($_SESSION['email'])) {
        header('location: index.php');
    }
$user_id=$_SESSION['user_id'];
//echo $user_id;
$idd=$_GET['idd'];
$exploded=explode(",",$idd); //Limit is unspecified, so it will return all the substrings;	
//print_r($exploded);
$flag=false;
foreach ($exploded as $value) {
    $query="UPDATE users_items SET status='Confirmed' WHERE user_id='$user_id' AND item_id='$value'";
    $execute= mysqli_query($link, $query) or die("Error: ". mysqli_error($link));
    $flag=true;
}
#<assign licenseFirst = "/* ">
#<assign licensePrefix = " * ">
#<assign licenseLast = " */">
#<include "/Templates/Licenses/license-default.txt">
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width = device-width, initial-scale = 1">
        <title>Success | Life Style Store</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
          <?php
        include 'includes/header.php';
        ?>
        <div class="container-fluid" id="content">
            
            <?php if($flag){?>
                <div class="col-md-12">
                <div class="jumbotron">
                    <h3 align="center">Your order is confirmed. Thank you for shopping with us.</h3><hr>
                    <p align="center">Click <a href="products.php">here</a> to purchase any other item.</p>
                </div>
            </div><?php  } else{ ?>
            <div class="col-md-12">
                <div class="jumbotron">
                    <h3 align="center">Some problem has occurred. Please try again later.</h3><hr>
                    <p align="center">Click <a href="products.php">here</a> to purchase any other item.</p>
                </div>
            <?php } ?>
        </div>
          <?php
        include 'includes/footer.php';
        ?>
    </body>
</html>