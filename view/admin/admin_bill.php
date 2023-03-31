<main>
<script src="https://cdn.tailwindcss.com"></script>
    <script src="./src/js/jquery-3.3.1.min.js"></script>
    <script src="./src/js/bootstrap.min.js"></script>
    <script src="./src/js/jquery.nice-select.min.js"></script>
    <script src="./src/js/jquery-ui.min.js"></script>
    <script src="./src/js/jquery.slicknav.js"></script>
    <script src="./src/js/mixitup.min.js"></script>
    <script src="./src/js/owl.carousel.min.js"></script>
    <script src="./src/js/main.js"></script>
    <div class="show_product">
        <div class="table_wrapper">
            <?php if (isset($_GET['msg'])) : ?>

                <div>
                    <h2 class="alert"> <?= $_GET['msg'] ?> </h2>
                </div>
            <?php endif ?>
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
                            $sql = "SELECT * FROM cart ORDER BY cart_id DESC";
                            $query = getAll($sql);
                            foreach ($query as $item):
                            ?>
                            <tr>
                                <td><?=$item['cart_id'] ?></td>
                                <td><?=$item['cart_total'] ?></td>  
                                <td><?=$item['cart_pay'] ?></td>
                                <td><?=$item['cart_status'] ?></td>
                                <td>
                                    <a class="text-blue-500" href="index.php?act=admin_bill_detail&cart_id=<?=$item['cart_id'] ?>">Chi tiết</a>
                                    |
                                    <!-- <a href="index.php?act=detail_bill&cart_id=<?=$item['cart_id'] ?>">Hủy</a> -->
                                </td>
                            </tr>
                        <?php endforeach;
               
                        ?>
                        </tbody>
                    </table>
        </div>

    </div>
</main>