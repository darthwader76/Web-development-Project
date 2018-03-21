
<?php
require 'includes/common.php';
if(!isset($_SESSION['email'])){
    header("location:index.php");
}
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
                    <form action="settings_script.php" method="POST">
                        <div class="form-group">
                            <input type="password" class="form-control" name="old-password"  placeholder="Old Password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password1" placeholder="New Password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password2"  placeholder="Re-type New Password" required>
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