<?php include('partials-front/header.php') ?>

<?php
    //Check whether id is passed or not
    if(isset($_GET['category_id']))
    {
        //Category id is set and get the id
        $category_id=$_GET['category_id'];
        //Get the category title based on category id
        $sql="SELECT title FROM tbl_category WHERE id =$category_id";

        //Execute the query
        $res=mysqli_query($conn,$sql);

        //Get the value from database
        $row=mysqli_fetch_assoc($res);
        //Get the title
        $category_title=$row['title'];

    }
    else{
        //category if not passed
        //Redirect to home page
        header('location: '.SITEURL);
    }
?>

<!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Menu on <a href="#" class="text-white"><?php echo $category_title ?></a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Menu</h2>

            <?php
                //Create SQL Query to get foods based on selected category
                $sql2="SELECT * FROM tbl_menu WHERE category_id=$category_id";

                //Execute the Query
                $res2= mysqli_query($conn,$sql2);

                //Count the Rows
                $count2=mysqli_num_rows($res2);

                //Check whether food is available or not
                if($count2>0)
                {
                    //Food is available
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $id=$row2['id'];
                        $title=$row2['title'];
                        $price=$row2['price'];
                        $description=$row2['description'];
                        $image_name=$row2['image_name'];
                        ?>
                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php
                                        if($image_name=="")
                                        {
                                            //Image not available
                                            echo "<div class='error'>Image not availabe</div>";
                                        }
                                        else{
                                            //Image available
                                            ?>
                                                <img src="<?php echo SITEURL; ?>images/menu/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                            <?php

                                        }
                                    ?>
                                    
                                </div>

                                <div class="food-menu-desc">
                                    <h4><?php echo $title; ?></h4>
                                    <p class="food-price"><?php echo $price; ?></p>
                                    <p class="food-detail">
                                    <?php echo $description; ?>
                                    </p>
                                    <br>

                                    <a href="<?php echo SITEURL; ?>Coffe_Store/order.php?menu_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                                    <!-- <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a> -->
                                </div>
                            </div>
                        <?php
                    }
                    

                }
                else
                {
                    //Food not available
                    echo "<div class='error'>Food not available</div>";
                }
            ?>

            

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
    <?php include('partials-front/footer.php'); ?>
    <script>
document.addEventListener("DOMContentLoaded", function() {
    var orderButtons = document.querySelectorAll(".btn.btn-primary");

    orderButtons.forEach(function(button) {
        button.addEventListener("click", function(event) {
            // Check if the session is not set (user not logged in)
            <?php if (!isset($_SESSION['username'])) { ?>
                event.preventDefault(); // Prevent the default action of the link
                window.location.href = "DANGNHAP/signin.php"; // Redirect to the login page
            <?php } ?>
        });
    });
});
</script>
