<?php
    $id = $_GET['cart_id'];
    $sql = "UPDATE cart SET cart_status = N'Đã Hủy' WHERE cart_id = $id";
    $query = connect($sql);
    if($query){
        header("Location: index.php?act=bill");
    }
    
?>