<?php
require 'includes/common.php';
if(!isset($_SESSION['email'])){
    header("location:login.php");
}
$user_id=$_SESSION['user_id'];
$value=0;
$query="Select item_id from users_items where user_id='$user_id' and status='Added to cart'";
$execute= mysqli_query($link, $query) or die("Error:". mysqli_error($link));
$idd="";

$var= mysqli_num_rows($execute);
$i=$var;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cart | Life Style Store</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid" id="content">
            <?php
            include 'includes/header.php';
            ?>
            
            <div class="row decor_bg">
                <div class="col-md-6 col-md-offset-3">
                    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Item Number</th>
                                <th>Item Name</th>
                                <th>Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($var==0){
                                echo 'Add items to cart first. Click <a href=products.php>here</a> to search.';   
                                }
                                else{
                                    echo 'Click <a href=products.php>here</a> to add more products to your cart.';
                                while($var>0){
                                    
                                    $values_id= mysqli_fetch_array($execute);
                                    //echo $values_id['item_id'];
                                    //echo 'loop termin';
                                    $queryy="Select id,name,price from items where id='$values_id[0]'";
                                    $result= mysqli_query($link, $queryy);
                                    $row= mysqli_fetch_array($result);
                                   
                                    //echo $row['price'];
                                    $value=$value+$row['price'];
                                    $idd.=",".$values_id[0];
                                    ?>
                            <tr>
                                <td><?php echo $row['id'];?></td><td><?php echo $row['name'];?></td><td><?php echo $row['price'];?></td><td><a href='cart-remove.php?id=<?php echo $row['id'];?>' class='remove_item_link'>Remove</a></td>
                            </tr>
                                    <?php $var--;}
                                
                                
                                }
                                $idd= substr($idd, 1);
                                //echo $idd;
                                if($i==0){
                                   
                                }else{
                            ?>
                            <tr>
                                <td></td><td>Total</td><td>Rs <?php echo $value;?></td><td><a href='success.php?idd=<?php echo $idd;?>' class='btn btn-primary'>Confirm Order</a>
                                    &nbsp;<?php
                                }
                            if($i>0){?>
                            
                                <a href='remove-all.php?idd=<?php echo $idd;?>' class='btn btn-primary'>Empty Cart</a>
                            <?php
                            
                            }?>
 </td>
                            </tr>
                                                   </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php
            include 'includes/footer.php';
            ?>
    </body>
</html>