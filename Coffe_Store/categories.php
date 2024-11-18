<?php include('partials-front/header.php') ?>



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>


            <?php
                //Create SQL query to display categories from database
                $sql="SELECT * FROM tbl_category WHERE active='yes' ";  // LIMIT 3(code)
                //execute quẻy
                $res=mysqli_query($conn,$sql);
                //Count rows to check whether the category is available or not
                $count=mysqli_num_rows($res);

                if($count>0)
                {
                    //Categories available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //get the values like id, title, image name
                        $id=$row['id'];
                        $title=$row['title'];
                        $image_name=$row['image_name'];
                        ?>
                            <a href="<?php echo SITEURL; ?>Coffe_Store/category-menu.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php
                                    if($image_name=="")
                                    {
                                        //Display message
                                        echo "<div class='error'>Image not avaiable</div>";
                                    }
                                    else{
                                        //Image available
                                        ?>
                                            <img src="<?php echo SITEURL ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                                        <?php
                                    }

                                ?>
                                

                                <h3 class="float-text text-white"><?php echo $title; ?></h3>
                            </div>
                            </a>
                        <?php
                    }
                }
                else
                {
                    //Categories not available
                    echo "<div class='error'>Category not Added</div>";
                }
            ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    <!-- social Section Starts Here -->
    <?php include('partials-front/footer.php'); ?>