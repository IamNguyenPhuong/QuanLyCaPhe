<?php
    //Inlcude Constant file
    include('../config/constants.php');

    //echo "Delete page";
    //Check whether the id and image_name is set or not
    if(isset($_GET['id']) and isset($_GET['image_name']))
    {
        // echo "Get the value and delete";
        $id=$_GET['id'];
        $image_name=$_GET['image_name'];

        //Remove the physical image file is available
        if($image_name !="")
        {
            // $path="../images/".$image_name;
            // //Remove the image;
            // $remove=unlink($path);

            // //If failed to remove image then an error message and stop the process
            // if($remove==false)
            // {
            //     //Set the session message
            //     $_SESSION['remove'] ="<div class='error'>failed to Remove Category Image.</div>";
            //     //Redirrect to Manage Category page
            //     header('location: '.SITEURL.'admin/manage-category.php');
            //     //Stop the process
            //     die();
            // }

            //Delete Data from Database
            //SQL Query to Delete Data from Database
            $sql="DELETE FROM tbl_category WHERE id=$id";

            //Execute the Query
            $res=mysqli_query($conn,$sql);

            //Check to Manage Category Page with Message
            if($res==true)
            {
                //Set Success Message and Redirect
                $_SESSION['delete']="<div class='success'>Category Deleted Successfully.</div>";
                //Redirect to Manage Category
                header('location:'.SITEURL.'admin/manage-category.php');
            }
            else
            {
                //Set Fail Message and Redirect
                $_SESSION['delete']="<div class='error'>Category Deleted Successfully.</div>";
                //Redirect to Manage Category
                header('Location: ../admin/manage-category.php');
            }


        }
 
        //Delete Data from Database

        //Redirect to Manage Category Page with Message
    }
    else
    {
        //redirect to Manage Page
        header('location: '.SITEURL.'admin/manage-category.php');

    }
?>