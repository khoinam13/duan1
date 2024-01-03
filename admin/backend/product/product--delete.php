<?php
require  "../connect.php";
if($_GET['id']){
    $id = $_GET['id'];
    $Delete =  "DELETE FROM san_pham WHERE ma_san_pham = $id";
    $result = $conn->query($Delete) ;
    header("location: /CODE%20-%20DỰ%20ÁN%201/admin/product--list.php?messenger-success=Đã xoá thành công");
}
