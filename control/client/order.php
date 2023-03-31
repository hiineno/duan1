<?php
if(!empty($_SESSION["cart"])){
    $cart = $_SESSION["cart"];
    }
if(isset($_POST['order'])){
    $username = $_SESSION['username'];
    $id_product = $_GET['id'];
    $total_all = $_POST['total_all'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $note = $_POST['note'];
    $total = $_POST['total_all'];
    $sql = "INSERT INTO cart (cart_phone, cart_address, cart_note, cart_email, cart_total, user_id) VALUES ($phone, '$address', '$note', '$email', $total, '$username')";
     $query = connect($sql);
     if(!empty($sql)){
        $get_id = "SELECT * FROM `cart`";
        $check = getAll($sql_check);
        foreach($check as $row){
            $id_cart = $row['id_cart'];
        }
        foreach ($cart as $key => $item){
        $sql = "INSERT INTO `bill` (cart_id, product_id, bill_quantity, bỉll_price) VALUES ($id_cart , $item[id], $item[quantity], '$item[total_all]')";
        connect($sql);
    }
    }
}
?>