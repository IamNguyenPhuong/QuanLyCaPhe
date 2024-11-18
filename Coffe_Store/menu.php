

<?php include('partials-front/header.php');

?>
<?php
    if(isset($_GET['buy'])){
        echo'<script>alert("Giỏ hàng đang trống hãy mua hàng!")</script>';
    }
?>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>Coffe_Store/menu-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
                
                //getting Foods from Database that are active and featured
                //SQL Query
                $sql2="SELECT * FROM tbl_menu WHERE active='yes' ";

                //Execute the Query
                $res2=mysqli_query($conn,$sql2);

                //Count Row
                $count2=mysqli_num_rows($res2);

                //Check wheter test available or not
                if($count2>0)
                {
                    //food available
                    while($row=mysqli_fetch_assoc($res2))
                    {
                        $id=$row['id'];
                        $title=$row['title'];
                        $price=$row['price'];
                        $description=$row['description'];
                        $image_name=$row['image_name'];
                        ?>
                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php
                                        //Check whether image available or not
                                        if($image_name=="")
                                        {
                                            //Image not available
                                            echo "<div class='error' >Image not available</div>";
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
                                        <?php
                                            echo  $description;
                                        ?>
                                    </p>
                                    <br>

                                    <a id="orderButton" href="http://localhost/QuanLyCaPhe/Coffe_Store/order.php?menu_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>

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
    var orderButtons = document.querySelectorAll("#orderButton");

    orderButtons.forEach(function(button) {
        button.addEventListener("click", function(event) {
            // Kiểm tra điều kiện đăng nhập ở đây
            <?php if (!isset($_SESSION['username'])) { ?>
                event.preventDefault(); // Ngăn chặn hành động mặc định của nút
                window.location.href = "DANGNHAP/signin.php"; 
            <?php } ?>
        });
    });
});
</script>
