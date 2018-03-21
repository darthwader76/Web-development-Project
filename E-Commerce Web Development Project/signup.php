<?php
    require 'includes/common.php';
    if (isset($_SESSION['email'])) {
               header('location: products.php');
    }
   $name=$email=$address=$contact=$city=$pass1=$pass2="";
   
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
                                <input class="form-control" placeholder="Name" name="name" pattern="[A-Za-z ]+" title="No numbers or special characters">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control"  placeholder="E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="characters@characters.domain" name="e-mail">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="password1" >
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Value must be same" name="password2">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Contact" pattern="[0-9]{10}" title="Valid 10-digit phone number" maxlength="10" size="10" name="contact">
                            </div>
                            <div class="form-group">
                                <input  type="text" class="form-control"   title="No numbers or special characters" pattern="[A-Za-z ]+" placeholder="City" name="city">
                            </div>
                            <div class="form-group">
                                <input  type="text" class="form-control"  placeholder="Address" name="address">
                                
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