<?php
    require "../connect.php";
    if($_GET['id']){
        $id = $_GET['id'];
        $delete = "DELETE FROM user WHERE ma_khach_hang = '$id'";
        $result = mysqli_query($conn,$delete);
        $backPath = "/CODE%20-%20DỰ%20ÁN%201/admin/client.php";
        header("location: $backPath?messenger-success=Đã xoá thành công");
    }
?>