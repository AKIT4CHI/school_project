<?php include('config/constants.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <!-- Custom CSS file -->
    <link rel="stylesheet" href="style.css">
    <style type="text/css">

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
    		if (isset($_GET['id'])) {
    			$id = $_GET['id'];

    			$sql = "SELECT * from tbl_food WHERE id=$id";
				$res = mysqli_query($conn,$sql);

				if ($res==TRUE) {
					$count = mysqli_num_rows($res);

					if ($count==1) {
						$row = mysqli_fetch_assoc($res);
						$title = $row['title'];
						$description = $row['description'];
						$image_name = $row['image_name'];
						$price = $row['price'];
                        $Stitle = $row['Stitle'];
					}
				}

    		

            
        
    
    	 ?>




        *{

    margin: 0 0;
    padding: 0 0;
    font-family: Arial, Helvetica, sans-serif;
}
.container{

    width: 100%;
    margin: 0 auto;
    padding: 1%;
}
.img-responsive{

    width: 100%;
}
.img-curve{
    
}

.text-right{
    text-align: right;
}
.text-center{
    text-align: center;
}
.text-left{
    text-align: left;
}
.text-white{
    color: white;
}

.clearfix{
    clear: both;
    float: none;
}

a{
    color: red;
    text-decoration: none;
}
a:hover{
    color: red;
    text-decoration: none;
}

.btn{
    padding: 1%;
    border: none;
    font-size: 1rem;
    border-radius: 5px;
}

h2{
    color: #2f3542;
    font-size: 2rem;
    margin-bottom: 2%;
}
h3{
    font-size: 1.5rem;
}
.float-container{

    position: relative;
}
.float-text{
    position: absolute;
    bottom: -30px;
    left: 20%;
    transition: 0.5s;
    opacity: 0;
}
fieldset{
    border: 1px solid white;
    margin: 5%;
    padding: 3%;
    border-radius: 5px;
}


/* CSSS for navbar section */
.navbar{
    

    margin: -10px;
    padding: -5px;
}
.logo{
    height: 5px;
    width: 10%;
    float: left;
    position: relative;
    top: 8%;
    left: -30px;
}
.menu{
    position: relative;
    top: 0;
    line-height: 10px;
    width: 100%;
    right: -30px;
}
.menu ul{
    list-style-type: none;
}

.menu ul li{
    display: inline-block;
    padding: 1%;
    font-weight: bold;
}


/* CSS for Search Section */

.food-search{
    background-image: url(../images/bg.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    padding: 7% 0;
}

.food-search input[type="search"]{
    width: 50%;
    padding: 1%;
    font-size: 1rem;
    border: none;
    border-radius: 5px;
}
/* TESTING */

h4{
    position: relative;
    top: -20px;
}

@import url("https://fonts.googleapis.com/css2?family=Baloo+Thambi+2&family=Raleway&family=Rubik&display=swap");


/* CSS for Categories */
.categories{
    padding: 4% 0;


}
.btn-buy{
    background-color: red;
    color: white;
    margin: 2%;
    padding: 2%;
    border-radius: 10px;
   
}

.box-3{
    width: 20%;
    float: left;
    margin: 2%;
    border: 1px solid whitesmoke;
    top: 15px;
}
.box-3 img{
    position: relative;
    top: 4px;

}
.box-3 :hover + .float-text{
    transition: 0.5s;
    bottom: 50px;
    opacity: 1;
}


/* CSS for Food Menu */
.food-menu{
    background-color: #ececec;
    padding: 4% 0;
}
.food-menu-box{
    width: 43%;
    margin: 1%;
    padding: 2%;
    float: left;
    background-color: white;
    border-radius: 15px;
}

.food-menu-img{
    width: 20%;
    float: left;
}

.food-menu-desc{
    width: 70%;
    float: left;
    margin-left: 8%;
}

.food-price{
    font-size: 1.2rem;
    margin: 2% 0;
}
.food-detail{
    font-size: 1rem;
    color: #747d8c;
}


/* CSS for Social */
.social ul{
    list-style-type: none;
}
.social ul li{
    display: inline;
    padding: 1%;
}

/* for Order Section */
.order{
    width: 50%;
    margin: 0 auto;
}
.input-responsive{
    width: 96%;
    padding: 1%;
    margin-bottom: 3%;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
}
.order-label{
    margin-bottom: 1%; 
    font-weight: bold;
}



/* CSS for Mobile Size or Smaller Screen */

@media only screen and (max-width:768px){
    .logo{
        width: 70%;
        float: none;
        margin: 1% auto 20% auto;
    }

    .menu ul{
        text-align: center;
    }

    .food-search input[type="search"]{
        width: 90%;
        padding: 2%;
        margin-bottom: 3%;
    }

    

    .food-search{
        padding: 10% 0;
    }

    .categories{
        padding: 20% 0;
    }
    h2{
        margin-bottom: 10%;
    }
    .box-3{
        width: 100%;
        margin: 4% auto;
    }

    .food-menu{
        padding: 20% 0;
    }

    .food-menu-box{
        width: 90%;
        padding: 5%;
        margin-bottom: 5%;
    }
    .social{
        padding: 5% 0;
    }
    .order{
        width: 100%;
    }
}
.cart{
    width: 100%;
    background-color: #57B6E3;
    color: white;
    text-align: center;
    padding: 10%;
    margin: 1% auto;
    border-radius: 5px;
    }

.return{
    width: 100%;
    text-align: center;
    margin: 10% auto;
}
.return a{
    border: 1px solid red;
    border-radius: 10px;
    padding: 10px;
    transition: 0.2s;
    
}
.return a:hover{
    background-color: red;
    color: white;
    transition: 0.2s;
}
.footer{
            
            padding: 10px 0;
            background-color: #fff;
            
        }

        .footer .social{
            text-align: center;
            padding-bottom: 25px;
            color: #4b4c4d;   
        }
        .footer .social a{
            font-size: 24px;
            color: inherit;
            border: 1px solid #ccc;
            width: 40px;
            height: 40px;
            line-height: 38px;
            display: inline-block;
            text-align: center;
            border-radius: 50%;
            margin: 0 8px;
            opacity: 0.75;
        }
        .footer .social a:hover {
            opacity: 0.9;    
        }
        .footer ul{
            margin-top: 0;
            padding: 0;
            list-style: none;
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 0;
            text-align: center;
        }
        .footer ul li a{
            color: inherit;
            text-decoration: none;
            opacity: 0.8;
        }
        .footer ul li{
            display: inline-block;
            padding: 0 15px;
        }
        .footer ul li a:hover{
            opacity: 1;
        }
        .footer .copyright{
            margin-top: 15px;
            text-align: center;
            font-size: 13px;
            color: #aaa;
        }




    </style>
</head>


<body>

    <!-- start #header -->
        
    <!-- !start #header -->

    <!-- start #main-site -->
        <main id="main-site">
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
                    <li>
                        <a href="<?php echo SITEURL; ?>shop-cart.php"><i style="font-size:24px" class="fa">&#xf07a;</i></a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>

        <!--   product  -->
            <section id="product" class="py-3">
                <div class="container">
                    <div class="row">


                        <div class="col-sm-6">
                            <br><br><br>
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name ?>" alt="product" class="img-fluid">
                            <br><br><br>
                            <div class="form-row pt-4 font-size-16 font-baloo">
                                <div class="col">
                                    
                                    <a href="<?php echo SITEURL; ?>add-to-cart.php?id=<?php echo $id; ?>"><button type="submit" class="btn btn-warning form-control">Add to Cart</button></a>
                                </div>
                                <div class="col">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 py-5">
                            <h5 class="font-baloo font-size-20"><?php echo $title; ?></h5>
                            <small>by <?php echo $Stitle; ?></small>
                            <div class="d-flex">
                                <div class="rating text-warning font-size-12">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                  </div>
                                  <a href="#" class="px-2 font-rale font-size-14">20,534 ratings | 1000+ answered questions</a>
                            </div>
                            <hr class="m-0">

                            <!---    product price       -->
                                <table class="my-3">
                                    <tr class="font-rale font-size-14">
                                        <td>M.R.P:</td>
                                        <td><strike>$162.00</strike></td>
                                    </tr>
                                    <tr class="font-rale font-size-14">
                                        <td>Deal Price:</td>
                                        <td class="font-size-20 text-danger"><span><?php echo $price ?></span> DH<small class="text-dark font-size-12">&nbsp;&nbsp;Inclusive of all taxes</small></td>
                                    </tr>
                                    <tr class="font-rale font-size-14">
                                        <td>You Save:</td>
                                        <td><span class="font-size-16 text-danger">$152.00</span></td>
                                    </tr>
                                </table>
                            <!---    !product price       -->

                             <!--    #policy -->
                                <div id="policy">
                                    <div class="d-flex">
                                        <div class="return text-center mr-5">
                                            <div class="font-size-20 my-2 color-second">
                                                <span class="fas fa-retweet border p-3 rounded-pill"></span>
                                            </div>
                                            <span href="#" class="font-rale font-size-12">10 Days <br> Replacement</span>
                                        </div>
                                        <div class="return text-center mr-5">
                                            <div class="font-size-20 my-2 color-second">
                                                <span class="fas fa-truck  border p-3 rounded-pill"></span>
                                            </div>
                                            <span href="#" class="font-rale font-size-12">Daily Tuition <br>Deliverd</span>
                                        </div>
                                        <div class="return text-center mr-5">
                                            <div class="font-size-20 my-2 color-second">
                                                <span class="fas fa-check-double border p-3 rounded-pill"></span>
                                            </div>
                                            <span href="#" class="font-rale font-size-12">1 Year <br>Warranty</span>
                                        </div>
                                    </div>
                                </div>
                              <!--    !policy -->
                                <hr>

                            <!-- order-details -->
                                <div id="order-details" class="font-rale d-flex flex-column text-dark">
                                    
                                    <small>Sold by <a href="#">Daily Electronics </a>(4.5 out of 5 | 18,198 ratings)</small>
                                    <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Deliver to Customer - 424201</small>
                                </div>
                             <!-- !order-details -->

                             

                            <!-- size -->
                                
                            <!-- !size -->


                        </div>

                        <div class="col-12">
                            <h6 class="font-rubik">Product Description</h6>
                            <hr>
                            <p class="font-rale font-size-17"><?php echo $description ?></p>
                            
                        </div>
                    </div>
                </div>
            </section>
        <!--   !product  -->


          <!-- Top Sale -->
         
        <!-- !Top Sale -->

        </main>
    <!-- !start #main-site -->

    <!-- start #footer -->
        
        
    <!-- !start #footer -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Owl Carousel Js file -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>

    <!--  isotope plugin cdn  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha256-CBrpuqrMhXwcLLUd5tvQ4euBHCdh7wGlDfNz8vbu/iI=" crossorigin="anonymous"></script>

    <!-- Custom Javascript -->
    <script src="./index.js"></script>
</body>
</html>
<?php } ?>