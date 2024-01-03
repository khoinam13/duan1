<?php
require "../connect.php";
if ($_GET['id']) {
    $id = $_GET['id'];
    if ($_POST['product-name--update']) {
        $productNameUpdate = $_POST['product-name--update'];
    }
    if ($_POST['product-price--update']) {
        $productPriceUpdate = $_POST['product-price--update'];
    }
    if($_POST['product-price-size-l--update']){
        $productPriceSizeLUpdate = $_POST['product-price-size-l--update'];
    }
    $update = "UPDATE san_pham SET ten_san_pham = '$productNameUpdate',  gia = '$productPriceUpdate', gia_size_l = '$productPriceSizeLUpdate' WHERE ma_san_pham = '$id'";
    $updateName = "UPDATE san_pham SET ten_san_pham = '$productNameUpdate' WHERE ma_san_pham = '$id'";
    $updatePrice = "UPDATE san_pham SET gia = '$productPriceUpdate' WHERE ma_san_pham = '$id'";
    $updatePriceSizeL = "UPDATE san_pham SET gia_size_l = '$productPriceSizeLUpdate' WHERE ma_san_pham = '$id'";
    $select = "SELECT * FROM san_pham Where ten_san_pham = '$productNameUpdate'";
    $result = mysqli_query($conn, $select);
    $checkName = strlen($productNameUpdate) < 5 || strlen($productNameUpdate) > 50 || is_numeric($productNameUpdate);
    $checkPrice = $productPriceUpdate <= 0 || $productPriceUpdate < 10000 || $productPriceUpdate > 50000;
    $checkPriceSizeL = $productPriceSizeLUpdate <= 0 || $productPriceSizeLUpdate < 10000 || $productPriceSizeLUpdate > 50000;
    $backPath = "/CODE%20-%20DỰ%20ÁN%201/admin/product--update.php";
    //  sửa cả 3
    if (isset($productNameUpdate) && isset($productPriceUpdate) && isset($productPriceSizeLUpdate)) {
        // if (mysqli_num_rows($result) > 0) {
        //     header("Location: $backPath?id=$id&messenger-err=Tên Sản phẩm đã tồn tại&productNameUpdate=$productNameUpdate&productPriceUpdate=$productPriceUpdate&productPriceSizeLUpdate=$productPriceSizeLUpdate");
        // } 
        if ($checkName) {
            header("Location: $backPath?id=$id&messenger-err=Tên sản phẩm không hợp lệ,vui lòng nhập lại&productNameUpdate=$productNameUpdate&productPriceUpdate=$productPriceUpdate&productPriceSizeLUpdate=$productPriceSizeLUpdate");
        } else if ($checkPrice || $checkPriceSizeL) {
            header("Location: $backPath?id=$id&messenger-err=Giá sản phẩm không hợp lệ,vui lòng nhập lại&productNameUpdate=$productNameUpdate&productPriceUpdate=$productPriceUpdate&productPriceSizeLUpdate=$productPriceSizeLUpdate");
        } else {
            mysqli_query($conn, $update);
            header("Location: $backPath?id=$id&messenger-success=Cập nhật thành công");
        }
    }
    else {
        header("Location: $backPath?id=$id&messenger-err=Vui Lòng không để trống!!&productNameUpdate=$productNameUpdate&productPriceUpdate=$productPriceUpdate&productPriceSizeLUpdate=$productPriceSizeLUpdate");
    }
    //  chỉ sửa tên
    // else if (isset($productNameUpdate) && !isset($productPriceUpdate)) {
    //     if (mysqli_num_rows($result) > 0) {
    //         header("Location: $backPath?id=$id&messenger-err=Tên Sản phẩm đã tồn tại&productNameUpdate=$productNameUpdate");
    //     } else if ($checkName) {
    //         header("Location: $backPath?id=$id&messenger-err=Tên sản phẩm không hợp lệ,vui lòng nhập lại&productNameUpdate=$productNameUpdate");
    //     } else {
    //         mysqli_query($conn, $updateName);
    //         header("Location: $backPath?id=$id&messenger-success=Cập nhật tên thành công");
    //     }
        
    // }
    //  chỉ sửa giá
    // else if (!isset($productNameUpdate) && isset($productPriceUpdate)) {
    //     if ($checkPrice) {
    //         header("Location: $backPath?id=$id&messenger-err=Giá sản phẩm không hợp lệ,vui lòng nhập lại&productPriceUpdate=$productPriceUpdate");
    //     } else {
    //         mysqli_query($conn, $updatePrice);
    //         header("Location: $backPath?id=$id&messenger-success=Cập nhật giá thành công");
    //     }
    // }
    //  chưa nhập
    
}
