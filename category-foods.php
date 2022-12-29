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
            <?php
                if (isset($_GET['category_id'])) {
                    $category_id = $_GET['category_id'];
                }
                else{
                    header('location:'.SITEURL);
                }
                // Get the category title base on category id
                $sql = "SELECT title FROM tbl_category WHERE id=$category_id";
                $res = mysqli_query($conn, $sql);
                //Get the value from database
                $row = mysqli_fetch_assoc($res);
                //Get the title
                $category_title = $row['title'];
             ?>
             

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2 class="search">Products on <a  class="text-white">"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Products</h2>
            <?php
                $sql2 = "SELECT * FROM tbl_food WHERE category_id=$category_id";

                $res2 = mysqli_query($conn, $sql2);

                //count the rows
                $count2 = mysqli_num_rows($res2);
                if ($count2 > 0) {
                    while($row2 = mysqli_fetch_assoc($res2)){
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        $image_name = $row2['image_name'];
                        $stock = $row2['stock'];
                        ?>
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                            </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                                <p class="food-price"><?php echo $price; ?> DH</p>
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
                    echo "Sorry! No Product is available";
                }
             ?>



            



            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php include('partials-font/footer.php'); ?>