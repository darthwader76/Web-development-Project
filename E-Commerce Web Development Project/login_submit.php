<?php
 require 'includes/common.php';
 $email=$_POST['e-mail'];
 $email = filter_var($email, FILTER_SANITIZE_EMAIL);
 $pass=$_POST['password'];
 //$regex_email="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
 $regex_password="/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/";
 if(empty($email) || empty($pass)){
     header('location:login.php?email_error=Please enter your email id.&password_error=Please enter your password.');
     die();
 }    
 if(((!filter_var($email, FILTER_VALIDATE_EMAIL)) && (!preg_match($regex_password, $pass)))===TRUE){
     header('location: login.php?email_error=Please enter an email in the format - characters@characters.domain&password_error=Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters.');
     die();
 }
 if(!preg_match($regex_password, $pass)){
       header('location: login.php?password_error=Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters.');
       die();
 }
 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('location: login.php?email_error=Please enter an email in the format - characters@characters.domain.');
    die();
    //echo 'Hi';
    //die();
 }
     
 $email_address= mysqli_real_escape_string($link,$email);
 
 $password= md5(md5($pass));
 $login_query="Select id,email from users where email='$email_address' and password='$password'";
 $login_execute= mysqli_query($link, $login_query) or die("Error: ". mysqli_error($link));
 $login_result= mysqli_num_rows($login_execute);
 if($login_result==0){
     header('location:login.php?login_error=Incorrect Email ID or Password');
 }
 else{
     $_SESSION['email']=$email_address;
     $row= mysqli_fetch_array($login_execute);
     $_SESSION['user_id']= $row['id'];
     header('location:products.php');
}


?>