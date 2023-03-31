
<main><script src="https://cdn.tailwindcss.com"></script>
            <h1 class="font-bold text-[25px]">Category</h1>
            <!-- <div class="date">
                <input type="date">
            </div> -->
          
            <div class="wrap_show_categories">
    <?php if(isset($_GET['msg'])): ?>

  <div class="alert alert-success"><?= $_GET['msg']?></div>
    <?php endif ?>
    <div class="wrap_table">
    <table class="table">


        <tr>
            <th class="ml-2">ID</th>
            <th class=" font-bold text-red-500">Tên thể loại</th>
            
            <th class="text-[20px]">Ảnh </th>
            
            <th>
                    <a href="index.php?act=add_type" class="btn-them">Thêm thể loại</a>
                </th>
            
        </tr>


        <!-- Đổ dữ liệu -->
        <?php 
        $sql = "SELECT * FROM `type`";
        $query = connect($sql);
        $cates = $query->fetchAll();
        foreach($cates as $cate ): ?>
            <tr>
                <td class="ml-2"><?= $cate['type_id']  ?></td>
                <td class="text-[20px] font-bold text-red-500"><?= $cate['type_name']  ?></td>
                
                <td>
                    <img class=" rounded-lg" src="./src/imgs/img_type/<?= $cate['type_avatar'] ?>" alt="" width="100%">
                </td>
                
               
                
                <td>
                    <a href="index.php?act=sua_type&id=<?=$cate['type_id']?> " class="btn-sua" >Sửa</a>
                    <a href="index.php?act=xoa_type&id=<?=$cate['type_id']?> " class="btn-xoa"   onclick="return confirm('Bạn có chắc xóa không?')">Xóa</a>
                </td>
                
            </tr>


            <?php  endforeach ?>
         </table>
    </div>


        </main>
 