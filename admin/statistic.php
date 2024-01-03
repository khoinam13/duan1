<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php

use function PHPSTORM_META\type;

    require "partials/header.php"
    ?>
    <div class="container">
        <h2 class="heading">Thống kê từng loại hàng</h2>
        <table class="table--statistic">
            <tr>
                <th>Loại hàng</th>
                <th>Số lượng</th>
                <th>Giá cao nhất</th>
                <th>Giá thấp nhất</th>
                <th>Giá trung bình</th>
            </tr>
            <?php
            require "backend/connect.php";
            $select = "SELECT * FROM loai_hang";
            $result = mysqli_query($conn,$select);
            while($row = $result->fetch_assoc()){
                $selectQuantity = "SELECT * FROM san_pham WHERE ma_loai_hang = $row[ma_loai_hang]";
                $resultQuantity = mysqli_query($conn,$selectQuantity);
                $QuantityProduct = mysqli_num_rows($resultQuantity);
                // max price
                $selectMaxPrice = "SELECT MAX(gia) FROM san_pham";
                $resultMaxPrice = mysqli_query($conn,$selectMaxPrice);
                $rowMaxPrice = $resultMaxPrice->fetch_assoc();
                $maxPrice = implode($rowMaxPrice);
                // min price
                $selectMinPrice = "SELECT MIN(gia) FROM san_pham";
                $resultMinPrice = mysqli_query($conn,$selectMinPrice);
                $rowMinPrice = $resultMinPrice->fetch_assoc();
                $minPrice = implode($rowMinPrice);

                // medium -->  giá trung bình
                $mediumPrice = ($maxPrice + $minPrice) / 2;

                echo'
                    <tr>
                        <td>'.$row['ten_loai_hang'].'</td>
                        <td>'. $QuantityProduct.'</td>
                        <td>'.$maxPrice.'</td>
                        <td>'.$minPrice.'</td>
                        <td>'.$mediumPrice.'</td>
                        
                    </tr>
                ';
            }
            ?>
        </table>
        <a href="statistic--chart.php" class="btn">Xem biểu đồ</a>
    </div>
</body>
</html>