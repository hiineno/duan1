<script>
    
     function validate() {

        var em = document.getElementById('email').value;
        var user = document.getElementById('username').value;

        if(em == "" ){
            document.getElementById('loimail').innerHTML = " Không được để trống";
            return false ;
        }
        else    document.getElementById('loimail').innerHTML = "";
        if(user == "" ){
            document.getElementById('loiuser').innerHTML = " Không được để trống";
            return false;
     }  else document.getElementById('loiuser').innerHTML ="";
    
        return true;

    
    }
</script>
<a href="./PHPMailer-master/">AAA</a>
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
            <p id="loimail"  style="color: red;"></p>
            <input type="text" placeholder=" Nhập username" id="username" name="user" value="">
            <p id="loiuser"  style="color: red;"></p>
     
            <input type="submit" onclick="return validate()" name="submit" class="submit" value="Tìm kiếm">
        
            <p class="message">Đã tìm được tài khoản ??? <a href="index.php?act=login">Đăng nhập</a></p>
        </form>
    </div>
</div>
</div>
<?php
  require "PHPMailer-master/PHPMailer-master/src/PHPMailer.php";
  require "PHPMailer-master/PHPMailer-master/src/SMTP.php";
  require 'PHPMailer-master/PHPMailer-master/src/Exception.php';
    include './model/connect.php';
    if (isset($_POST['submit'])) {
    $username = $_POST['user'];
    $email = $_POST['email'];
    $sql = "select *from  user where user_id = '$username' and user_email = '$email' ";
    $kq = connect($sql);
    if($kq ->rowCount() ==1) {
     
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    
    try {
        $sql = "SELECT * FROM user WHERE user_id LIKE '$username'";
        $result = connect($sql);
        foreach($result as $row);
        $mail->SMTPDebug = 0; 
        $mail->isSMTP();  
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  
        $mail->SMTPAuth = true; 
        $nguoigui = 'trongdua2098@gmail.com';
        $matkhau = 'ecsmmbnoshulgjoz';
        $tennguoigui = 'nguyễn hữu trọng';
        $mail->Username = $nguoigui; 
        $mail->Password = $matkhau;  
        $mail->SMTPSecure = 'ssl';  
        $mail->Port = 465;        
        $mail->setFrom($nguoigui, $tennguoigui ); 
        $to = $row['user_email'];
        $to_name = $row['user_name'];
        
        $mail->addAddress($to, $to_name); 
        $mail->isHTML(true);  
        $mail->Subject = 'Thư gửi từ DKQ-SHOP';      
        $noidungthu = "mật khẩu của tài khoản :"." ".$row['user_id']." "."bạn là"." ".$row['user_password']; ;
        $mail->Body = $noidungthu;
        $mail->smtpConnect( array(
               "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
        echo 'Đã gửi mail xong';
    } catch (Exception $e) {
        echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
    }
            
        }
    else { ?>

            <h1 class="text-center text-[25px] text-red-500 mt-[-60px]">Mật khẩu hoặc email không trùng khớp , check lại xem</h1>

   <?php }
}
?>

</body>
</html>