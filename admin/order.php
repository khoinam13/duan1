<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=10">
</head>
<body>
    <?php
    require "partials/header.php"
    ?>
    <div class="container">
        <h2 class="heading">Quản lí đơn hàng</h2>
        <table class="table--order">
            <tr>
                <th>Mã ĐH</th>
                <th>Mã KH</th>
                <th>Tên khách hàng</th>
                <th>Địa chỉ</th>
                <th>Email</th>
                <th>SDT</th>
                <th>Thời gian</th>
                <th>Tổng tiền</th>
            </tr>
            <?php
            require "backend/connect.php";
            $selectOrder = "SELECT * FROM `order`";
            $resultOrder = mysqli_query($conn,$selectOrder);
            while($rowOrder = $resultOrder->fetch_assoc()){
                $selectUser = "SELECT * FROM user WHERE ma_khach_hang = '$rowOrder[ma_khach_hang]'";
                $resultUser = mysqli_query($conn,$selectUser);
                $rowUser = $resultUser->fetch_assoc();
                // if($rowOrder['trang_thai'] == 1){
                //     $rowOrder['trang_thai'] = 'Đã hoàn thành';
                // }
                echo"
                <tr>
                    <td>$rowOrder[ma_don_hang]</td>
                    <td>$rowOrder[ma_khach_hang]</td>
                    <td>$rowUser[ho_va_ten]</td>
                    <td>$rowUser[dia_chi]</td>
                    <td>$rowUser[email]</td>
                    <td>$rowUser[sdt]</td>
                    <td>$rowOrder[thoi_gian]</td>
                    <td>$rowOrder[tong_tien_don_hang]</td>
                </tr>
                ";
            }
            ?>
        </table>
    </div>
</body>

</html>