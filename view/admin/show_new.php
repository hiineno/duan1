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
<a href="./"></a>
<?php 
    require_once "./model/connect.php";

?>
<main>
<script src="https://cdn.tailwindcss.com"></script>
    <h1 class="font-bold text-[30px]">Show News</h1>


    <div class="show_product">
        <div class="table_wrapper">
            <?php if (isset($_GET['msg'])) : ?>

                <div>
                    <h2 class="alert"> <?= $_GET['msg'] ?> </h2>
                </div>
            <?php endif ?>
            <table class="table border-2">
                <tr >
                    <th class="border-2">News_ID</th>
                    <th class="border-2">News_Title</th>
                    <th class="border-2">News_Content</th>
                    <th class="border-2">Ngày đăng</th>
                    <th class="border-2">chức năng</th>

                    <th width="150pxpx"  class="border-2">
                        <a href="index.php?act=add_product" class="btn-them" style="width:fit-content">Thêm Sản Phẩm</a>
                        
                    </th>

                </tr>


                <!-- Đổ dữ liệu -->
                
                <?php 
                 $sql = "SELECT * FROM `news`";
                 $query = connect($sql);
                 $products = $query->fetchAll();
                foreach ($products as $new) : ?>
                    <tr>
                        <td  class="border-2"><?= $new['news_id']  ?></td>
   
                        <td class="text-blue-500"> <?php echo $new['news_title'] ?> </td>

                        <td><?= substr($new['news_content'],0,190)  ?></td>
                        <td> <?= $new['news_date'] ?></td> 
                        <td class="text-center">
                            <a href="index.php?act=sua_product&id=" class="btn-sua">Sửa</a>
                            <a href="index.php?act=xoa_product&id=" class="btn-xoa" onclick="return confirm('Bạn có chắc xóa không?')">Xóa</a>
                        </td>

                    </tr>


                <?php endforeach ?>
            </table>
        </div>

    </div>





</main>