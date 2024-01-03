<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    require "partials/header.php"
    ?>
    <div class="container">
        <h2 class="heading">Quản lí khách hàng</h2>
        <table class=" table--client">
            <tr>
                <th></th>
                <th>Mã KH</th>
                <th>Họ và tên</th>
                <th>Email</th>
                <th>Vai Trò</th>
                <th></th>
            </tr>
            <?php
            require "backend/connect.php";
            $selectUser = "SELECT * FROM user";
            $resultUser = mysqli_query($conn,$selectUser);
            while($row = $resultUser->fetch_assoc()){
                $selectRole = "SELECT * FROM vai_tro WHERE id_vai_tro = '$row[id_vai_tro]'";
                $resultRole = mysqli_query($conn,$selectRole);
                $rowRole = $resultRole->fetch_assoc();
                echo'
                <tr>
                    <td>
                        <input type="checkbox" class="input-check">
                    </td>
                    <td>'.$row['ma_khach_hang'].'</td>
                    <td>'.$row['ho_va_ten'].'</td>
                    <td>'.$row['email'].'</td>
                    <td>'.$rowRole['ten_vai_tro'].'</td>
                    <td>
                        <a href="backend/client/client--delete.php?id='.$row['ma_khach_hang'].'" class="btn">Xoá</a>
                    </td>
                </tr>
                ';
            }
            ?>
        </table>
        <span id="messenger" class="messenger"></span>
        <?php
           
            require "backend/function.php";
            messenger('messenger')
        ?>
        <a class="btn" href="#">Chọn tất cả</a>
        <a class="btn" href="#">Bỏ chọn tất cả</a>
        <a class="btn" href="#">Xoá các mục đã chọn</a>
    </div>
</body>

</html>