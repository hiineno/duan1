<?php
if(isset($_GET['id'])){
$id = $_GET['id'];


$sql = "DELETE FROM `user` WHERE `user_id` like '$id' ";

connect($sql);

$msg = 'Xóa dữ liệu thành công';

header("location: index.php?act=show_account&msg=$msg");

};
?>