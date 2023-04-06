<?php
if (!empty($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
}
if (isset($_POST['order'])) {
    $username = $_SESSION['username'];
    $total_all = $_POST['total_all'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $note = $_POST['note'];
    $total = $_POST['total_all'];
    $payment = $_POST['radio_pay'];
    $sql = "INSERT INTO `cart` (`cart_phone`, `cart_address`, `cart_note`, `cart_email`, `cart_total`, `user_id`, `cart_status`, `cart_pay`, `cart_payment`) VALUES ($phone, '$address', '$note', '$email', $total, '$username', N'Đang xử lí', N'Chưa thanh toán', '$payment')";
    connect($sql);
    if (!empty($sql)) {
        $get_id = "SELECT * FROM cart";
        $check = getAll($get_id);
        foreach ($check as $row) {
            $id_cart = $row['cart_id'];
        }
        if(!empty($_SESSION['cart'])){
            foreach ($cart as $key => $item) {
                $sql = "INSERT INTO bill (cart_id, product_id, bill_quantity, bill_price, bill_size) VALUES ($id_cart, '$item[product_id]', '$item[product_quantity]', '$item[product_price]', '$item[product_size]')";
                $connect = connect($sql);
                $sql = "SELECT product_quantity FROM product WHERE product_id = $item[product_id]";
                $query = getAll($sql);
                foreach ($query as $value) {
                    $re_quantity = $value['product_quantity'] - $item['product_quantity'];
                    $update = "UPDATE product SET product_quantity = $re_quantity WHERE product_id = $item[product_id]"  ;
                    connect($update);
                }
            }
        }
        echo '<script>alert("Đặt hàng thành công"); </script>';
        unset($_SESSION['cart']);
        echo "<script> window.location.href='index.php?act=bill'</script>";
    }
}

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
<link rel="stylesheet" href="./src/css/style.css">
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
                                <th>Total</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <?php
                        $total_all = 0;
                        if (!empty($_SESSION['cart'])){
                            foreach ($cart as $key => $value):
                                $total = $value['product_quantity'] * $value['product_price'];
                                $total_all += $total;
                        ?>
                                <tbody>
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <h5><?= $value["product_name"] ?></h5>
                                        </td>
                                        <td class="shoping__cart__item">
                                            <img src="./src/imgs/img_product/<?= $value["product_avatar"] ?>" alt="" width="100px">
                                        </td>
                                        <td><?= $value["product_size"] ?></td>
                                        <td class="shoping__cart__price">
                                            <?= $value["product_price"] ?>
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <form action="./index.php?act=add_cart&id=<?= $value['product_id'] ?>" method="post">
                                                    <div class="pro-qty">
                                                        <input type="number" name="quantity" min="0" value="<?= $value['product_quantity'] ?>">
                                                    </div>
                                                    <input type="submit" name="update_quantity" value="Sửa">
                                                </form>
                                            </div>
                                        </td>

                                        <td class="shoping__cart__total">
                                            <?= $total ?>
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <a href="index.php?act=delete_cart&id=<?= $value['product_id'] ?>" class="btn-link"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>

                                </tbody>
                        <?php endforeach;
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="./index.php?act=shop" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    <!-- <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a> -->
                </div>
            </div>
            <?php
            if(!empty($_SESSION['cart'])){
            ?>
    <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="shoping__discount" style="padding:15px;">
                <h5>Billing Details</h5>
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">


                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text"  name="address" id="address" class="checkout__input__add">
                                <p style="color: red ;" id="loiaddress"></p>

                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone" id="phone">
                                        <p style="color: red ;" id="loiphone"></p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email" id="email">
                                        <p style="color: red ;" id="loimail"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input type="text" name="note" >
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="shoping__checkout">
                                <h5>Cart Total</h5>

                                <ul>
                                    <!-- <li>Subtotal <span>$454.98</span></li>  -->
                                    <li>Phương thức thanh toán: </li>
                                    <style>
                                        .type-pay{
                                            display: flex;
                                            flex-wrap: wrap;
                                        }
                                        .radio-pay{
                                            width: 20px !important;
                                        }
                                        .flex-radio{
                                            display: flex;
                                            align-items: center;
                                        }
                                    </style>
                                    <div class="type-pay">
                                   
                                   <div class="flex-radio"> 
                                    <input type="radio" value="Thanh toán khi nhận hàng" name="radio_pay" onclick="hidden()" class="radio-pay" id="pay-offline"><p>Thanh toán khi nhận hàng</p>
                                </div>
                                   <div class="flex-radio"> 
                                    <input onclick="qr()" type="radio" value="Thanh toán trực tuyến" name="radio_pay" class="radio-pay" id="online-pay"><p>Thanh toán trực tuyến</p>
                                </div>
                                <div>
                                <img src="./src/imgs/qr/pr.jpg" id="img-qr" alt="" width="200px" height="200px" style="display: none">
                                <script>
                                    function qr(){
                                    const imgqr = document.getElementById("img-qr");
                                    imgqr.style.display = "block";
                                }
                                function hidden(){
                                    const imgqr = document.getElementById("img-qr");
                                    imgqr.style.display = "none";
                                }
                                </script>
                                </div>
                                    </div>
                                    <li>Tiền giảm giá<span></li>
                                    <li>Tổng tiền<span><?= $total_all ?></span></li>
                                    <?php
                                    if (!empty($total_all)) {
                                    ?>
                                        <input type="text" name="total_all" hidden value="<?= $total_all ?>">
                                    <?php
                                    }
                                    ?>
                                </ul>
                                    <input type="submit" class="primary-btn" name="order" value="Đặt hàng">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <?php
            }
            ?>
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

<script>
            function validate() {
                  
                    var address = document.getElementById("address").value;
                    var phone = document.getElementById("phone").value;
                    var email = document.getElementById("email").value;
            

                    var checkphone = /^[0][0-9]{9}$/ ;
                    var checkmail =/^[a-z][a-z0-9A-Z-_.]{2,}\@[a-z]{2,}\.[a-z.]{2,}$/;
                
                
                    if(address ==""){
                        document.getElementById("loiaddress").innerHTML ="Không được để trống ";
                        return false;
                    }
                    else document.getElementById("loiaddress").innerHTML="";
                    
                    if(!checkphone.test(phone)){
                        document.getElementById("loiphone").innerHTML="Điện thoại có 10 số bắt đầu từ số 0";
                        return false;
                    }
                    else if(phone==""){
                        document.getElementById("loiphone").innerHTML ="Không được để trống";
                        return false;
                    }
                    else document.getElementById("loiphone").innerHTML="";

                     if(email ==""){
                        document.getElementById("loimail").innerHTML ="không được để trống";
                        return false;
                     }
                     else if (!checkmail.test(email)){
                        document.getElementById("loimail").innerHTML ="Nhập sai định dạng mail rồi bạn ơi";
                        return false;
                     }
                     else document.getElementById("loimail").innerHTML ="";
                
             
                return true;

            }

        </script>

        