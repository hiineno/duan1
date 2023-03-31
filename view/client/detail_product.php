<?php
$id = $_GET['id'];
$sql = "SELECT cmt.cmt_id, cmt.cmt_content, cmt.product_id, cmt.user_id, cmt.cmt_date, u.user_name, u.user_id, u.user_avatar FROM comment AS cmt JOIN user AS u ON u.user_id = cmt.user_id WHERE cmt.product_id =$id";
$list_cmt = getAll($sql);
// if(!empty($_GET['err'])){;
// $err = $_GET['err'];
// echo '<script> alert('.$err.')</script>';
// }
?>


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
<link rel="stylesheet" href="./src/css/cmt.css" type="text/css">
<section class="product-details spad">
    <style>
        .option-input {
            width: 30px;
            height: 30px;

            text-align: center;
        }

        .size {

            text-align: center;
        }

        label {
            align-items: center;
        }
    </style>
    <div class="container">
        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM `product` WHERE `product_id` = $id";
        $query = getAll($sql);
        foreach ($query as $item) {
        ?>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large" src="./src/imgs/img_product/<?= $item['product_avatar'] ?>" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <form action="./index.php?act=add_cart&id=<?= $item['product_id'] ?>" method="post">
                        <div class="product__details__text">
                            <h3><?= $item['product_name'] ?></h3>
                            <div class="product__details__rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                                <span>(18 reviews)</span>
                            </div>
                            <div class="product__details__price"><?= $item['product_price'] ?></div>
                            <p><?= $item['product_desc'] ?></p>
                            <div class="product__details__quantity">
                                <div class="select-size">
                                    <div class="size">
                                        <label>
                                            <input type="radio" class="option-input radio" name="size" value="X" />
                                            <p>X</p>
                                        </label>
                                        <label>
                                            <input type="radio" class="option-input radio" name="size" value="L" />
                                            <p>L</p>

                                        </label>
                                        <label>
                                            <input type="radio" class="option-input radio" name="size" value="XL" />
                                            <p>XL</p>
                                        </label>
                                        <?php
                                    if(!empty($_GET['error'])){
                                        echo '<p style="color:red;">';
                                        echo $_GET['error'];
                                        echo '</p>';
                                      }
                                      ?>
                                    </div>
                                    
                               
                                </div>
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="number" value="1" name="quantity" min="1" max="100">
                                        
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="primary-btn" name="primary-btn" value="ADD TO CART">
                           
                    </form>
                    <a href="#" class="heart-icon"><span class=""><i class="fa-regular fa-heart"></i></span></a>
                    <?php
                            if(!empty($_GET['err'])){
                              echo '<p style="color:red;">';
                              echo $_GET['err'];
                              echo '</p>';
                            }
                            ?>
                    <ul>
                        <?php
                        $sql = "SELECT product_quantity FROM product WHERE product_id = $id";
                        $query = getAll($sql);
                        foreach ($query as $row) :
                        ?>
                            <li><b>Số lượng còn</b> <span><b><?= $row['product_quantity'] ?> </b></span></li>
                        <?php endforeach
                        ?>
                        <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                        <li><b>Weight</b> <span>0.5 kg</span></li>
                        <li><b>Share on</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab" aria-selected="false">Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="false">Reviews <span></span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                    Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Vivamus
                                    suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam sit amet quam
                                    vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada.
                                    Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur arcu erat,
                                    accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis a
                                    pellentesque nec, egestas non nisi. Vestibulum ac diam sit amet quam vehicula
                                    elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus
                                    et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam
                                    vel, ullamcorper sit amet ligula. Proin eget tortor risus.</p>
                                <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                    ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                    elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                    porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                    nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                                    Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed
                                    porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum
                                    sed sit amet dui. Proin eget tortor risus.</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                    Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                    Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                    sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                    eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                    Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                    sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                    diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                    ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                    Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                    Proin eget tortor risus.</p>
                                <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                    ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                    elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                    porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                    nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Comment</h6>
                                <div id="comment">
                                    <div hidden class="cm" aria-label="Viết bình luận" contenteditable="true" role="textbox" spellcheck="true">
                                        <div data-contents="true">
                                            <div class="" data-block="true" data-editor="bnm76" data-offset-key="29s3j-0-0"></div>
                                        </div>
                                    </div>
                                    <div hidden class="cm" aria-label="Viết bình luận" contenteditable="true" role="textbox" spellcheck="true" style="">
                                        <div data-contents="true">
                                            <div class="" data-block="true" data-editor="bnm76" data-offset-key="29s3j-0-0">
                                                <div data-offset-key="29s3j-0-0"><span data-offset-key="29s3j-0-0"><br data-text="true"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if (!empty($_SESSION['username'])) {
                                    ?>
                                        <div class="comment-form">
                                            <form method="post" action="index.php?act=add_cmt&id=<?= $_GET['id'] ?>">
                                                <div class="content">
                                                    <input type="text" name="content" placeholder="Viết bình luận">
                                                </div>
                                                <button class="btn-comment" name="submit">
                                                    <svg viewBox='0 0 240 240' fill='none'>
                                                        <path d='M 230 120 L 10 10 L 50 120 L 10 230 Z' />
                                                    </svg>
                                                </button>
                                                <?php
                                                ?>
                                            </form>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="comment-form">
                                            <form method="post" action="index.php?act=login">
                                                <div class="content">
                                                    <input type="text" placeholder="Viết bình luận">
                                                </div>
                                                <button class="btn-comment" name="">
                                                    <svg viewBox='0 0 240 240' fill='none'>
                                                        <path d='M 230 120 L 10 10 L 50 120 L 10 230 Z' />
                                                    </svg>
                                                </button>
                                                </a>

                                                <?php
                                                ?>
                                            </form>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    foreach ($list_cmt as $cmt) :
                                    ?>
                                        <div class="comment-list">
                                            <div class="comment">
                                                <div class="cmt">
                                                    <div class="cmt-avt">

                                                        <img src="./src/imgs/img_avatar/<?= $cmt['user_avatar'] ?>" alt="">

                                                    </div>
                                                    <div class="cmt-right">
                                                        <div class="cmt-box">
                                                            <h2 class="name"><a href="javascript:;"><?= $cmt['user_name'] ?></a></h2>
                                                            <span class="num-like-cmt">93 like</span>
                                                            <div class="cmt-content"><?= $cmt['cmt_content'] ?></div>
                                                        </div>
                                                        <div class="cmt-footer">
                                                            <div class="timeamp"><?= $cmt['cmt_date'] ?></div>
                                                            <div class="cmt-btn-like"><a href="">Thích</a></div>
                                                            <div class="cmt-btn-rep"><a href="">Trả lời</a></div>
                                                            <div class="cmt-btn-delete"><a href="">Xóa</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="rep-cmt-form">
                                                    <form action="">
                                                        <div class="content">
                                                            <input type="text" placeholder="Trả lời <?= $cmt['user_name'] ?>">
                                                        </div>
                                                        <button class="btn-comment">
                                                            <svg viewBox='0 0 240 240' fill='none'>
                                                                <path d='M 230 120 L 10 10 L 50 120 L 10 230 Z' />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>

                                            </div>

                                        </div>
                                    <?php endforeach
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
<?php
        }
?>
</div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Related Product</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $id = $_GET['id'];
            $sql_type = "SELECT `type_id` FROM product WHERE product_id = $id";
            $select = getAll($sql_type);
            foreach ($select as $item) {
                $type_id = $item['type_id'];
                $sql = "SELECT * FROM product WHERE `type_id` = $type_id LIMIT 8";
                $query = getAll($sql);
                foreach ($query as $value) {
            ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg">
                                <img src="./src/imgs/img_product/<?= $value['product_avatar'] ?>" alt="">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="./index.php?act=detail_product&id=<?= $value['product_id'] ?>"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">Crab Pool Security</a></h6>
                                <h5>$30.00</h5>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            <?php
            }
            ?>
        </div>
    </div>

    ?>
</section>
<script src="./src/js/jquery-3.3.1.min.js"></script>
<script src="./src/js/bootstrap.min.js"></script>
<script src="./src/js/jquery.nice-select.min.js"></script>
<script src="./src/js/jquery-ui.min.js"></script>
<script src="./src/js/jquery.slicknav.js"></script>
<script src="./src/js/mixitup.min.js"></script>
<script src="./src/js/owl.carousel.min.js"></script>
<script src="./src/js/main.js"></script>