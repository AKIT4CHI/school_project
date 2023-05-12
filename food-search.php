<?php include('partials-font/menu.php'); ?>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php $search = $_POST['search']; ?>
            
            <h2 class="search">Products on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
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

    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Products</h2>

            <?php
            // Get search Keyword
            $search = $_POST['search'];
            $search = stripcslashes($search);
            //SQL Query To Get food based on Search
            $sql = "SELECT * FROM tbl_product WHERE ((title  LIKE '%$search%') OR (description LIKE '%$search%')) and active = 'Yes'";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            //Check if food is available or not
            if ($count > 0) {
                while ($row=mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    $description = $row['description'];
                    $stock = $row['stock'];
                    ?>
                     <div class="food-menu-box">
                        <div class="food-menu-img">
                                                                  
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve" height = "100px">

                               
                            
                           
                            
                        </div>

                        <div class="food-menu-desc">
                        <h4><?php echo $title ?></h4>
                            <p class="food-price"><?php echo $price; ?></p>
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
                echo "Sorry!Product Not Found";
            }
             ?>
            

           

            


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php include('partials-font/footer.php'); ?>