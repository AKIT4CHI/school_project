<?php include('partials-font/menu.php'); ?>
<section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Products.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>





    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Categories</h2>

            <?php
                $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                if ($count > 0) {
                    while($row=mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>

                        <section id="top-sale">
                            <div class="container py-5">
                              
                              <hr>
                    <!-- owl carousel -->
                    <h4><?php echo $title; ?></h4>
                        <div class="owl-carousel owl-theme">
                               <div class="item py-2">
                                <div class="product font-rale">
                                  <div class="d-flex flex-column">
                                    <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>"><img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name ?>" class="img-fluid" width="100px"></a>
                                    <div class="text-center">
                                      
                                      
                                      
                                      <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>"><button type="submit" class="btn btn-warning font-size-12">Visit Products</button></a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <!-- !owl carousel -->
                        </div>
                      </section>
                      <br><br><br>

                        <?php 

                    }
                }
                else{

                }
             ?>

           

            

            <div class="clearfix"></div>
        </div>
    </section>
            

            

            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


<?php include('partials-font/footer.php'); ?>