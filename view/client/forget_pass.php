<script>
   
     function validate() {
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;

        if(username == "" ){
            document.getElementById('loiname').innerHTML = " Không được để trống";
            return false
        }
        else    document.getElementById('loiname').innerHTML = "";
        if(password == "" ){
            document.getElementById('loipass').innerHTML = " Không được để trống";
            return false;
     }  else document.getElementById('loipass').innerHTML ="";
    
        return true;

    
    }
</script>

<script src="https://cdn.tailwindcss.com"></script>
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
        <h2 class="title_login">Quyên Mật Khẩu</h2>
        <form class="login-form" method="POST" action="">
         
            <input type="text" placeholder="Nhập email" id="email" name="email" value="">
            <p id="loiemail"  style="color: red;"></p>
            <input type="text" placeholder=" Nhập username" id="username" name="user" value="">
            <p id="loiuser"  style="color: red;"></p>
     
            <input type="submit" onclick="return validate()" name="submit" class="submit" value="Tìm kiếm">
        
            <p class="message">Đã tìm được tài khoản ??? <a href="index.php?act=login">Đăng nhập</a></p>
        </form>
    </div>
</div>
</div>
<?php
    include './model/connect.php';
    if (isset($_POST['submit'])) {
    $username = $_POST['user'];
    $email = $_POST['email'];
    $sql = "select *from  user where user_id = '$username' and user_email = '$email' ";
    $kq = connect($sql);
    if($kq ->rowCount() ==1) {
          ?>   
            <p class="text-center font-bold text-[20px] mt-[-60px]">Đã tìm ra tài khoản của bạn </p>
          <?php
                $sql = "SELECT * FROM user WHERE user_id LIKE '$username'";
                $result = connect($sql);
                foreach($result as $row){  ?>
                <div class="text-center text-[20px]">
                <span>Tài khoản</span>  <span class="text-[30px] text-red-500"><?php echo $row['user_id']; ?></span>   <span> mật khẩu là :</span> <span class="text-[30px] text-red-500"> <?php  echo $row['user_password']; ?></span>
                </div>
             <?php  }
            
        }
    else { ?>

            <h1 class="text-center text-[25px] text-red-500 mt-[-60px]">Mật khẩu hoặc email không trùng khớp , check lại xem</h1>

   <?php }
}
?>

</body>
</html>