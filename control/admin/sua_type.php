<?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM `type` WHERE `type_id` = $id";
    $query = getAll($sql);
    if(isset($_POST['submit'])){
        $id = $_GET['id'];
        $name = $_POST['name'];
        $sql = "UPDATE `type` SET `type_name` = '$name' WHERE `type_id` = $id";
        connect($sql);
        $msg = 'Sửa dữ liệu thành công';
        header("location: index.php?act=show_type&msg=$msg");
    }
?>
<main>
        <?php 
            foreach ($query as $row):
                ?>
            <h1>Add Category</h1>
            <link rel="stylesheet" href="./src/css/kkk.css">
            <div class="date">
                <input type="date">
            </div>

            <div class="add_categories_wrap_form">
        
        <form action="" method="POST" enctype="multipart/form-data" >
            <label for="">Tên loại hàng:</label> <br>
            <input type="text" class="form-control mb3" name="name" required value="<?= $row['type_name'] ?>">
            <br>
            <label for="">Image:</label> <br>
            <input type="file" class="image" name="image">
            <?php if(isset($image_err)): ?>
                <div style="color: red;">
            <?= $image_err  ?>
            </div>

              <?php endif ?>  
            <button type="submit" class="btn " style="margin-top:20px ;" name="submit">Thêm</button>
            <?php endforeach;
        ?>
        </form>
    </div>


</main>
