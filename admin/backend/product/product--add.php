<?php
require "../connect.php";
if (isset($_POST['product-name'])) {
    $productName = $_POST['product-name'];
    $productPrice = $_POST['product-price'];
    $productPriceSizeL = $_POST['product-price-sizeL'];
    $productImage = basename($_FILES['product-image']['name']);
    // update file 
    $target_dir = '../../../uploads/';
    $target_file = $target_dir . $productImage;
    move_uploaded_file($_FILES["product-image"]["tmp_name"], $target_file);
    $productCategory = $_POST['product-category'];
    $productDescription = $_POST['product-description'];

    $insert = "INSERT INTO san_pham (ten_san_pham, hinh_anh, gia, gia_size_l, ma_loai_hang, mo_ta)VALUES
    ('$productName', '$productImage', '$productPrice', '$productPriceSizeL', '$productCategory' ,'$productDescription')";
    $select = "SELECT * FROM san_pham WHERE ten_san_pham = '$productName'";
    $result = mysqli_query($conn, $select);
    $backPath = "/CODE%20-%20DỰ%20ÁN%201/admin/product--add.php";
    if (mysqli_num_rows($result) > 0) {
        header("location:$backPath?messenger-err= Sản phẩm đã tồn tại,  vui lòng nhập lại&productName=$productName&productPrice=$productPrice&productDescription=$productDescription");
    } else if ($productName == '' || $productName == null || strlen($productName) <= 5 || strlen($productName) > 50  || is_numeric($productName)) {
        header("location:$backPath?messenger-err= Kí tự nhập vào không hợp lệ,  vui lòng nhập lại&productName=$productName&productPrice=$productPrice&productDescription=$productDescription");
    } else if ($productPrice <= 0 || $productPrice < 10000 || $productPrice  > 50000 || $productPriceSizeL <= 0 || $productPriceSizeL < 10000 || $productPriceSizeL > 50000) {
        header("location:$backPath?messenger-err= Giá sản phẩm không hợp lệ,  vui lòng nhập lại&productName=$productName&productPrice=$productPrice&productDescription=$productDescription");
    } else if (strlen($productDescription) <  10 || strlen($productDescription) > 100) {

        header("location:$backPath?messenger-err= Vui lòng nhập mô tả trên 10 và dưới 100 ký tự&productName=$productName&productPrice=$productPrice&productDescription=$productDescription");
    } else {
        mysqli_query($conn, $insert);
        header("location:/CODE%20-%20DỰ%20ÁN%201/admin/product--list.php?messenger-success=Đã thêm thành công sản phẩm");
    }
}
