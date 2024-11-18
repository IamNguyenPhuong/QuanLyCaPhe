<?php include('../config/constants.php')?>
<?php
            //Check whether the submit button is Clicked or not
            if(isset($_POST['add']))
            {
                //echo 'Clicked';

                //1. Get the value from category form

                $title=$_POST['title'];

                if(isset($_POST['featured']))
                {
                    //Get the value from form
                    $featured=$_POST['featured'];
                }
                else{
                    //Set the default value
                    $featured='No';
                }

                if(isset($_POST['active']))
                {
                    //Get the value from form
                    $active=$_POST['active'];
                }
                else{
                    //Set the default value
                    $active='No';
                }

                //CHeck whether the image is selected or not and set the value for image name accordingly
                // print_r($_FILES['image']);
                // die;
                
                if(isset($_FILES['image']['name']))
                {
                    //upload the image
                    //To upload image we need image name, source path and destination path
                    $image_name=$_FILES['image']['name'];

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

                        header("Location: ../admin/add-category.php");
                        
                        //Stop the process
                        die();
                    }
                }
                else
                {
                    //Don't upload image and set the image_name value as blank
                    $image_name="";
                }

                //2.Create SQL Query to Insert Category into Database

                $sql="INSERT INTO tbl_category SET 
                    title='$title',
                    image_name='$image_name',
                    featured='$featured',
                    active='$active'
                " ;

                //3. Execute the Querry and Save in Datebase
                $res=mysqli_query($conn, $sql) or die(mysqli_error());

                //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
                if($res==TRUE)
                {
                    //Query executed and category added
                    $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
                    //Redirrect to Manage Category Page
                    header("Location: ../admin/manage-category.php");
                }
                else{
                    //Failed to insert data
                    $_SESSION['add'] = "<div class='error'>Category Added Successfully.</div>";
                    //Redirrect to Manage Category Page
                    header('Location: ../admin/manage-category.php');
                }
            }
        ?>
<?php
            if(isset($_POST['category1']))
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
        <?php
            //Check whether update button is clicked or not
            if(isset($_POST['order']))
            {
                //Get all the values from form
                $id=$_POST['id'];
                $price=$_POST['price'];
                $quantity=$_POST['quantity'];

                $total = $price * $quantity;

                $status =$_POST['status'];

                $customer_name=$_POST['customer_name'];
                $customer_contact=$_POST['customer_contact'];
                $customer_email=$_POST['customer_email'];
                $customer_address=$_POST['customer_address'];

                //Update the values
                $sql2="UPDATE tbl_donhang SET
                    quantity=$quantity,
                    total=$total,
                    status='$status',
                    customer_name='$customer_name',
                    customer_contact='$customer_contact',
                    customer_email='$customer_email',
                    customer_address='$customer_address'
                    WHERE id =$id
                ";

                //Execute the Query
                $res2=mysqli_query($conn,$sql2);
                //Check whether update or not
                //And redirect to manage order with message
                if($res2==true)
                {
                    //Updated
                    $_SESSION['update']="<div class='success'>Order Updated Succesfully.</div>";
                    header('location: '.SITEURL.'admin/manage-order.php');
                }
                else
                {
                    $_SESSION['update']="<div class='error'>Order Updated Failed.</div>";
                    header('location: '.SITEURL.'admin/manage-order.php');
                }
            }
        ?>
