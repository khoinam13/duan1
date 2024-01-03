<?php
    require "../connect.php";
    if($_GET['id']){
        $id = $_GET['id'];
        $idProduct = $_GET['idProduct'];
        $delete = "DELETE FROM binh_luan WHERE ma_binh_luan = '$id'";
        $sql = mysqli_query($conn,$delete);
        $backPath = "/CODE%20-%20DỰ%20ÁN%201/admin/comment--detail.php?id=$idProduct";
        
        header("location: $backPath");
        
    }
?>