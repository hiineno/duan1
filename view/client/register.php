<script>
    function validate(){
        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        var cf_password = document.getElementById("cf_password").value;
        var checkmail =/^[a-z][a-z0-9A-Z-_.]{2,}\@[a-z]{2,}\.[a-z.]{2,}$/;

        if(name==""){
            document.getElementById("loiname").innerHTML=" Không được để trống";
            return false;
        }
        else if(name.length <3  ){
            document.getElementById("loiname").innerHTML="tên ngắn quá";
            
            return false;}
        else document.getElementById("loiname").innerHTML="";
        if(email ==""){
            document.getElementById("loiemail").innerHTML =" Không được để trống";
            return false;
        }
        
        else if(!checkmail.test(email)) {
            document.getElementById("loiemail").innerHTML="nhập sai định dạng email";
            return false;
        }
        else document.getElementById("loiemail").innerHTML="";
        if (username ==""){
            document.getElementById("loiuser").innerHTML=" Không được để trống";
            return false;
        }
        else if(username.length <3){
            document.getElementById("loiuser").innerHTML= "tài khoản nhiều hơn 3 ký tự";
            return false;
        }
        else document.getElementById("loiuser").innerHTML="";
        if(password ==""){
            document.getElementById("loipass").innerHTML=" Không được để trống";
            return false;
        }
        else if (password.length <3){
            document.getElementById("loipass").innerHTML="nhập pass nhiều hơn 3 ký tự";
            return false;
        }
        else document.getElementById("loipass").innerHTML="";
        if(cf_password ==""){
            document.getElementById("loicfpass").innerHTML=" Không được để trống";
            return false;
        }
        else if (cf_password != password){
            document.getElementById("loicfpass").innerHTML = " mật khẩu không trùng nhau";
            return false;
        }
        else document.getElementById("loicfpass").innerHTML="";

        return true;
       
        
        }
    
    

</script>


<?php

if (isset($_POST['submit'])) {
    
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cf_password = $_POST['cf_password'];
    $email  = $_POST['email'];
    

        // $checksql = "select*from user where user_id= '$username'";
        // $kq = connect($checksql);
        // // if($kq ->rowCount() ==1){
        //     echo "tài khoản đã tồn tại";
        //     return false;
        // }
        // else{
            $sql = "INSERT INTO user (`user_id`, `user_name`, `user_password`, `user_email`) VALUES ('$username', '$name', '$password', '$email')";
        connect($sql);
        $noti = "Đăng kí thành công";
        echo "<script> window.location.href='index.php?act=login&noti=$noti'</script>";
        }
   

?>
<link rel="stylesheet" href="./src/css/bootstrap.min.css">
<link rel="stylesheet" href="./src/css/register.css">
<div class="body">
<div class="return">
<a href="index.php?act=home_user">
    <li class="return-text"><i class="fa-solid fa-rotate-left"></i> Quay lại trang chủ</li>
</a>
</div>
<div class="login-page">
    <div class="form">
        <h2 class="title_login">Đăng Kí</h2>
        <form class="login-form" method="POST" action="">
            <input type="text" placeholder="Nhập name" id="name" name="name" value="">
            <p id="loiname" style="color: red;"></p>
            <input type="text" placeholder="Nhập email" id="email" name="email" value="">
            <p id="loiemail"  style="color: red;"></p>
            <input type="text" placeholder=" Nhập username" id="username" name="username" value="">
            <p id="loiuser"  style="color: red;"></p>
            <input type="text" placeholder="Nhập password" id="password" name="password" value="">
            <p id="loipass"  style="color: red;"></p>
            <input type="text" placeholder="Xác nhận password" id="cf_password" name="cf_password" value="">
            <p id="loicfpass"  style="color: red;"></p>
            <input type="submit" onclick="return validate()" name="submit" class="submit" value="Đăng Kí">
            <?php
            if(!empty($err)){
                echo '<p style="color: red;">';
                echo $err;
                echo '</p>';
            }
            ?>
            <p class="message">Đã có tài khoản? <a href="index.php?act=login">Đăng nhập</a></p>
        </form>
    </div>
</div>

<?php
if (!empty($err)) {
    echo '<p style="color: red;">';
    echo $err;
    echo '</p>';
}
?>

</div>
</html>