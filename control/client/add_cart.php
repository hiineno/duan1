<?php
// session_destroy();
// // unset($_SESSION['cart'][$id]);
// die();
if(isset($_POST['primary-btn'])){
  $id = $_GET['id'];
 $size = $_POST['size'];
 if(empty($size)){
  $err = "Vui lòng nhập size";
  header("Location: index.php?act=detail_product&id=$id&error=$err");
  die();
}
}
if(isset($_POST['primary-btn'])){
  $id = $_GET['id'];
  $quantity = $_POST['quantity'];
  $sql = "SELECT product_quantity FROM product WHERE product_id = $id";
  $query = getAll($sql);
  foreach ($query as $row){
      if($quantity > $row['product_quantity']){
          echo '<script> alert("Số lượng vượt quá"); </script>';
          $err = [];
          $err = "Số lượng kho không đủ";
          header("location: index.php?act=detail_product&id=$id&err=$err");
          die();
      }
  }
}
if(isset($_POST['update_quantity'])){
  $quantity = $_POST['quantity'];
}
// echo $q;
//   die();
// }
$id = $_GET['id'];
if(empty($_SESSION['cart'][$id])){
    $query = "SELECT * FROM `product` WHERE `product_id` LIKE $id";
    $product = getOne($query); 
    $_SESSION['cart'][$id]['product_size'] = $_POST['size'];
    $_SESSION['cart'][$id]['product_avatar']= $product['product_avatar'];
    $_SESSION['cart'][$id]['product_name']= $product['product_name'];
    $_SESSION['cart'][$id]['product_price']= $product['product_price'];
    $_SESSION['cart'][$id]['product_id'] = $id;
    if(!empty($quantity)){
      $_SESSION['cart'][$id]['product_quantity'] = $quantity;
    // $_SESSION['cart'][$id]['product_quantity'] = 1;
  }
    else{
      // $_SESSION['cart'][$id]['product_quantity'] = $quantity;
      $_SESSION['cart'][$id]['product_quantity'] = $quantity + 1;
  }
 }else{
   $_SESSION['cart'][$id]['product_quantity'] = $quantity;
 }
//  if($_SESSION['cart'][$id]['product_quantity'] < 1){
//   unset($_SESSION['cart'][$id]);
// }
//    var_dump($_SESSION["cart"]);die; 
// echo "<script> return onclick='muon chuyen ko'</script>";
echo "<script> window.location.href='./index.php?act=detail_product</script>";
$noti = "Đặt hàng thành công";
  // header("location: ./index.php?act=shop&noti=$noti"); 
  header("location: ./index.php?act=cart&noti=$noti");
