<?php
if(isset($_GET['id'])){
$id = $_GET['id'];


$sql = "DELETE FROM `product` WHERE `product_id` =$id ";

connect($sql);

$msg = 'Xóa dữ liệu thành công';

header("location: index.php?act=show_product&msg=$msg");

};
?>