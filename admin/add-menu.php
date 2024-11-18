<?php ob_start(); include('partials/header.php') ?>

<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add_food</title>
</head>
<body>
    <div class="main-content">
        <div class="wrapper">
            <h1>Add Food</h1>

            <?php
                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30" >
                    <tr>
                        <td>Title: </td>
                        <td>
                            <input type="text" name="title" placeholder="Title of the Food">
                        </td>
                    </tr>

                    <tr>
                        <td>Description: </td>
                        <td>
                            <textarea name="description" cols="30" row="5" placeholder="Decription of the Food"></textarea>
                        </td> 
                    </tr>

                    <tr>
                        <td>Prices: </td>
                        <td>
                            <input type="number" name="price">
                        </td>
                    </tr>

                    <tr>
                        <td>Select Image: </td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr> 

                    <tr>
                        <td>Category: </td>
                        <td>
                            <select name="category">
                                <?php
                                    //Create php code to display categories from database
                                    //1.Create sql to get all active categories from database
                                    $sql="SELECT * FROM tbl_category WHERE active='yes'";

                                    //Executing query
                                    $res=mysqli_query($conn,$sql);

                                    //count Row to check whether we have categories or not
                                    $count = mysqli_num_rows($res);

                                    //if count is greater than 0, we have categories else we do not have categories
                                    if($count>0)
                                    {
                                        //we have categories
                                        while($row=mysqli_fetch_assoc($res))
                                        {
                                            //get the datails of categories
                                            $id=$row['id'];
                                            $title=$row['title'];
                                            ?>
                                                <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        //We do not have category
                                        ?>
                                            <option value="0">No Category Found</option>
                                        <?php
                                    }

                                    //2.Display on Dropdown
                                ?>
                                
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Featured: </td>
                        <td>
                            <input type="radio" name="featured" value="Yes"> Yes
                            <input type="radio" name="featured" value="No"> No
                        </td>
                    </tr>

                    <tr>
                        <td>Active: </td>
                        <td>
                            <input type="radio" name="active" value="Yes"> Yes
                            <input type="radio" name="active" value="No"> No
                        </td>
                    </tr>

                    <tr>
                        <td colsppan="2">
                            <input type="submit" name="addmenu" value="Add Food" class="btn-secondary">
                        </td>
                    </tr>
                    
                </table>
            </form>

            <?php
                //Check whether the button is clicked or not
                if(isset($_POST['addmenu']))
                {
                    //Add food in database
                    // echo "Clicked";
                    //1.Get tha data form form
                    $title=$_POST['title'];
                    $description=$_POST['description'];
                    $price=$_POST['price'];
                    $category=$_POST['category'];

                    //Check whether radio button for featured and active are checked or not
                    if(isset($_POST['featured']))
                    {
                        $featured=$_POST['featured'];
                    }
                    else{
                        $featured="No";
                    }
                    
                    if(isset($_POST['active']))
                    {
                        $active=$_POST['active'];
                    }
                    else{
                        $active="No";
                    }
                    //2.Upload the image if selected
                    //Check whether the select image is clicked or not and upload the image only if the image is selected
                    if(isset($_FILES['image']['name']))
                    {
                        //Get the detail of the selected image
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
                                header('location: add-menu.php');
                                //Stop the process
                                die();
                            }
                        }
                    }
                    else
                    {
                        $image_name="";//setting default value as blank
                    }

                    //3.Insert into database

                    //Create Sql query to save or add food
                    //for numerical we do not need to pass value inside quote '', But for string value it is compulsory to add quote ''
                    $sql="INSERT INTO tbl_menu SET
                        title='$title',
                        description='$description',
                        price=$price,
                        image_name='$image_name',
                        category_id='$category',
                        featured='$featured',
                        active='$active'
                        ";
                    
                    //Create the query
                    $res2=mysqli_query($conn,$sql);
                    //Check whether data inserted or not

                    if($res2 == true)
                    {
                        //Data inserted succesfully
                        $_SESSION['add']="<div class='success'>Food Added Successfully</div>";
                        header("location: manage-menu.php");
                        ob_end_flush();
                    }
                    else
                    {
                        //Failed to insert data
                        $_SESSION['add']="<div class='error'>Food Added Failed</div>";
                        header("location: manage-menu.php");
                    }

                    //4.Redirect with message to Manage Food page
                }
            ?>

        </div>
    </div>
</body>
</html>

<?php include('partials/footer.php') ?>