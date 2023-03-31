<?php

?>
<!DOCTYPE html>
<html lang="zxx">

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
    <!-- <div class="humberger__menu__overlay"></div> -->
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span><?php
                                                            if (!empty($_SESSION['cart']['total_all'])) {
                                                                echo $_SESSION['cart']['total_all'];
                                                            }
                                                            ?></span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <a href="./index.php?act=login"><i class="fa fa-user"></i> Login</a>
                <i class="fa-sharp fa-solid fa-chevron-down"></i>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="./index.php?act=login"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.html">Home</a></li>
                <li><a href="index.php?act=shop">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i>hiinenodz@gmail.com</li>
                <li>Free Shipping for all Order of $99</li>
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
                                <li><i class="fa fa-envelope"></i>hiinenodz@gmail.com</li>
                                <li>Free Shipping for all Order of $99</li>
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
                                    <img src="img/language.png" alt="">
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
                                    <img src="./src/imgs/img_avatar/<?= $row['user_avatar'] ?>" width="30px" height="30px" alt=""><?= $username ?>
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

                            <!-- <div class="header__top__right__auth">
                                <a href="index.php?act=login"><i class="fa fa-user"></i> Login</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
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
                    <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span></span></a></li>
                            <li><a href="index.php?act=cart"><i class="fa fa-shopping-bag"></i> <span>
                                <?php
                                if(isset($_SESSION['cart'])){
                                $count = count($_SESSION['cart']);
                                }
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
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero ">
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
                            $sql = "SELECT * FROM type";
                            $query = getAll($sql);
                            foreach ($query as $item) {
                            ?>
                                <li><a href="index.php?act=product_type&id=<?= $item['type_id'] ?>"><i class="fa-solid fa-check"></i> <?= $item['type_name'] ?></a></li>

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
                <div class="hero__item set-bg" data-setbg="./src/img/banner.jpg">
                    <div class="hero__text">
                        <span>Đức Luxury</span>
                        <h2>Fashion<br />100% Quanlity</h2>
                        <p>Nhận và giao hàng miễn phí có sẵn</p>
                        <a href="index.php?act=shop " class="primary-btn">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <?php
                    $sql = "SELECT * FROM type";
                    $query = getAll($sql);
                    foreach ($query as $item) {
                    ?>
                        <div class="col-lg-3">
                            <div class="categories__item">
                                <img src="./src/imgs/img_type/<?php echo $item['type_avatar'] ?>">
                                <h5>
                                    <a href="index.php?act=product_type&id=<?= $item['type_id'] ?>"><?= $item['type_name'] ?></a>
                                </h5>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản phẩm nổi bật</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php
                $sql = "SELECT * FROM type";
                $query = getAll($sql);
                foreach ($query as $value) :
                ?>
                    <div class="col mix <?php echo $value['type_id'] ?>">
                        <div class="featured__item">
                            <?php
                            $sql = "SELECT * FROM product WHERE `type_id` = $value[type_id] LIMIT 3";
                            $query = getAll($sql);
                            foreach ($query as $key) :
                            ?>
                                <div class="featured__item__pic">
                                    <img src="./src/imgs/img_product/<?= $key['product_avatar'] ?>" alt="" class="">
                                    <ul class="featured__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="index.php?act=detail_product&id=<?= $key['product_id'] ?>"><i class="fa-solid fa-circle-info"></i></a></li>
                                        <li><a href="index.php?act=add_cart&id=<?= $key['product_id'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="featured__item__text">
                                    <h6><a href="#"><?= $key['product_name'] ?></a></h6>
                                    <h5><?= $key['product_price'] ?></h5>
                                </div>
                            <?php endforeach

                            ?>
                        </div>
                    </div>
                <?php endforeach
                ?>
            </div>
        </div>
    </section>

    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>Tin tức</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $sql = "SELECT * FROM `news`";
                $query = getAll($sql);
                foreach ($query as $item) {
                ?>
                    <a href="index.php?act=detail_news&id=<?= $item['news_id'] ?>">
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="./src/imgs/img_news/<?= $item['news_avatar'] ?>" alt="" width="290px" height="163px">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i><?= $item['news_date'] ?></li>
                                        <li><i class="fa fa-comment-o"></i> 5</li>
                                    </ul>
                                    <h5><a href="#"><?= $item['news_title'] ?></a></h5>
                                    <p><?= $item['news_desc'] ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: Phu Do Ha Noi</li>
                            <li>Phone: +84 346 93 8386</li>
                            <li>Email: hiinenodz@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="./src/js/jquery-3.3.1.min.js"></script>
    <script src="./src/js/bootstrap.min.js"></script>
    <script src="./src/js/jquery.nice-select.min.js"></script>
    <script src="./src/js/jquery-ui.min.js"></script>
    <script src="./src/js/jquery.slicknav.js"></script>
    <script src="./src/js/mixitup.min.js"></script>
    <script src="./src/js/owl.carousel.min.js"></script>
    <script src="./src/js/main.js"></script>



</body>

</html>