<?php
$id = $_GET['id'];
$sql = "DELETE FROM user WHERE user_id LIKE '$id'";
connect($sql);
header("Location: index.php?act=show_account")
?>