<?php include('partials-font/menu.php'); ?>

<?php 
if (isset($_SESSION['add-to-cart'])) {
        echo $_SESSION['add-to-cart'];
        unset($_SESSION['add-to-cart']);
        
    }

    if (isset($_SESSION['product-exist'])) {
        echo $_SESSION['product-exist'];
        unset($_SESSION['product-exist']);
        
    }
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Products.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Products</h2>
            <?php 
                $sql = "SELECT * FROM tbl_product WHERE active='Yes'";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $stock = $row['stock'];
                        ?>
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php
                                    if ($image_name=="") {
                                        echo "Sorry!Image is unavailable";
                                    }
                                    else{
                                        ?>
                                        <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                        <?php

                                    }
                                 ?>
                                
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title ?></h4>
                                    <p class="food-price"><?php echo $price ?>DH</p>
                                        <p class="food-detail text-overflow">
                                        <?php echo $description; ?>
                                        </p>
                                <br>
                                <?php
                                if ($stock > 0) {
                                    ?>
                                    <a href="<?php echo SITEURL; ?>add-to-cart.php?id=<?php echo $id; ?>" class="btn btn-primary">Add To Cart</a><?php
                                    ?>
                                    <a href="<?php echo SITEURL; ?>product.php?id=<?php echo $id; ?>" class="btn btn-stock ">View More</a><?php
                                }
                                else{
                                    ?>
                                    <a  class="btn btn-stock no-drop" disabled>Out of Stock</a>
                                    <?php
                                }


                                 ?>

                            
                            </div>
                        </div>

                        <?php 
                    }
                }
                else{
                    echo "Sorry No Product is Available";
                }
            ?>

           

          


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php include('partials-font/footer.php'); ?>