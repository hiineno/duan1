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
        <?php
            $sql = "SELECT * FROM cart WHERE cart_id =".$_GET['cart_id'];
            $query = getAll($sql);
            foreach ($query as $row):
        ?>
        <p>Tên người đặt: <?=$row['user_id'] ?> </p>
        <p>Địa chỉ giao hàng: <?=$row['cart_address'] ?> </p>
        <p>Số diện thoại: <?=$row['cart_phone'] ?></p>
        <p>Ghi chú: <?=$row['cart_note'] ?></p>
        <p>Tổng tiền: <?=$row['cart_total'] ?>Đ</p>
        <p>Trạng thái: <?=$row['cart_status'] ?></p>
        <p>Thanh toán: <?=$row['cart_pay'] ?></p>
        <?php endforeach;
        ?>
    </div>
</section>
<section class="shoping-cart spad">
<div class="container">
<div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Sản phẩm</th>
                                <th>Ảnh</th>
                                <th>Size</th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                if(!empty($_GET['cart_id'])){
                                    $cart_id = $_GET['cart_id'];
                                }
                                $sql = "SELECT bill.bill_quantity, bill.bill_price, bill.bill_size, product.product_avatar, product.product_name FROM bill JOIN product ON bill.product_id = product.product_id WHERE bill.cart_id = $cart_id";
                                $query = getAll($sql);
                                foreach($query as $item):
                                ?>
                                 <tr>
                                <td><?=$item['product_name'] ?></td>
                                <td><img src="src/imgs/img_product/<?=$item['product_avatar']?>" alt="" width="100px" height="150px"></td>
                                <td><?=$item['bill_size'] ?></td>
                                <td><?=$item['bill_price'] ?></td>
                                <td><?=$item['bill_quantity'] ?></td>
                                 </tr>
                                <?php endforeach
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
</div>
</section>