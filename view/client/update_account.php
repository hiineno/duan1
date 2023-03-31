<?php
if(isset($_POST['submit_avatar'])){
    $user = $_SESSION['username'];
    $img = $_FILES['img']['name'];
    $tmp = $_FILES['img']['tmp_name'];
    move_uploaded_file($tmp, "./src/imgs/img_avatar/" . $img);
    if(!empty($img)){
    $sql_check = "SELECT user_avatar FROM user";
    $check = getAll($sql_check);
    if(empty($check)){
        $sql = "INSERT INTO user (user_avatar) VALUES('$img') WHERE user_id LIKE '$user'";
        connect($sql);
    }
    else{
        $sql = "UPDATE user SET user_avatar = '$img' WHERE user_id LIKE '$user'";
        connect($sql);
    }
}else{ 
    echo ' <script> alert("Không đưỡc để ảnh trống");</script>';
}
}
if(isset($_POST['btn'])){
    $err = [];
    $user = $_SESSION['username'];
    $pass_old = $_POST['pass_old'];
    $pass_new = $_POST['pass_new'];
    $cf_pass_new = $_POST['cf_pass_new'];
    $sql_check = "SELECT * FROM user WHERE user_id LIKE '$user'";
    $check = getAll($sql_check);
    foreach($check as $row)
    {
        if($pass_new != $cf_pass_new){
            $err['cf_pass'] = "Mật khẩu không trùng khớp";
    }elseif($pass_old != $row['user_password']){
        $err['pass_old'] = 'Mật khẩu cũ sai';
    }
    else{
        $sql = "UPDATE user SET user_password = '$pass_new' WHERE user_id LIKE '$user'";
        connect($sql);
        echo ' <script> alert("Thay đổi mật khẩu thành công");</script>';
    }

}
}
?>
<link rel="stylesheet" href="./src/css/update_account.css" type="text/css">
<div class="main">
    <div class="shoping__discount" style="padding:15px;">
        <h5>Hồ sơ của tôi</h5>
        <form action="" method="post">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    

                    <div class="checkout__input">
                        <p>Mật khẩu cũ<span>*</span></p>
                        <input type="password" placeholder="" name="pass_old" class="checkout__input__add">
                        <?php
                        if(!empty($err['pass_old'])){
                            echo'<p style="color:red;>';
                            echo  $err['pass_old'];
                            echo '</p>';
                        }
                        ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="checkout__input">
                                <p>Mật khẩu mới<span>*</span></p>
                                <input type="password" name="pass_new">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="checkout__input">
                                <p>Xac nhận mật khẩu<span>*</span></p>
                                <input type="password" name="cf_pass_new">
                                <?php
                                if(!empty($err['cf_pass'])){
                                    echo'<p style="color:red;>';
                                    echo  $err['cf_pass'];
                                    echo '</p>';
                                }
                                 ?>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn" style="margin-top:20px ;color:white;" name="btn">Đổi mật khẩu</button>
                </div>
            </div>
        </form>
    </div>
    <div>
        <form action="" method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="avatar-upload">
                <div class="avatar-edit">
                    <input type='file' id="imageUpload" name="img" accept=".png, .jpg, .jpeg" />
                    <label for="imageUpload"></label>
                </div>
                <div class="avatar-preview">
                        <?php
                        if(!empty($_SESSION['username'])){
                        $user = $_SESSION['username'];
                        $sql = "SELECT * FROM `user` WHERE `user_id` LIKE '$user'";
                        $query = getAll($sql);
                        foreach ($query as $item):
                        
                        ?>
                        <img src="./src/imgs/img_avatar/<?=$item['user_avatar'] ?>" alt="" width="190px" height="180px" style="border-radius: 100%">
                        <?php endforeach;
                        }              
                        ?>
          

                </div>
             <div class="submit">
             <input type="submit" value="Cập nhật" name="submit_avatar" class="btn-submit">
             </div>
            </div>
        </div>
        </form>
    </div>

</div>
</div>
<script src="./src/js/update_account.js"></script>