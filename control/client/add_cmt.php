<?php
if(isset($_POST['submit'])){
    $id = $_GET['id'];
    $username = $_SESSION['username'];
    $content = $_POST['content'];
    $sql = "INSERT INTO comment (`product_id`, `user_id`, `cmt_content`) VALUES ($id, '$username', '$content')";
    $query = connect($sql);
    if($query){
        header("location: index.php?act=detail_product&id=$id#tabs-3");
    }
}
?>