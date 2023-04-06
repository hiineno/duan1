<!DOCTYPE html>
<html lang="xxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DKQT SHOP</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./src/font/fontawesome-free-6.1.1-web/css/all.min.css">
    <!-- Css Styles -->
    <link rel="stylesheet" href="./src/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./src/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="./src/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="./src/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="./src/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="./src/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="./src/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="./src/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            
        </div>
        <div class="humberger__menu__widget">
            <?php
            if (empty($_SESSION['username'])) {
            ?>
                <div class="header__top__right__language">

                    <a href="index.php?act=login" style="color:black">
                        <i class="fa fa-user"></i> Login</a>
                </div>
            <?php
            } else {
                $username = $_SESSION['username'];
            ?>
                <div class="header__top__right__language">
                    <a href="#" style="color:black">
                        <?php
                        $sql = "SELECT user_avatar FROM user WHERE user_id LIKE '$username'";
                        $query = getAll($sql);
                        foreach ($query as $row) :
                            if (empty(['user'])) {
                        ?>
                                <i class="fa fa-user"><?= $username ?></i></a>
                <?php
                            } else {
                ?>
                    <i class="fa fa-user"><?= $username ?></i></a>
                <?php
                            }
                ?>
            <?php endforeach;
            ?>
            <ul>
                <li><a href="index.php?act=setting">Cài đặt</a></li>

                <li><a href="index.php?act=logout">Đăng xuất</a></li>
            </ul>
                </div>
            <?php
            }
            ?>
        </div>

        <div class="humberger__menu__contact">
            <ul>
                <li>Address: Phu Do Ha Noi</li>
                <li>Phone: +84 346 93 8386</li>
                <li>Email: hiinenodz@gmail.com</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li>Address: Phu Do Ha Noi</li>
                                <li>Phone: +84 346 93 8386</li>
                                <li>Email: hiinenodz@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <?php
                            if (empty($_SESSION['username'])) {
                            ?>
                                <div class="header__top__right__language">
                                    <div class="header__top__right__language">
                                        <a href="index.php?act=login" style="color:black">
                                            <i class="fa fa-user"></i> Login</a>
                                    </div>
                                    <div class="header__top__right__language" style="margin-left: 16px ;">
                                        <a href="index.php?act=register" style="color:black">
                                            <i class="fa fa-user"></i> Sign Up</a>
                                    </div>
                                </div>
                            <?php
                            } else {
                                $username = $_SESSION['username'];
                            ?>
                                <div class="header__top__right__language">
                                    <a href="#" style="color:black">
                                        <?php
                                        $sql = "SELECT user_avatar FROM user WHERE user_id LIKE '$username'";
                                        $query = getAll($sql);
                                        foreach ($query as $row) :
                                            if (empty(['user'])) {
                                        ?>
                                                <i class="fa fa-user"><?= $username ?></i></a>
                                <?php
                                            } else {
                                ?>
                                    <i class="fa fa-user"><?= $username ?></i></a>
                                <?php
                                            }
                                ?>
                            <?php endforeach;
                            ?>
                            <ul>
                                <li><a href="index.php?act=setting">Cài đặt</a></li>

                                <li><a href="index.php?act=logout">Đăng xuất</a></li>
                            </ul>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">

                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="index.php?act=home_user">Home</a></li>
                            <li><a href="index.php?act=shop">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">                     
                                    <li><a href="index.php?act=bill">Bill</a></li>
                                    <li><a href="index.php?act=cart">Cart</a></li>
                                </ul>
                            </li>
                            <li><a href="index.php?act=detail_news&id=3">Blog</a></li>
                            <li><a href="index.php?act=home_user">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <?php 
  
                        ?>
                    
                    <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span></span></a></li>
                            <li><a href="index.php?act=cart"><i class="fa fa-shopping-bag"></i>
                            <?php
                                if(isset($_SESSION['cart'])){
                                $count = count($_SESSION['cart']);
                                }
                                 ?>
                            <span>
                                <?php
                                echo $count;
                               ?> 
                            </span></a></li>
                            <li><a href="index.php?act=bill"><i class="fa-solid fa-truck"></i>
                            <span>
                                <?php 
                                if(!empty($_SESSION['username'])){
                                    $username  = $_SESSION['username'];
                                }
                                $sql = "SELECT count(cart_id) AS count_id FROM cart WHERE user_id LIKE '$username'";
                                $query = getAll($sql);
                                foreach($query as $row){
                                    echo $row['count_id'];
                                }
                                ?>
                            </span>
                        </a></li>
                        </ul>
                
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <section class="hero  hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Tất cả danh mục</span>
                        </div>
                        <ul>
                            <?php
                            $sql = "SELECT * FROM `type`";
                            $query = getAll($sql);
                            foreach ($query as $item) {
                            ?>
                                <li><a href="#"><i class="fa-solid fa-check"></i> <?= $item['type_name'] ?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                    <div class="hero__search__form">
                            <form action="index.php?act=search_product" method="POST">
                                <div class="hero__search__categories">
                                    All Categories
                                </div>
                                <input type="text" placeholder="What do yo u need?" name="search_product">
                                <button type="submit" name="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+84 346 93.8386</h5>
                                <span>Support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="./src/js/jquery-3.3.1.min.js"></script>
        <script src="./src/js/bootstrap.min.js"></script>
        <script src="./src/js/jquery.nice-select.min.js"></script>
        <script src="./src/js/jquery-ui.min.js"></script>
        <script src="./src/js/jquery.slicknav.js"></script>
        <script src="./src/js/mixitup.min.js"></script>
        <script src="./src/js/owl.carousel.min.js"></script>
        <script src="./src/js/main.js"></script>

</body>