<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
<!-- Header -->
<!-- Header -->
<header>
    <div class="sticky">
        <!-- Top Block -->
        <div class="top-block">
            <div class="logo">
                <img src="https://t4.ftcdn.net/jpg/05/14/51/79/360_F_514517927_dXLi1DauUmrCaE3AkElsVgJ1jaYZMcSA.jpg" alt="Coffee Shop Logo">
                <h1 style="font-family: Cursive;">Coffee</h1>
            </div>
            
            <div class="shop-info">
                <div class="actions">
                </div>
            </div>
            
        </div>

        <!-- Navigation Bar -->
        <?php
        session_start();

                        if(isset($_SESSION['username'])){
                            if($_SESSION['username']=='admin'){
                                echo'
                                <nav>
                <ul>
                    <li><a href="../quanlythongtinnhanvien/index.php">Nhân viên</a></li>
                    <li><a href="../quanlythongtinkhachhang/index.php">Khách hàng</a></li>
                    <li><a href="../admin/manage-order.php">Đơn hàng</a></li>
                    <li><a href="../quanlylichlamviec/quanlylichlamviec.php">Lịch làm việc</a></li>
                    <li><a href="../admin/manage-category.php">Danh mục</a></li>
                    <li><a href="../admin/manage-menu.php">Menu</a></li>
                    <li><a href="../admin/summary.php">Thống kê</a></li>
                    <li><a href="../quanlykho/kho.php">Kho</a></li>
                    <li><a href="../Tintuc/danhsach.php">Tuyển dụng</a></li>
                    <li><a href="../quanlylienhe/danhsachlienhe.php">Liên hệ</a></li>

                </ul>
                <button class="menu-button" id="menu-toggle">&#9776;</button>
                <div class="menu-list" id="menu-list">
                    <a href="../quanlythongtinnhanvien/index.php">Nhân viên</a>
                    <a href="../quanlythongtinkhachhang/index.php">Khách hàng</a>
                    <a href="../admin/manage-order.php">Đơn hàng</a>
                    <a href="../quanlylichlamviec/quanlylichlamviec.php">Lịch làm việc</a>
                    <a href="../admin/manage-category.php">Danh mục</a>
                    <a href="../admin/manage-menu.php">Menu</a>
                    <a href="../admin/summary.php">Thống kê</a>
                    <a href="../quanlykho/kho.php">Kho</a>
                    <a href="../Tintuc/danhsach.php">Tuyển dụng</a>
                    <a href="../quanlylienhe/danhsachlienhe.php">Liên hệ</a>
                </div>
            </nav>
                                ';
                            }else{
                                echo'
                                <nav>
                <ul>
                    <li><a href="../quanlythongtinkhachhang/index.php">Khách hàng</a></li>
                    <li><a href="../TAIKHOAN/account.php">Tài khoản nhân viên</a></li>
                    <li><a href="../admin/manage-order.php">Đơn hàng</a></li>
                    <li><a href="../quanlylichlamviec/quanlylichlamviec.php">Lịch làm việc</a></li>
                    <li><a href="../admin/manage-category.php">Danh mục</a></li>
                    <li><a href="../admin/manage-menu.php">Menu</a></li>
                    <li><a href="../quanlykho/kho.php">Kho</a></li>
                    <li><a href="../quanlylienhe/danhsachlienhe.php">Liên hệ</a></li>

                </ul>
                <button class="menu-button" id="menu-toggle">&#9776;</button>
                <div class="menu-list" id="menu-list">
                    <a href="../quanlythongtinkhachhang/index.php">Khách hàng</a>
                    <a href="../TAIKHOAN/account.php">Tài khoản nhân viên</a>
                    <a href="../admin/manage-order.php">Đơn hàng</a>
                    <a href="../quanlylichlamviec/quanlylichlamviec.php">Lịch làm việc</a>
                    <a href="../admin/manage-category.php">Danh mục</a>
                    <a href="../admin/manage-menu.php">Menu</a>
                    <a href="../quanlykho/kho.php">Kho</a>
                    <a href="../quanlylienhe/danhsachlienhe.php">Liên hệ</a>
                </div>
            </nav>
                                ';
                            }
                        }
                    ?>
            
        </div>
    </header>
    <script>
        // Lấy tham chiếu đến menu-toggle và menu-list
        const menuToggle = document.getElementById("menu-toggle");
        const menuList = document.getElementById("menu-list");

        // Khai báo biến để kiểm tra trạng thái menu
        let menuOpen = false;

        // Tạo hàm để hiển thị/ẩn menu
        function toggleMenu() {
            if (menuOpen) {
                menuList.style.left = "-200px"; // Ẩn menu bên trái
            } else {
                menuList.style.left = "0"; // Hiển thị menu
            }
            menuOpen = !menuOpen; // Đảo ngược trạng thái
        }

        // Thêm sự kiện click vào menu-toggle
        menuToggle.addEventListener("click", toggleMenu);
    </script>
</body>

