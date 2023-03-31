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

<main>
<script src="https://cdn.tailwindcss.com"></script>
    <h1 class="font-bold text-[30px]">Show Product</h1>
    <div class="wrap_date_form">
    
    <form action="" method="POST" class="form">
        
        
        <?php 
           
          ?>
     
        <select class="select_search" name="category_id" id="">
         <option  class="text-blue-500 text-[20px]"   value="0" selected>Tất cả thể loại</option>

        <?php foreach ($pros as $pro) : ?>
                <option value="<?= $cate['product_id'] ?>" >
                    <?= $cate['product_name'] ?>
                </option>
            <?php endforeach ?>
        </select> </br>
       
       <button class="text-white mt-4 bg-blue-500 text-[15px]" name="btn_submit" type="submit">tìm kiếm</button>


    </form>
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
                    <th>Product_ID</th>
                    <th>Product_name</th>
                    <th>Ảnh</th>
                    <th>Type_ID</th>
                    <th>Price</th>>
                    <th>Số lượng</th>
                    <th>Desciption</th>
                    <!-- <th>Time</th> -->

                    <th width="150pxpx">
                        <a href="index.php?act=add_product" class="btn-them" style="width:fit-content">Thêm Sản Phẩm</a>
                        
                    </th>

                </tr>


                <!-- Đổ dữ liệu -->
                
                <?php 
                 $sql = "SELECT * FROM `product`";
                 $query = connect($sql);
                 $products = $query->fetchAll();
                foreach ($products as $product) : ?>
                    <tr>
                        <td><?= $product['product_id']  ?></td>
                        <td class="font-bold"><?= $product['product_name']  ?></td>
                        <td><img src="./src/imgs/img_product/<?php echo $product['product_avatar'] ?>" alt=""></td>
                       
                        <?php
                        $type_id = $product['type_id'];
                        $sql = "Select * from type where type_id = '$type_id'  ";
                        $cate = getOne($sql);
                        ?>
                        <td> <?= $cate['type_name'] ?> </td>

                       

                        <td style="text-decoration: ;" class="text-red-500"><?= $product['product_price']  ?>.Đ</td>

                       
                    
                        <td> <?php echo $product['product_quantity'] ?> </td>

                        <td><?= substr($product['product_desc'],0,77)  ?></td>
                        <!-- <td><?= $product['product_date'] ?></td> -->
                        <td>
                            <a href="index.php?act=sua_product&id=<?= $product['product_id'] ?>" class="btn-sua">Sửa</a>
                            <a href="index.php?act=xoa_product&id=<?= $product['product_id'] ?>" class="btn-xoa" onclick="return confirm('Bạn có chắc xóa không?')">Xóa</a>
                        </td>

                    </tr>


                <?php endforeach ?>
            </table>
        </div>

    </div>





</main>