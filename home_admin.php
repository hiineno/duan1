<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="./src/css/kkk.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,1,0" />


</head>

<body>
    <div class="container">
        <aside>
            <div class="top">
                <a href="index.php">
                    <div class="logo">

                        <img src="./src/imgs/kkkk.jpg" alt="">

                    </div>
                </a>

                <!-- END LOGO -->
                <div class="close" id="close-btn">
                    <span class="material-symbols-outlined">
                        close
                    </span>

                </div>

                <!-- END BTN_CLOSE -->
            </div>
            <!-- END TOP  -->


            <div class="sidebar">

                <a href="index.php?act=dashbord">
                    <span class="material-symbols-outlined">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="index.php?act=add_status">
                    <span class="material-symbols-outlined">grid_view</span>
                    <h3>Status</h3>
                </a>

                <a href="index.php?act=show_product" class="product">
                    <span class="material-symbols-outlined">inventory_2</span>
                    <h3>Products</h3>
                </a>


<!-- 
                <a href="index.php?act=add_product">
                    <span class="material-symbols-outlined">add_business</span>
                    <h3>Add Products</h3>
                </a> -->

                <a href="index.php?act=show_type" class="categories">
                    <span class="material-symbols-outlined">category</span>
                    <h3>Categories</h3>
                </a>

                <!-- <a href="index.php?act=add_type">
                    <span class="material-symbols-outlined">post_add</span>
                    <h3>Add Category</h3>
                </a> -->

                <a href="index.php?act=show_account">
                    <span class="material-symbols-outlined">person</span>
                    <h3>Account</h3>
                </a>
                <a href="index.php?act=admin_bill">
                    <span class="material-symbols-outlined">person</span>
                    <h3>Bill manager</h3>
                </a>
                <a href="index.php?act=thongke">
                    <span class="material-symbols-outlined">monitoring</span>
                    <h3>Analytics</h3>
                </a>

                <a href="index.php?act=list_cmt">
                    <span class="material-symbols-outlined">mail</span>
                    <h3>Comment</h3>
                    <!-- <span class="message-count">26</span> -->
                </a>


                <a href="index.php?act=logout">
                    <span class="material-symbols-outlined">logout</span>
                    <h3>Logout</h3>
                </a>


            </div>


        </aside>

