<?php include('partials-front/header.php'); ?>
<!-- Navbar Section Ends Here -->

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">
        <?php
        $search = $_POST['search'];
        ?>
        <h2>Foods on Your Search <a href="#" class="text-white"><?php echo $search; ?></a></h2>
    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Menu</h2>

        <?php
        $search = $_POST['search'];
        $sql = "SELECT * FROM tbl_menu WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);

        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];
                ?>
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <?php if ($image_name == "") { ?>
                            <div class='error'>Image not available</div>
                        <?php } else { ?>
                            <img src="<?php echo SITEURL; ?>images/menu/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                        <?php } ?>
                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $title; ?></h4>
                        <p class="food-price"><?php echo $price ?></p>
                        <p class="food-detail"><?php echo $description; ?></p>
                        <a id="orderButton" href="<?php echo SITEURL; ?>order.php?menu_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
            <?php
            }
        } else {
            echo "<div class='error'>Food not found</div>";
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