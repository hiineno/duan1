<?php
if (isset($_POST['submit_status'])) {
    $status = $_POST['status'];
    $sql = "UPDATE cart SET cart_status = '$status' WHERE cart_id =" . $_GET['cart_id'];
    connect($sql);
}
if (isset($_POST['submit_pay'])) {
    $pay = $_POST['pay'];
    $sql = "UPDATE cart SET cart_pay = '$pay' WHERE cart_id =" . $_GET['cart_id'];
    connect($sql);
}
if (isset($_POST['submit_date_ship'])) {
    $date_ship = $_POST['date_ship'];
    // $sql = "UPDATE cart SET cart_date_ship = $date_ship WHERE cart_id =" . $_GET['cart_id'];
    $sql = "INSERT INTO cart (`cart_date_ship`) VALUES ('$date_ship') WHERE `cart_id` = 50 ";
    connect($sql);
}
?>
<main>
    <div class="wrap_date_form">

        <style>
            p {
                font-size: 20px !important;
                margin: 16px 0;
            }

            select {
                width: 160px !important;
                height: 40px !important;
            }
        </style>

        <?php
        $sql = "SELECT * FROM cart WHERE cart_id =" . $_GET['cart_id'];
        $query = getAll($sql);
        foreach ($query as $row) :
        ?>
            <p>Tên người đặt: <?= $row['user_id'] ?> </p>
            <p>Địa chỉ giao hàng: <?= $row['cart_address'] ?> </p>
            <p>Số diện thoại: <?= $row['cart_phone'] ?></p>
            <p>Ghi chú: <?= $row['cart_note'] ?></p>
            <p>Tổng tiền: <?= $row['cart_total'] ?>Đ</p>
            <p>Trạng thái: </p>
            <form action="" method="post">
                <select name="status" id="">
                 <option value="<?= $row['cart_status'] ?>"><?= $row['cart_status'] ?></option>
                    <option value="Đang xủ lí">Đang xử lí</option>
                    <option value="Đang giao hàng">Đang giao hàng</option>
                    <option value="Đã nhận hàng">Đã nhận hàng</option>
                    <option value="Đã nhận hàng">Đã hủy hàng</option>
                    
                </select>
                <input type="submit" name="submit_status" value="Thay đổi ">
            </form>
            <p>Thanh toán: </p>
            <form action="" method="post">
                <select name="pay" id="">
                <option value="<?= $row['cart_pay'] ?>"><?= $row['cart_pay'] ?></option>
                    <option value="Chưa thanh toán">Chưa thanh toán</option>
                    <option value="Đã thanh toán">Đã thanh toán</option>
                </select>
                <input type="submit" name="submit_pay" value="Thay đổi ">
            </form>
            <p>Thời gian dự kiến: </p>
            <form action="" method="post">
                <input type="datetime-local" name="date_ship" id="">
                <input type="submit" name="submit_date_ship" value="Thay đổi ">
            </form>
        <?php endforeach;
        ?>


    </div>

    <div class="show_product">
        <div class="table_wrapper">
            <?php if (isset($_GET['msg'])) : ?>

                <div>
                    <h2 class="alert"> <?= $_GET['msg'] ?> </h2>
                </div>
            <?php endif ?>
            <table class="table">
                <tr>
                    <th class="shoping__product">Sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
                <?php
                if (!empty($_GET['cart_id'])) {
                    $cart_id = $_GET['cart_id'];
                }
                $sql = "SELECT bill.bill_quantity, bill.bill_price, bill.bill_size, product.product_avatar, product.product_name FROM bill JOIN product ON bill.product_id = product.product_id WHERE bill.cart_id = $cart_id";
                $query = getAll($sql);
                foreach ($query as $item) :
                ?>
                    <tr>
                        <td><?= $item['product_name'] ?></td>
                        <td><img src="src/imgs/img_product/<?= $item['product_avatar'] ?>" alt="" width="100px" height="150px"></td>
                        <td><?= $item['bill_size'] ?></td>
                        <td><?= $item['bill_price'] ?></td>
                        <td><?= $item['bill_quantity'] ?></td>
                    </tr>
                <?php endforeach
                ?>
                <tr>
                </tr>
            </table>
        </div>
    </div>






</main>