<?php include 'partials-front/menu.php'; ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>/food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
<?php 
    if (isset($_SESSION['order'])) {
        # code...
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    }
 ?>

        <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>


            <?php 

            //create sql qury to display data from database
            $sql = "SELECT * FROM tnl_category WHERE active='yes' AND featured ='yes' LIMIT 6";
            //execute the query
            $res = mysqli_query($con,$sql);
            //count rows to cheack whether the category is availabe or not
            $count = mysqli_num_rows($res);

            if ($count > 0) {
                # code...
                //category abailable
                while ($row = mysqli_fetch_assoc($res)) {
                    # code...
                    //get the value llike title id and image
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>
                    <a href="<?php echo SITEURL; ?>/category-foods.php?category_id=<?php echo $id; ?>">
                    <div class="box-3 float-container">
                        <?php 
                        //cheack whether image is availabe or not
                            if ($image_name == "") {
                                # code...
                                //display the message
                                echo"<div class='error'>Image is not available</div>";
                            }else{
                                //image is available
                                ?>
                                 <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                                <?php
                            }

                         ?>
                        <!-- <h3 class="float-text text-white"><?php echo $title; ?></h3> -->
                    </div>
                    </a>

                    <?php

                }
            }else{
                //category not available
                echo "<div class='error'>Category not added</div>";
            }

             ?>

            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
            //adding all the foods that are active 
            $sql2 = "SELECT * FROM tbl_food WHERE active ='yes' AND featured = 'yes' limit 6";
            //execute the query
            $res2 = mysqli_query($con,$sql2);
            //count the rows
            $count = mysqli_num_rows($res2);
            //cheack food available or not
            if ($count > 0) {
                # code...
                //food available
                while ($row2 = mysqli_fetch_assoc($res2)) {
                    # code...
                    //get all the values
                    $id = $row2['id'];
                    $title = $row2['title'];
                    $price = $row2['price'];
                    $description = $row2['description'];
                    $image_name  = $row2['image_name'];
                    ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php 
                            //cheack image is available or not 
                            if ($image_name == "") {
                                # code...
                                //image is not available
                                echo"<div class='error'>Image is not available</div>";
                            }else{
                                //image is avilable
                                ?>
                                 <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                <?php
                            }

                             ?>
                           
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price">Rs-<?php echo $price; ?></p>
                            <p class="food-detail">
                               <?php echo $description; ?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>

                    <?php
                }
            }else{
                //food not availave
                echo "<div class='error'>Food not availave</div>";

            }

             ?>


            


            <div class="clearfix"></div>
        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include 'partials-front/footer.php'; ?>