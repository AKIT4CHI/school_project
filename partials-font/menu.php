<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
    <script type="text/javascript" src="engine1/jquery.js"></script>
    
    
    <title>Setup Game</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    
</head>

<body>
   
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="<?php echo SITEURL; ?>" title="Logo">
                    <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>foods.php">Products</a>
                    </li>
                    <li>
                        <a href="">Contact</a>
                    </li>
                    <?php if (isset($_SESSION['client_id'])) {
                        ?>
                        <li>
                        <a href="<?php echo SITEURL; ?>client_orders.php">My Orders</a>
                    </li>
                        <li>
                        <a href="<?php echo SITEURL; ?>shop-cart.php" title = "cart"><i style="font-size:24px" class="fa">&#xf07a;</i></a>
                    
                    </li>
                    
                    <li>
                        <a href="<?php echo SITEURL; ?>logout.php" title = "LogOut"><i class="fa fa-sign-out"  style="font-size:20px"></i></a>
                        </li>

                    <?php
                    } 
                    else{
                        ?>
                        <li>
                        <a href="<?php echo SITEURL; ?>login.php">Login</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>inscription.php">Register</a>
                    </li>  
                        <?php
                    }
                    ?>

                     
                    
                    
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->