<?php
    require "../connect.php";
    if(!isset($_COOKIE['user-name'])){
        header('Location:/coDE%20-%20DỰ%20ÁN%201/detail-product.php?id-product=35&not-logged-in=Vui lòng đăng nhập để tiếp tục mua sắm và bình luận!!');
    }
    else{
        $commentProduct = $_POST['comment-product'];
        $user = $_COOKIE['user-name'];
        $product = $_GET['id-product'];
        var_dump($commentProduct, $user, $product);
        $sql = "INSERT INTO binh_luan (noi_dung , ma_san_pham, ma_khach_hang) VALUES 
                ('$commentProduct', '$product', '$user')";
        $result = mysqli_query($conn, $sql);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>