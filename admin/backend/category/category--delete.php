<!-- Xoá  -->
<?php
require "../connect.php";
$id = $_GET['id'];
$delete = "DELETE FROM loai_hang WHERE ma_loai_hang = $id";
$selectProduct = "SELECT * FROM san_pham WHERE ma_loai_hang =$id";
$result = mysqli_query($conn, $selectProduct);
if (mysqli_num_rows($result) > 0) {
    header('location: /CODE%20-%20DỰ%20ÁN%201/admin/category--list.php?messenger-err=Loại hàng có tồn tại sản phẩm');
} else {
    mysqli_query($conn, $delete);
    header('location: /CODE%20-%20DỰ%20ÁN%201/admin/category--list.php?messenger-success=Xoá thành công!!!');
}
?>