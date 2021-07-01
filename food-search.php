 <?php include 'partials-front/menu.php'; ?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php
             //get the search keybord
            $search = $_POST['search'];
             ?>
            <h2>Foods on Your Search <a href="#" class="text-white"><?php echo $search; ?></a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
            
            //sql query to get based on search keybord
            $sql = "SELECT * FROM tbl_food WHERE  title LIKE '%$search%' or description LIKE '%$search%'"
;
            //exeute the query
            $res = mysqli_query($con,$sql);
            //count the rows
            $count = mysqli_num_rows($res);
            //cheack the food available or not
            if ($count > 0) {
                # code...
                //food available
                while ($row = mysqli_fetch_assoc($res)) {
                    # code...
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php 
                            //cheack whether the image name is available or not
                            if ($image_name == "") {
                                # code...
                                //Image is not avialable
                                 echo "<div class='error'>Image is not available</div>";
                            }else{
                                //image is available
                                ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                <?php
                            }

                             ?>
                            
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price">Rs- <?php echo $price; ?></p>
                            <p class="food-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>

                            <a href="#" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>

                    <?php
                }
            }else{
                //food is not available
                echo "<div class='error'>Food is not found</div>";
            }

             ?>




            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->
<?php include 'partials-front/footer.php'; ?>