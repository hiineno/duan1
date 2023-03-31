<script>
        function validate(){
            alert('Validation');
            var name = document.getElementById("name").value;
            var price = document.getElementById("price").value;
            var soluong = document.getElementById("soluong").value;
            var description = document.getElementById("description").value;

            if(name == ""){
                document.getElementById("loiname").innerHTML =" Không được để trống ";
                return false;
            }
            else document.getElementById("loiname").innerHTML = "";
            if(price == ""){
                document.getElementById("loiprice").innerHTML = "Không được để trống";
                return false;
            }
            else document.getElementById("loiprice").innerHTML ="";
            if(soluong == ""){
                document.getElementById("loisoluong").innerHTML = " Không được để trống ";
                return false;
            }
            else document.getElementById("loisoluong").innerHTML ="";
            if(description == ""){
                document.getElementById("loides").innerHTML =" Không được để trống";
                return false;
            }
            else document.getElementById("loides").innerHTML ="";
            return true;
        }
    
</script>

<?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM `product` WHERE `product_id` = $id";
    $query = getAll($sql);
    if (isset($_POST['submit'])) {
        $id = $_GET['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $color = $_POST['color'];
        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp, './src/imgs/img_product/' . $image);
        $type = $_POST['type'];
        $desc = $_POST['description'];
        $size = $_POST['size'];;
        $sale = $_POST['sale'];
        if(!empty($image)){
            $sql = "UPDATE product SET `product_name` = '$name', `type_id` = '$type', `product_price` = '$price', `color_id` = '$color', `product_sale` = $sale, `product_desc` = '$desc', `size_id` = '$size' WHERE `product_id` = $id";
            connect($sql);     
            $msg = 'Thêm dữ liệu thành công';
            header("location: index.php?act=show_product&msg=$msg");
        }
        else{
            $sql = "UPDATE `product` SET `product_name` = '$name', `type_id` = '$type', `product_avatar` = $image , `product_price` = '$price', `color_id` = '$color', `product_sale` = $sale, `product_desc` = '$desc', `size_id` = '$size' WHERE `product_id` = $id";
            connect($sql);     
            $msg = 'Sửa dữ liệu thành công';
            header("location: index.php?act=show_product&msg=$msg");
        }
}
?>
<main>
    <link rel="stylesheet" href="./src/css/kkk.css">
    <h1>Add Product</h1>
   

    <div class="add_product">


        <form action="" method="POST" enctype="multipart/form-data">

            <?php 
                foreach($query as $val):
                    ?>
                    <label for="">Product Name</label> <br>
            <input type="text" name="name" id="name" value="<?php echo $val['product_name'] ?>">
            <p id="loiname" style="color: red"></p>
            <br>
            
            <label for=""> Image:</label> <br>
            <input type="file" class="image" name="image" multiple>
            <br>
            <?php if (isset($image_err)) : ?>
            <div style="color: red;">
                <?= $image_err  ?>
            </div>
            <?php endif ?>
            
         
            <br>

            <label for="">Price:</label> <br>
            <input type="number" id="price" name="price" value="<?= $val['product_price'] ?>" required>
            <br>

            <label for="">Type</label> <br>
            <select class="form-select" aria-label="Default select example" name="type">
            <?php
                $sql = "SELECT * FROM `type` ";
                $kq = getAll($sql);
                 foreach ($kq as $cate) {
                 ?>
                    <option value="<?= $cate['type_id'] ?>"> <?= $cate['type_name']?> </option>
                <?php
                }
                ?>
            </select>
            <br>
            <label for="">Số lượng</label><br>
            <input type="number" id="soluong" name="soluong" id="soluong">
            <p id="loisoluong" style="color: red"></p>

            <br>

            <label for="">Desciption:</label> <br>
            <textarea class="form-control" placeholder="Leave a comment here" id="desciption" name="description" value="<?= $val['product_desc'] ?>"></textarea>
            <br>
            
            <Label>Time:</Label> <br>
            <input type="text" name="view" readonly placeholder="Tự động">
            <br>

            <button onclick="return validate()"  type="submit" class="btn" style="margin-top:20px ;" name="submit">Sửa</button>


                    <?php endforeach; 
                
            ?>
        </form>

    </div>

</main>
