<?php
    echo "Update Category Page";
?>
<?php include('partials/header.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>

        <br><br>
        
        <?php
            //Chechk whether the id is set or not
            if(isset($_GET['id']))
            {
                //Get the ID and all othe details
                //echo "Getting the date"
                $id = $_GET['id'];
                $sql = "SELECT * FROM tbl_category WHERE id=$id";

                //Execute the Query
                $res=mysqli_query($conn, $sql);

                //count the Rows to check the id is valid or not
                $count=mysqli_num_rows($res);

                if($count==1)
                {
                    //Get all the data
                    $row=mysqli_fetch_assoc($res);
                    $title=$row['title'];
                    $current_image=$row['image_name'];
                    $featured=$row['featured'];
                    $active=$row['active'];
                }
                else
                {
                    //redirect to manage category with session message
                    $_SESSION['no-category-found'] = "<div class='error'>Category not found</div>";
                    header('location:'.SITEURL.'/admin/manange-category.php');
                }
            }
            else
            {
                //redirect to Mânge Category
                header('location:'.SITEURL.'admin/manage-category.php');
            }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                            if($current_image != "")
                            {
                                //Display the Image
                                ?>
                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width="150px">;

                                <?php
                            }
                            else
                            {
                                //Display the Message
                                echo "<div class='error'>Image Not Added</div>";
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if($featured == "Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes">Yes
                        <input <?php if($featured == "No"){echo "checked";} ?> type="radio" name="featured" value="No">No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if($active == "Yes"){echo "checked";} ?> type="radio" name="active" value="Yes">Yes
                        <input <?php if($active == "No"){echo "checked";} ?> type="radio" name="active" value="No">No
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name ="current image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="category1" value="Update Category" class="btn-secondary">
                    </td>
                </tr>


            </table>
        </form>

        <?php
            if(isset($_POST['submit']))
            {
                // echo "clicked";
                //1. Get all the values from our form
                 $id=$_POST['id'];
                 $title = $_POST['title'];
                 $current_image=$_POST['current_image'];
                 $featured=$_POST['featured'];
                 $active=$_POST['active'];

                 //2.Updating new image if selected
                 //Check whether the image is selected or not
                 if(isset($_FILES['image']['name']))
                 {
                    //Get the image detail
                    $image_name=$_FILES['image']['name'];
                    //Check whether the image is available or not
                    if($image_name !="")
                    {
                        //Image Available
                        //A. Upload the New Image

                        //Auto rename image
                        //Get the extension of our image (jpg, png, gif, etc) e.g. "cafe.jpg"
                        // $ext=end(explode('.',$image_name));

                        // //Rename the Imge
                        // $image_name="Category_".rand(000,999).'.'.$ext;

                        $source_path=$_FILES['image']['tmp_name'];

                        $destination_path="../images/category/".$image_name;

                        //Finally upload the image
                        $upload=move_uploaded_file($source_path,$destination_path);

                        //Check whether the image is uploaded or not
                        //And if the image is not uploaded the we will stop the process and redirect with error message
                        if($upload==false)
                        {
                            //Set message
                            $_SESSION['upload']="<div class='error'>Failed to Upload Image</div>";
                            //Redirrect tio Add Category

                            header("location".SITEURL."admin/add-category.php");
                            
                            //Stop the process
                            die();
                        }

                        //B. Remove the curent image
                        // if($current_image !="")
                        // {
                        //     $remove_path="../images/category/".$image_name;

                        //     $remove=unlink($remove_path);

                        //     //Chechk whether the image is removed or not
                        //     //if failed to remove then display message and stop the process
                        //     if($remove==false)
                        //     {
                        //         //Failed to remove image
                        //         $_SESSION['failed remove']="<div class='error'>Failed to remove current</div>";
                        //         header("location".SITEURL."admin/manage-category.php");
                        //     }
                        // }
                        
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

                 //3.Update the Database
                $sql2="UPDATE tbl_category SET 
                    title='$title',
                    image_name='$image_name',
                    featured='$featured',
                    active='$active' 
                    WHERE id=$id";

                 //Execute the Query
                 $res2=mysqli_query($conn, $sql2);


                 //4.Redirect to Manage Category with message
                 //Check whether executed or not
                 if($res2==true)
                 {
                    //Category Updated
                    $_SESSION['update']="<div class='succes'>Category Updated Successfully.</div>";
                    header('location: ../admin/manage-category.php');
                 }
                 else
                 {
                    //failed to update category
                    $_SESSION['update']="<div class='error'>Category Updated Failed.</div>";
                    header('location: ../admin/manage-category.php');
                    die();
                 }
            }
        ?>

    </div>
</div>

<?php include('partials/footer.php')?>