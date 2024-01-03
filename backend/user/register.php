<?php
require "../connect.php";
if(isset($_POST['register-name'])){
    $registerName =  $_POST['register-name'];
    $registerFullName =  $_POST['register-full-name'];
    $registerSDT =  $_POST['register-sdt'];
    $registerEmail =  $_POST['register-email'];
    $registerAddress =  $_POST['register-address'];
    $registerPassword =  $_POST['register-password'];
    $registerDate =  $_POST['register-date'];

    
    $sql = "INSERT INTO user (ma_khach_hang, mat_khau, ho_va_ten, email, dia_chi, sdt, id_vai_tro, created_at)
            VALUES('$registerName', '$registerPassword',  '$registerFullName', '$registerEmail', '$registerAddress' , '$registerSDT', '1', '$registerDate')
     ";
    mysqli_query($conn, $sql);
    header('location:/CODE%20-%20DỰ%20ÁN%201/?register-status=Tạo tài khoản thành công');
}

?>