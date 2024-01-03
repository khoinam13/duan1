<?php
    require "../connect.php";
    if($_POST['category--update'] && $_GET['id']){
        $categoryUpdate = $_POST['category--update'];
        $id = $_GET['id'];
        $select = "SELECT * FROM loai_hang where ten_loai_hang = '$categoryUpdate'";
        $result = mysqli_query($conn,$select);
        $update = "UPDATE loai_hang SET ten_loai_hang = '$categoryUpdate' WHERE ma_loai_hang = $id";
        if(mysqli_num_rows($result) > 0){
            header("Location: /CODE%20-%20DỰ%20ÁN%201/admin/category--update.php?id=$id&messenger-err=Tên loại hàng đã tồn tại&categoryUpdate=$categoryUpdate");
        }
        else if(strlen($categoryUpdate)<5 || strlen($categoryUpdate) > 50 || $categoryUpdate = null || $categoryUpdate = '' || is_numeric($categoryUpdate)){
            header("Location: /CODE%20-%20DỰ%20ÁN%201/admin/category--update.php?id=$id&messenger-err=Tên loại hàng không hợp lệ,vui lòng nhập lại&categoryUpdate=$categoryUpdate");
        }
        else{
            mysqli_query($conn,$update);
            header("Location: /CODE%20-%20DỰ%20ÁN%201/admin/category--list.php?messenger-success=Cập nhật thành công");
        }   
    }
?>