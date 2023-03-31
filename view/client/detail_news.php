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
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 order-md-1 order-2">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Categories</h4>
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
                        <div class="blog__sidebar__item">
                            <h4>Recent News</h4>
                            <div class="blog__sidebar__recent">
                               <?php
                               $sql = "SELECT * FROM news";
                               $query = getAll($sql);
                               foreach ($query as $item):
                               ?>
                                <a href="./index.php?act=detail_news&id=<?=$item['news_id'] ?>" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="./src/imgs/img_news/<?= $item['news_avatar']?>" alt="" width="50px" height="50px">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6><?= $item['news_title']?></h6>
                                        <span><?= $item['news_date']?></span>
                                    </div>
                                </a>
                                <?php endforeach;
                                ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 order-md-1 order-1">
                <?php
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM news WHERE news_id = $id";
                    $query = getAll($sql);
                    foreach($query as $row):
                    ?>
                    <div class="blog__details__text">
                    <img src="./src/imgs/img_news/<?=$row['news_avatar'] ?>" alt="">
                        <p><?=$row['news_content'] ?></p>
                        <h3><?=$row['news_title'] ?></h3>
                        <p><?=$row['news_desc'] ?></p>
                    </div>
                    <div class="blog__details__content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="blog__details__author">
                                    <div class="blog__details__author__pic">
                                        <img src="./src/imgs/img_news/<?=$row['news_avatar'] ?>" alt="">
                                    </div>
                                    <div class="blog__details__author__text">
                                        <h6>Michael Scofield</h6>
                                        <span>Admin</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="blog__details__widget">
                                    <ul>
                                        <li><span>Categories:</span> Food</li>
                                        <li><span>Tags:</span> All, Trending, Cooking, Healthy Food, Life Style</li>
                                    </ul>
                                    <div class="blog__details__social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                        <?php endforeach; 
                        ?>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

    <!-- Related Blog Section Begin -->
    <section class="related-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related-blog-title">
                        <h2>Post You May Like</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $sql = "SELECT * FROM `news`";
                $query = getAll($sql);
                foreach ($query as $item){
                    ?>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="./src/imgs/img_news/<?= $item['news_avatar']?>" alt="" width="290px" height="163px">
                        </div> 
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i><?= $item['news_date']?></li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#"><?= $item['news_title']?></a></h5>
                            <p><?= $item['news_desc']?></p>
                        </div>
                    </div>
                </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>
    <script src="./src/js/jquery-3.3.1.min.js"></script>
    <script src="./src/js/bootstrap.min.js"></script>
    <script src="./src/js/jquery.nice-select.min.js"></script>
    <script src="./src/js/jquery-ui.min.js"></script>
    <script src="./src/js/jquery.slicknav.js"></script>
    <script src="./src/js/mixitup.min.js"></script>
    <script src="./src/js/owl.carousel.min.js"></script>
    <script src="./src/js/main.js"></script>