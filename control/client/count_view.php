<?php
$id = $_GET['id'];
$sql = "SELECT * FROM `product` WHERE `product_id` = $id";
$query = connect($sql) -> fetch();
if($query['product_view'] === 0){
    if(!isset($_SESSION['view'][$id])){
        $view = $_SESSION['view'][$id] = 1;
         $sql1 = "INSERT INTO `product` (`product_view`) VALUES ($view) WHERE `product_id` = $id";
         connect($sql1);
    }
    else{
        $view = $_SESSION['view'][$id] += 1;
        $sql1 = "INSERT INTO `product` (`product_view`) VALUES ($view) WHERE `product_id` = $id";
        connect($sql1);
    }
}
else{
    if(!isset($_SESSION['view'][$id])){
         $view = $_SESSION['view'][$id] = 1;
         $sql1 = "INSERT INTO `product` (`product_view`) VALUES ($view) WHERE `product_id` = $id";
         connect($sql1);
    }
    else{
        $view = $_SESSION['view'][$id] += 1;
        $sql2 = "UPDATE `product` SET `product_view` = $view WHERE `product_id` = $id";
        connect($sql2);
    }
// var_dump($_SESSION['view'][$id]);
}
?>

