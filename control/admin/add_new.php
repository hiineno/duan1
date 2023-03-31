

<?php 


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
            <table class="table ">
                <tr >
                    <th class="">News_ID</th>
                    <th class="">News_Title</th>
                    <th class="">News_Content</th>
                    <th class="">Ngày đăng</th>
                    <th class="">chức năng</th>

                    <th width="150pxpx"  class="">
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
                        <td  class=""><?= $new['news_id']  ?></td>
   
                        <td class="text-blue-500 text-[20px]"> <?php echo $new['news_title'] ?> </td>

                        <td class="text-[15px]"><?= substr($new['news_content'],0,190)  ?></td>
                        <td> <?= $new['news_date'] ?></td> 
                        <td class=" flex mt-[60px] ">
                            <a href="index.php?act=sua_product&id=" class="btn-sua">Sửa</a>
                            <a href="index.php?act=xoa_product&id=" class="btn-xoa" onclick="return confirm('Bạn có chắc xóa không?')">Xóa</a>
                        </td>

                    </tr>


                <?php endforeach ?>
            </table>
        </div>

    </div>





</main>

<script>

        function validate(){
                var title = document.getElementById("title").value;
                var desc = document.getElementById("desc").value;
                var content = document.getElementById("content").value;

                if(title == ""){
                    document.getElementById("loititle").innerHTML = "Không được để trống";
                    return false;
                }
                else document.getElementById("loititle").innerHTML = "";

                if(desc == ""){
                    document.getElementById("loidesc").innerHTML = "Không được để trống";
                    return false;
                }
                else document.getElementById("loidesc").innerHTML = "";

                if(content == ""){
                    document.getElementById("loicontent").innerHTML = "Không được để trống";
                    return false;
                }
                else document.getElementById("loicontent").innerHTML ="";
                return true;


        }

</script>
<main>
    <link rel="stylesheet" href="./src/css/kkk.css">
    <h1>Add Status</h1>

    <div class="add_product">

        <form action="" method="POST" enctype="multipart/form-data">

            <label for="">Title</label> <br>
            <input type="text" name="title" id="title">
            <p id="loititle" style="color:red"></p>
            <br>

            <label for=""> Image:</label> <br>
            <input type="hidden" name="size" value="1000000"> 
            <input type="file" class="image" name="image" multiple>
            <p id="loiimage" style="color:red"></p>
            <br>
            <?php if (isset($image_err)) : ?>
                <div style="color: red;">
                    <?= $image_err  ?>
                </div>
            <?php endif ?>

            <label for="">Desc:</label> <br>
            <input type="text" name="desc" id ="desc" >
            <p id="loidesc" style="color:red"></p>
            <br>

            <label for="">Content:</label> <br>
            <textarea class="form-control" placeholder="Leave a comment here" id="content" name="content"></textarea>
            <p id="loicontent" style="color:red"></p>
            <br>

            <Label>Time:</Label> <br>
            <input type="text" name="view" readonly placeholder="Tự động">
            <br>

            <button onclick="return validate()" type="submit" class="btn" style="margin-top:20px ;" name="submit">Thêm</button>


        </form>

    </div> -->
    <?php
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $file_size = $_FILES['image']['size'];
    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp, './src/imgs/img_news/' . $image);
    $desc = $_POST['desc'];
    $content = $_POST['content'];
    if($file_size >2097152){
        echo "'<script>   document.getElementById('loiimage').innerHTML = 'ảnh không lớn hơn 2mb'; </script>'";
    }
    else if($file_size <= 0){
        echo "'<script> document.getElementById('loiimage').innerHTML = 'Không được để trống'; </script>'";
    }
    else{
    $sql = "INSERT INTO `news`(`news_title`, `news_avatar`, `news_desc`, `news_content`) VALUES ('$title', '$image', '$desc', '$content')";
    connect($sql);
    }
}
// ?>

 </main>
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
