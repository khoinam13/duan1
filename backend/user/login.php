<?php
require "../connect.php";
if(isset($_POST['login-name'])){
    $loginName = $_POST['login-name'];
    $loginPassword = $_POST['login-password'];
    $sql = "SELECT * FROM user Where ma_khach_hang = '$loginName' AND mat_khau = '$loginPassword'";
    $result = mysqli_query($conn,$sql);
    $checkPassword = mysqli_num_rows($result);
    if($checkPassword < 1 ){
        // header('Location: ' . $_SERVER['HTTP_REFERER']);
        header("location: /coDE%20-%20DỰ%20ÁN%201/?messenger= Mật khẩu không đúng vui lòng nhập lại&login-name=$loginName&login-password=$loginPassword");
    }
    else{
        setcookie('user-name',$loginName,time()+(86400*30),"/");
        // setcookie('user-password',$loginPassword,time()+(86400*30),"/");
        header(("location: /coDE%20-%20DỰ%20ÁN%201/?login-status=Đăng nhập thành công"));
    }
    
}
