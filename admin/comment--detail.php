<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require "partials/header.php"
    ?>
    <div class="container">
        <h2 class="heading">Chi tiết bình luận</h2>
        <table class="table--comment-detail">
            <tr>
                <th></th>
                <th>Nộ dung</th>
                <th>Ngày bình luận</th>
                <th>Người bình luận</th>
                <th></th>
                
            </tr>
            <?php
            if($_GET['id']){
                require "backend/connect.php";
                $id = $_GET['id'];
                $select = "SELECT * FROM binh_luan WHERE ma_san_pham ='$id'";
                $result = mysqli_query($conn,$select);
                while($row = $result->fetch_assoc()){
                $selectUser = "SELECT * FROM user Where ma_khach_hang = '$row[ma_khach_hang]'";
                $resultUser = mysqli_query($conn,$selectUser);
                $rowUser = $resultUser->fetch_assoc();
                echo'
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>'.$row['noi_dung'].'</td>
                    <td>'.$row['thoi_gian'].'</td>
                    <td>'.$rowUser['ho_va_ten'].'</td>
                    <td>
                        <a href="backend/comment/comment--delete.php?id='.$row['ma_binh_luan'].'&idProduct='.$id.'"class="btn">Xoá</a>
                    </td>
                </tr>
                ';
            }
            }
            
            ?>
        </table>
        <a class="btn" href="#">Chọn tất cả</a>
        <a class="btn" href="#">Bỏ chọn tất cả</a>
        <a class="btn" href="#">Xoá các mục đã chọn</a>
    </div>
</body>
</html>