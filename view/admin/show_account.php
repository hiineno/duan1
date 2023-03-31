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
    <h1 class="text-[30px] font-bold ">Show Account</h1>
    <div class="wrap_date_form">
    
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
                    <th>User_ID</th>
                    <th>User_name</th>
                    <th>Email</th>
                    <th> ảnh</th>
            
                    <th>Password đã mã hóa</th>
                    <th>Chức năng</th>
                </tr>
             

                <!-- Đổ dữ liệu -->
                
                <?php 
                 $sql = "SELECT * FROM `user`";
                 $query = connect($sql);
                 $query = getAll($sql);
                foreach ($query as $item):
                ?>
                    <tr>
                        <td><?= $item['user_id']  ?></td>
                        <td class="text-red-500"><?= $item['user_name'] ?></td>
                        <td class="text-blue-500"><?= $item['user_email'] ?></td>
                       
                        <td><img class="rounded-full w-[100px]" src="src/imgs/img_avatar/<?php echo $item['user_avatar'] ?>" alt=""></td>
                        <td><?php  $mahoa = md5($item['user_password']) ; echo substr($mahoa,0,10) ;  ?></td> 
                        <td>
         
                    <a href="index.php?act=update_user&id=<?=$item['user_id']?> " class="btn-sua" >Sửa</a>
                    <a href="index.php?act=delete_user&id=<?= $item['user_id'] ?>" class="btn-xoa" onclick="return confirm('Bạn có chắc xóa không?')">Xóa</a>
                        </td>
                    </tr>
                 

                <?php endforeach ?>
            </table>
        </div>

    </div>





</main>