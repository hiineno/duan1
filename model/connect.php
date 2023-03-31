<?php
       $connect = new PDO("mysql:host=localhost;dbname=web3014;charset=utf8","root","");
    function connect($x){
        $connect = new PDO("mysql:host=localhost;dbname=web3014;charset=utf8","root","");
        $query = $connect -> prepare($x);
        $query -> execute();
        return $query;
    }
    function getAll($x){
        $query = connect($x) -> fetchAll(); 
        return $query; 
    }
    function getOne($x){
        $query = connect($x) -> fetch(); 
        return $query;  
    }
    function add_type(){
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $file_size = $_FILES['image']['size'];
           
            $image = $_FILES['image']['name'];
            $tmp = $_FILES['image']['tmp_name'];
            move_uploaded_file($tmp, './src/imgs/img_type/' . $image);
            if($file_size >2097152){
                // echo "'<script>   document.getElementById('loiimage').innerHTML = 'ảnh không lớn hơn 2mb'; </script>'";
                // echo "ảnh không quá 2mb";
                echo "<script> alert('ảnh không quá 2mb') </script>";
            }
            else if($file_size <=0){
                // echo "'<script>   document.getElementById('loiimage').innerHTML = 'không được để trốnn'; </script>'";
                // echo "không để trống ảnh";
                echo "<script> alert('không để trống ảnh ') </script>";
            }
            else{
            
            $sql = "INSERT INTO `type` (`type_name`, `type_avatar`) VALUES ('$name', '$image')";
            connect($sql);
                
            header("location: index.php?act=show_type");
                
            }
    
    }
}
    function add_product(){     
        if (isset($_POST['submit'])) {
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

            // if ($image['size'] > 0) {
            //     $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
            //     if ($ext != 'jpg' && $ext != 'png' && $ext != 'gif' && $ext != 'jpeg') {
            //         $image_err = "Anh khong dung dinh dang";
            //     }
            // } else {
            //     $image_err = "Ban chua nhap anh";
            // }

            if (!isset($image_err)) {
                $sql = "INSERT INTO product 
                (`product_name`, `product_avatar`,`type_id`, `product_price`, `color_id`, `product_sale`, `product_desc`, `size_id` ) VALUES
                ('$name', '$image', '$type', '$price', '$color', '$sale', '$desc', '$size')";
                connect($sql);     
                $msg = 'Thêm dữ liệu thành công';

                header("location: index.php?act=show_product&msg=$msg");
            }
    }
    function sua_product(){ 
        $id = $_GET["id"];    
        if (isset($_POST['submit'])) {
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
                $sql = "UPDATE product SET `product_name` = '$name', `type_id` = '$type', `product_avatar` = $image , `product_price` = '$price', `color_id` = '$color', `product_sale` = $sale, `product_desc` = '$desc', `size_id` = '$size' WHERE `product_id` = $id";
                connect($sql);     
                $msg = 'Thêm dữ liệu thành công';
                header("location: index.php?act=show_product&msg=$msg");
            }
    }
}
}

?>