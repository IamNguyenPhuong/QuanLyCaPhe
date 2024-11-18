<?php ob_start(); include('partials/header.php')?>

<?php
    //Check whether id is set or not
    if(isset($_GET['id']))
    {
        //Get all the detail
        $id=$_GET['id'];

        //SQL query to get the selected food
        $sql2="SELECT * FROM tbl_menu WHERE id=$id";
        //execute the query
        $res2=mysqli_query($conn,$sql2);

        //Get the value based on query on query executed
        $row2=mysqli_fetch_assoc($res2);

        //get the individual values of selected food
        $title=$row2['title'];
        $description=$row2['description'];
        $price=$row2['price'];
        $current_image=$row2['image_name'];
        $current_category=$row2['category_id'];
        $featured=$row2['featured'];
        $active=$row2['active'];
    }
    else
    {
        //Redirect to image food
        header('location: '.SITEURL.'admin/manage-food.php');
    }
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update food</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">

                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                            if($current_image=="")
                            {
                                //image not available
                                echo "<div class='error'>Image not available</div>";
                            }
                            else
                            {
                                //Image available
                                ?>
                                    <img src="<?php echo SITEURL; ?>images/menu/<?php echo $current_image; ?>" width="150px">
                                <?php
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>Select new image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">

                            <?php
                                //query to get active categories
                                $sql="SELECT * FROM tbl_category WHERE active='Yes'";
                                //Execute the query
                                $res=mysqli_query($conn,$sql);
                                //count rows
                                $count=mysqli_num_rows($res);

                                //Check whether category vailable or not
                                if($count>0)
                                {
                                    //Category available
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        $category_title=$row['title'];
                                        $category_id=$row['id'];

                                        // echo "<option value='$category_id'>$category_title</option>";
                                        ?>
                                            <option <?php if($current_category==$category_id){echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                        <?php
                                    }
                                }
                                else
                                {
                                    //category not available
                                    echo "<option value='0'>Category not available</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes
                        <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes
                        <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image ?>">
                        <input type="submit" name="submit" value="Update Food" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>

        <?php
            
            if(isset($_POST['submit']))
            {
                // echo "clicked";

                //1. Get all the detail from the form
                $id=$_POST['id'];
                $title=$_POST['title'];
                $description=$_POST['description'];
                $price=$_POST['price'];
                $current_image=$_POST['current_image'];
                $category=$_POST['category'];

                $featured=$_POST['featured'];
                $active=$_POST['active'];


                //2.Upload the image if selected

                //Check whether upload buton is clicked or not
                if(isset($_FILES['image']['name']))
                 {
                    //Get the image detail
                    $image_name=$_FILES['image']['name'];

                    //Check whether the image is selected or not and upload image only is selected
                    if($image_name!="")
                    {
                        //image is selected
                        //A.Rename the Image
                        

                        //B.Upload the Image
                        //Get the src path and détination path

                        //Source path is the current location of image
                        $src=$_FILES['image']['tmp_name'];

                        //Destionation path for the image to be upload
                        $dst="../images/menu/".$image_name;

                        //Finally upload the food image
                        $upload=move_uploaded_file($src,$dst);

                        //Check whether image upload or not
                        if($upload==false)
                        {
                            //Failed to upload the image
                            //Redirect to add food pafe with error message
                            $_SESSION['upload']="<div class='error'>Failed to upload image</div>";
                            header('location: '.SITEURL.'admin/add-menu.php');
                            //Stop the process
                            die();
                        }
                    }
                    else
                    {
                        $image_name=$current_image;
                    }

                 }
                 else
                 {
                    $image_name=$current_image;
                 }
                

                

                //4.Update the food in database
                $sql3="UPDATE tbl_menu SET
                    title='$title',
                    description='$description',
                    price=$price,
                    image_name='$image_name',
                    category_id='$category',
                    featured='$featured',
                    active='$active'
                    WHERE id=$id";

                //execute query
                $res3=mysqli_query($conn,$sql3);

                //Chechk whether the query is executed or not
                if($res3==true)
                {
                    //Query executed and food update
                    $_SESSION['update']="<div class='success'>Food Updated Succesfully</div>";
                    header('location: ../admin/manage-menu.php');
                    ob_end_flush();
                }
                else
                {
                    //Failed to update food
                    $_SESSION['update']="<div class='error'>Food Updated Failed</div>";
                    header('location: ../admin/manage-menu.php');
                }
                //Redirect to manage food with session message
            }

        ?>
    </div>
</div>

<?php include('partials/footer.php')?>
