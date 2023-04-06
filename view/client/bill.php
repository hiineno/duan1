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
<link rel="stylesheet" href="./src/css/style.css">
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Mã hóa đơn</th>
                                <th>Tổng tiền</th>
                                <th>Thanh Toán</th>
                                <th>Trạng Thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if(!empty($_SESSION['username'])){
                                $username = $_SESSION['username'];
                            $sql = "SELECT * FROM cart WHERE user_id LIKE '$username' ORDER BY cart_id DESC";
                            $query = getAll($sql);
                            foreach ($query as $item):
                            ?>
                            <tr>
                                <td><?=$item['cart_id'] ?></td>
                                <td><?=$item['cart_total'] ?></td>  
                                <td><?=$item['cart_pay'] ?></td>
                                <td><?=$item['cart_status'] ?></td>
                                <td>
                                    <a href="index.php?act=detail_bill&cart_id=<?=$item['cart_id'] ?>">Chi tiết</a>
                                    |
                                    <a href="index.php?act=cancel-product&cart_id=<?=$item['cart_id'] ?>">Hủy</a>
                                </td>
                            </tr>
                        <?php endforeach;
                        }
                        ?>
                        </tbody>
                    </table>
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
</section>