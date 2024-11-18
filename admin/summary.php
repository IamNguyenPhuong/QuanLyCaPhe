<?php include('partials/header.php');?>

<div class="main-content">
        <div class="wrapper">
        <?php 
if(isset($_SESSION['usernamenhanvien'])){
    echo '<a href="http://localhost/QuanLyCaPhe/trangchu/trangchunhanvien.php">Quay lại</a>';
   

}
else if(isset($_SESSION['usernameadmin'])){
    echo '<a href="http://localhost/QuanLyCaPhe/trangchu/trangchuquanly.php">Quay lại</a>';}
  
?>
            <h1>Dashboard</h1>

            <div class="col-4 text-center">
                
                <?php
                    //sql query
                    $sql= "SELECT * FROM tbl_category";
                    //execute query
                    $res=mysqli_query($conn,$sql);

                    //Count rows
                    $count=mysqli_num_rows($res);
                 ?>
                
                <h1><?php echo $count; ?></h1>
                <br/>
                Danh mục
            </div>

            <div class="col-4 text-center">
                
                <?php
                    //sql query
                    $sql2= "SELECT * FROM tbl_menu";
                    //execute query
                    $res2=mysqli_query($conn,$sql2);

                    //Count rows
                    $count2=mysqli_num_rows($res2);
                ?>

                <h1><?php echo $count2; ?></h1>
                <br/>
                Đồ ăn và đồ uống
            </div>

            <div class="col-4 text-center">
                <?php
                    //sql query
                    $sql3= "SELECT * FROM tbl_donhang";
                    //execute query
                    $res3=mysqli_query($conn,$sql3);

                    //Count rows
                    $count3=mysqli_num_rows($res3);
                ?>
                <h1><?php echo $count3; ?></h1>
                <br/>
                Số đơn
            </div>

            <div class="col-4 text-center">
                <?php
                    //Create SQL Query to get total revenue generated
                    //Aggregate function in sql
                    $sql4="SELECT SUM(total) AS Total FROM tbl_donhang WHERE status='Delivered' ";

                    //Execute the Query
                    $res4=mysqli_query($conn,$sql4);

                    //Get the value
                    $row4=mysqli_fetch_assoc($res4);

                    //Get the total revenue
                    $total_revenue=$row4['Total'];
                ?>
                <h1><?php echo $total_revenue; ?></h1>
                <br/>
                Doanh thu
            </div>

            <div class="clearfix"></div>
        </div>
        
    </div>

<?php include('partials/footer.php');?>