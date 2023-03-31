<script>
        function validate(){

                var name = document.getElementById('name').value;

                if(name  == ""){
                    document.getElementById("loiname").innerHTML ="Không được để trống ";
                    return false;
                }
                else document.getElementById("loiname").innerHTML = "";
   
                return true;


                }

</script>
<main>
            <h1>Add Category</h1>
            <link rel="stylesheet" href="./src/css/kkk.css">
            <div class="date">
                <input type="date">
            </div>

            <div class="add_categories_wrap_form">
        
        <form action="" method="POST" enctype="multipart/form-data" >
            <label for="">Tên loại hàng:</label> <br>
            <input type="text" class="form-control mb3" id="name" name="name" required>
            <p id="loiname" style ="color:red"></p>
            <br>

            <label for="">Image:</label> <br>
            <input type="hidden" name="size" value="1000000" >
            <input type="file" class="image" id="image" name="image">
            <p id="loiimage" style="color:red"></p>
            <?php if(isset($image_err)): ?>
                <div style="color: red;">
            <?= $image_err  ?>
            </div>

              <?php endif ?>  
            <button onclick="return validate()" type="submit" class="btn " style="margin-top:20px ;" name="submit">Thêm</button>
        </form>
    </div>
<?php 

?>

</main>

<?php 

   
// if(isset($_POST['submit'])){
//     $name = $_POST['name'];
//     $file_size = $_FILES['image']['size'];
   
//     $image = $_FILES['image']['name'];
//     $tmp = $_FILES['image']['tmp_name'];
//     move_uploaded_file($tmp, './src/imgs/img_type/' . $image);
//     if($file_size >2097152){
//         echo "'<script>   document.getElementById('loiimage').innerHTML = 'ảnh không lớn hơn 2mb'; </script>'";
//       
//     }
//     else if($file_size <=0){
//         echo "'<script>   document.getElementById('loiimage').innerHTML = 'không được để trống '; </script>'";
//      
//     }
//     else{
    
//     $sql = "INSERT INTO `type` (`type_name`, `type_avatar`) VALUES ('$name', '$image')";
//     connect($sql);
//     $msg = 'Thêm dữ liệu thành công';
//     header("location: index.php?act=show_type");

//     }

// }

?>
