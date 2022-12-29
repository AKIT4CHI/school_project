<?php include('partials-font/menu.php'); ?>

<?php

    
    if (isset($_GET['food_id'])) 
    {
        $food_id = $_GET['food_id'];
        

        $sql = "SELECT * FROM tbl_cart WHERE id = $food_id";



        

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if ($count==1) 
        {
            $row = mysqli_fetch_assoc($res);
            $title = $row['title'];
            $price = $row['price'];
            $image_name = $row['image_name'];
            

            

        }
        
    }
    
 ?>

    
    <section class="food-search1">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>


            <form action="" class="order" method="POST">
                
               
                    
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Chouaib Kaddouri" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. +212xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="adress" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>
                    <div class="order-label">Payment Method</div><br>
                    <input type="radio" name="payment" value="On_delivery" onclick="text(1)" required>On delivery<br>
                    <input type="radio" name="payment" value="Credit_Card" onclick="text(0)" required checked>Credit Card<br>
                    <br>
                    <div id="mycode">
                    <div class="order-label">Card Name</div>
                    <input type="text" name="card_name" placeholder="Card name" class="input-responsive">
                    <div class="order-label">Card Number</div>
                    <input type="number" name="card_number" placeholder="Card Number" class="input-responsive" >
                    <div class="order-label">CCV</div>
                    <input type="number" name="ccv" placeholder="CCV 996" class="input-responsive" >
                    <div class="order-label">Expiration Date</div>
                    <input type="month" name="exp_date"  class="input-responsive" >
                    </div>
                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                    
                </fieldset>

            </form>

            <?php
                if (isset($_POST['submit'])) {
                    $order_date = date("Y-m-d h:i:sa");
                    $status = "Ordered";
                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_adress = $_POST['adress'];

                    $sql3 = "SELECT * FROM tbl_cart";
                    $res3 = mysqli_query($conn, $sql3);
                    $count3 = mysqli_num_rows($res3);



                    

                    if ($count3 > 0) 
                    {
                        
                        while ($row3 = mysqli_fetch_assoc($res3)) 
                        {
                            
                            $product_id[] = $row3['product_id'];
                            $product_qty[] = $row3['quantity'];

                            $product_id_ = $row3['product_id'];
                            $product_qty_ = $row3['quantity'];

                            $sql4 = "SELECT * FROM tbl_food where id = $product_id_";
                            $res4 = mysqli_query($conn,$sql4);

                            while ($row4 = mysqli_fetch_assoc($res4)) {
                                $price = $row4['price'];
                                $moneyWon = $row4['Money_won'];
                                $money = $product_qty_ * $price;
                                $moneyWon += $money;
                                $stock = $row4['stock'];
                                $newStock = $stock - $product_qty_;
                                $sql5 = "UPDATE tbl_food set stock = $newStock, Money_won = $moneyWon where id = $product_id_";
                                $res5 = mysqli_query($conn,$sql5);
                            }


                        }
                        
                    }
                    $total = $_GET['total'];
                    print_r($product_id);
                    $total_product = implode(",",$product_id);
                    $qty1 = implode(",",$product_qty);
                    echo $total_product;
                    $detail_query = mysqli_query($conn, "INSERT INTO tbl_order(customer_name, customer_contact, customer_email, customer_address, status, product_id, order_date, total, qty) VALUES('$customer_name','$customer_contact','$customer_email','$customer_adress','$status','$total_product','$order_date','$total','$qty1')");

                    if ($detail_query==TRUE) {
                        $sql1 = "DELETE FROM tbl_cart";
                        $res1 = mysqli_query($conn, $sql1);
                        echo '<script>alert("Your Order Is Saved")</script>';
                        header('location'.SITEURL."categories.php");

                    }
                    else{
                        echo '<script>alert("Failed to order please try again")</script>';
                    }
                    
                    
                    


                    


                    
                }
             ?>

        </div>
    </section>
    <script type="text/javascript">
        function text(x) {
            if (x==0) {
                document.getElementById('mycode').style.display="block";
                document.getElementById('mycode').style.transition="0.5s";
            }
            else
                document.getElementById('mycode').style.display="none";
                document.getElementById('mycode').style.transition="0.5s";
            return;
            
        }
    </script>
    <!-- fOOD sEARCH Section Ends Here -->

<?php include('partials-font/footer.php'); ?>