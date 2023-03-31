<style>
    .select_search{
        width: 200px;
        margin-top: 20px;
        margin-bottom: 0px;
        padding: 2px;
    }
    .timkiem{
        position: absolute;
        right: 390px;
        top: 83px;
       color: var(--color-info-dark);
    }
    .timkiem:hover{
        cursor: pointer;
    }
    .wrap_date_form{
        display: flex;
        justify-content: space-between;
        
    }
    
</style>
<?php 
    // require_once "./model/connect.php";

?>
<main>
<!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <h1 class="font-bold text-[30px]">Show Comment</h1>


    <div class="show_cmt">
        <div class="table_wrapper">
            <?php if (isset($_GET['msg'])) : ?>

                <div>
                    <h2 class="alert"> <?= $_GET['msg'] ?> </h2>
                </div>
            <?php endif ?>
            <table class="table">
                <tr>
                    <th>CMT_ID</th>
                    <th>Người bình luận </th>
                    <th>CMT_Content</th>
                    <th>SẢN Phẩn Cmt</th>
                    <th>Ngày đăng</th>
                    <th>chức năng</th>

                    <th width="150pxpx">
                        <a href="index.php?act=add_product" class="btn-them" style="width:fit-content"></a>
                        
                    </th>

                </tr>


                <!-- Đổ dữ liệu -->
                
                <?php 
                 $sql = "SELECT * FROM comment";
                 $query = connect($sql);
                 $products = $query->fetchAll();
                foreach ($products as $cmt) : ?>
                    <tr>
                        <td><?= $cmt['cmt_id']  ?></td>
   
                        <th><?php echo $cmt['user_id'] ?></th>

                        <td><?= substr($cmt['cmt_content'],0,190) ?></td>
                        <th>
                            <?php 
                                    $id = $cmt['product_id'];
                                 $sql = " select * from product where product_id = $id ";
                                 $kq = connect($sql);
                                 foreach ($kq as $row);  ?>   
                            <img class="w-[50px]" style="width:100px; height:100px" src="./src/imgs/img_product/<?php echo $row['product_avatar']?>" alt="">
                        </th>
                        <td> <?= $cmt['cmt_date'] ?></td> 
                        <td>
                            <a href="index.php?act=sua_product&id=" class="btn-sua">Sửa</a>
                            <a href="index.php?act=xoa_product&id=" class="btn-xoa" onclick="return confirm('Bạn có chắc xóa không?')">Xóa</a>
                        </td>

                    </tr>


                <?php endforeach ?>
            </table>
        </div>

    </div>





</main>