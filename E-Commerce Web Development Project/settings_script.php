<?php
require 'includes/common.php';
if(!isset($_SESSION['email'])){
    header("location:index.php");
}
$user_id=$_SESSION['user_id'];
$olpas=$_POST['old-password'];
$pass1=$_POST['password1'];
$pass2=$_POST['password2'];
$regex_password="/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/";
$flag=FALSE;

if(empty($olpas)){
    $GLOBALS['olpassErr']="Password required.";
   // echo $pass1Err;
    $flag=FALSE;
} else {
    if(!preg_match($regex_password,$pass1)){
        $GLOBALS['olpassErr']="Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters.";
        $flag=FALSE;
    }
    $flag=TRUE;
}
if(empty($pass1)){
    $GLOBALS['pass1Err']="Password required.";
   // echo $pass1Err;
    $flag=FALSE;
} else {
    if(!preg_match($regex_password,$pass1)){
        $GLOBALS['pass1Err']="Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters.";
        $flag=FALSE;
    }
    $flag=TRUE;
}
if(empty($pass2)){
    $GLOBALS['pass2Err']="Please re-enter the password.";
    //echo $pass2Err;
    $flag=FALSE;
} else {
    if((strcmp($pass1, $pass2))!=0){
        $GLOBALS['pass2Err']="Both passwords must be same.";
        $flag=FALSE;
    }
    $flag=TRUE;
}

$oldpass=md5(md5($olpas));
$checkpass="Select id,password from users where id='$user_id' and password='$oldpass'";
$checkex= mysqli_query($link, $checkpass) or die("Error:". mysqli_error($link));
$result= mysqli_num_rows($checkex);
if($result==1){
    $uppass="Update users SET password='$pass2' where id='$user_id'";
    $updateex= mysqli_query($link, $uppass) or die("Error:". mysqli_error($link));
    $results= mysqli_num_rows($checkex);
    if($results==1){
        header("location:products.php?success_p=Information Updated successfully.");
    }
    else{
        header("location:products.php?success_p=Problem Encountered.");
    }
}
#<assign licenseFirst = "/* ">
#<assign licensePrefix = " * ">
#<assign licenseLast = " */">
#<include "/Templates/Licenses/license-default.txt">
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Settings | Life Style Store</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        include 'includes/header.php';
        ?>
        <div class="container-fluid" id="content">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4" id="settings-container">
                    <h4>Change Password</h4>
                    <?php if($result==0){
     echo 'Incorrect Password';
                        
                    }?>
                    <form action="settings_script.php" method="POST">
                        <div class="form-group">
                            <input type="password" class="form-control" name="old-password"  placeholder="Old Password" required>
                            <span>
                                <?php
                                   if(isset($GLOBALS['olpassErr'])){
                                       echo $GLOBALS['olpassErr'];
                                   }
                                                ?>
                            </span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password1" placeholder="New Password" required>
                            <span><?php
                                   if(isset($GLOBALS['pass1Err'])){
                                       echo $GLOBALS['pass1Err'];
                                   }
                                                ?></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password2"  placeholder="Re-type New Password" required>
                            <span><?php
                                   if(isset($GLOBALS['pass2Err'])){
                                       echo $GLOBALS['pass2Err'];
                                   }
                                                ?></span>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button><br>
                        <span>
                            <h5><?php 
                            if(isset($_GET['success_p'])){
                                echo $_GET['success_p'];}?></h5>
                        </span>
                    </form>
                </div>
            </div>
        </div>
        <?php
        include 'includes/footer.php';
        ?>
    </body>
</html>