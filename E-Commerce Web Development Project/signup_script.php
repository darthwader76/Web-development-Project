<?php
require 'includes/common.php';
$name=$_POST['name'];
$email=$_POST['e-mail'];
$pass1=$_POST['password1'];
$pass2=$_POST['password2'];
$contact=$_POST['contact'];
$city=$_POST['city'];
$address=$_POST['address'];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$regex_name="/^[A-Za-z ]*$/";
$regex_city="/^[A-Za-z ]*$/";
$regex_contact="/^[0-9]{10}$/";
$regex_password="/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/";
$flag=FALSE;
if(empty($name)){
    $GLOBALS['nameErr']="Name required.";
    $flag=FALSE;
}else{
     if(!preg_match($regex_name, $name)){
         $GLOBALS['nameErr'] = "Only letters and white space allowed"; 
         $flag=FALSE;
     }
     $flag=TRUE;
 }
 if(empty($email)){
     $GLOBALS['emailErr']="Email required.";
     $flag=FALSE;
 }else{
     if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
         $GLOBALS['emailErr']="Invalid email format.";
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
if(empty($contact)){
    $GLOBALS['contactErr']="Contact required.";
    $flag=FALSE;
} else {
    if(!preg_match($regex_contact, $contact)){
        $GLOBALS['contactErr']="Enter 10-digit valid phone number.";
        $flag=FALSE;
    }
    $flag=TRUE;
}
if(empty($city)){
    $GLOBALS['cityErr']="City Name required.";
    $flag=FALSE;
   // echo $cityErr;
}else{
    if(!preg_match($regex_city, $city)){
        $GLOBALS['cityErr']="Only letters and white space allowed";
        $flag=FALSE;
    }
    $flag=TRUE;
}
if(empty($address)){
    $GLOBALS['addressErr']="Address required.";
    $flag=FALSE;
   // echo $addressErr;
    //die();
}
if($flag){
$name= mysqli_real_escape_string($link,$name);
$email= mysqli_real_escape_string($link,$email);
$city= mysqli_real_escape_string($link,$city);
$address= mysqli_real_escape_string($link,$address);
$signup_query="Select id from users where email='$email'";
$signup_execute= mysqli_query($link, $signup_query) or die("Error: ". mysqli_error($link));
$signup_result= mysqli_num_rows($signup_execute);
if($signup_result>0){
    header("location:signup.php?existErr=Email ID already used.");
}else{
    $password=md5(md5($pass2));
    $new_user_query="Insert into users (name,email,password,contact,city,address) values('$name','$email','$password','$contact','$city','$address')";
    $new_user_execute= mysqli_query($link, $new_user_query) or die("Error: ". mysqli_error($link));
    $_SESSION['email']=$email;
    $_SESSION['user_id']= mysqli_insert_id($link);
    header('location:products.php?message=Success.');
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
        <title>Sign-up | Life Style Store</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        include 'includes/header.php';
        ?>
        <div class="container-fluid decor_bg" id="content">
            <div class="row">
                <div class="container">
                    <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
                        <h2>SIGN UP</h2>
                        <form  action="signup_script.php" method="POST">
                            <div class="form-group">
                                <input class="form-control" placeholder="Name" name="name" title="No numbers or special characters" value="<?php if(isset($name)){echo $name;}?>">
                               <span><?php
                                   if(isset($GLOBALS['nameErr'])){
                                       echo $GLOBALS['nameErr'];
                                   }
                                                ?></span>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control"  placeholder="E-mail"  title="characters@characters.domain" name="e-mail" value="<?php if(isset($email)) {echo $email;}?>">
                                <span><?php
                                   if(isset($GLOBALS['emailErr'])){
                                       echo $GLOBALS['emailErr'];
                                   }
                                                ?></span>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="password1" >
                               <span><?php
                                   if(isset($GLOBALS['pass1Err'])){
                                       echo $GLOBALS['pass1Err'];
                                   }
                                                ?></span>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Confirm Password"  title="Value must be same" name="password2" >
                               <span><?php
                                   if(isset($GLOBALS['pass2Err'])){
                                       echo $GLOBALS['pass2Err'];
                                   }
                                                ?></span>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Contact"  title="Valid 10-digit phone number" maxlength="10" size="10" name="contact" value="<?php if(isset($contact)){echo $contact;}?>">
                                <span><?php
                                   if(isset($GLOBALS['contactErr'])){
                                       echo $GLOBALS['contactErr'];
                                   }
                                                ?></span>
                            </div>
                            <div class="form-group">
                                <input  type="text" class="form-control"   title="No numbers or special characters" placeholder="City" name="city" value="<?php if(isset($city)){ echo $city;}?>">
                                <span><?php
                                   if(isset($GLOBALS['cityErr'])){
                                       echo $GLOBALS['cityErr'];
                                   }
                                                ?></span>
                            </div>
                            <div class="form-group">
                                <input  type="text" class="form-control"  placeholder="Address" name="address" value="<?php if(isset($address)){echo $address;}?>">
                                <span><?php
                                   if(isset($GLOBALS['addressErr'])){
                                       echo $GLOBALS['addressErr'];
                                   }
                                                ?></span>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include 'includes/footer.php';
        ?>
    </body>
</html>

