<?php include 'partials-front/menu.php'; ?>
<?php 
    //cheack whether food id is set or not
if (isset($_GET['food_id'])) {
    # code...
    //get the food id and detailse of selected food id
    $food_id = $_GET['food_id'];
    //get the detaile selected food _id
    $sql = "SELECT * FROM tbl_food WHERE id = '$food_id'";
    //execute the query
    $res = mysqli_query($con,$sql);
    //count the rows
    $count = mysqli_num_rows($res);
    //check whether food is available or not
    if ($count > 0) {
        # code...
        //Food is available
        //get the data from databasse
        $row = mysqli_fetch_assoc($res);
        $title = $row['title'];
        $price = $row['price'];
        $description = $row['description'];
        $image_name = $row['image_name'];
    }else{
        //Food is not available
        //redirect to the home page
        header('location'.SITEURL);
    }
}else{
    //redirect to the home page
    header('location'.SITEURL);
}

 ?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" class="order" method="POST">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <?php 
                        //cheack whether the image name is available or not
                        if ($image_name == "") {
                            # code...
                            //Image is not available
                            echo "<div class='error'>Image is not available</div>";
                        }else{
                            //Image is available
                            ?>
                            <img src="<?php echo SITEURL; ?>/images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                            <?php
                        }

                         ?>
                        
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">

                        <p class="food-price">Rs- <?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Karan Gorai" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. karangorai@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php 
            //whether the submit button is ckicked or not
            if (isset($_POST['submit'])) {
                # code...
                $food = $title;
                $price = $price;
                $qty = $_POST['qty'];
                $total = $price * $qty;
                $order_date = date("Y-m-d h:i:s");
                $status = "Ordered";
                $customer_name = $_POST['full-name'];
                $customer_contact = $_POST['contact'];
                $customer_email = $_POST['email'];
                $customer_address = $_POST['address'];

                //save  the order in database
                //create sql query to save the data
                $sql2 = "INSERT INTO `tbl_order`(`food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES ('$food',$price,$qty,$total,'$order_date','$status','$customer_name','$customer_contact','$customer_email','$customer_address')";
                //execute the query
                $res2 = mysqli_query($con,$sql2);
                //cheack whther the query executed successfully or not
                if ($res2 == true) {
                    # code...
                    //query executed and order save 
                    echo "Ordered";
                    $_SESSION['order']="<div style='color: green; text-align: center;'>Food Order Successfully</div>";
                    header('location:'.SITEURL);
                }else{
                    //failes to save order
                    $_SESSION['order']="<div style='color: red; text-align: center;'>Failed to Order</div>";
                    header('location:'.SITEURL);
                }
                
            }
             ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
<?php include 'partials-front/footer.php'; ?>
