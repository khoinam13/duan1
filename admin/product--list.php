<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require "partials/header.php";
    ?>
    <div class="container">
        <h2 class="heading">Quản lí sản phẩm</h2>
        <table class="table--product">
            <tr>
                <th></th>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Đơn giá</th>
                <th>Đơn giá size L</th>
                <th>Giảm giá</th>
                <th>Lượt xem</th>
                <th></th>
            </tr>
            <?php
            require "backend/connect.php";
            $sql = "SELECT * FROM san_pham";
            $result = mysqli_query($conn,$sql);
            while($row = $result->fetch_assoc()){
                echo'
                <tr>
                    <td>
                        <input class="input-check" type="checkbox" name="" id="">
                    </td>
                    <td>'.$row['ma_san_pham'].'</td>
                    <td>'.$row['ten_san_pham'].'</td>
                    <td>'.$row['gia'].'</td>
                    <td>'.$row['gia_size_l'].'</td>
                    <td>'.$row['giam_gia'].'</td>
                    <td>'.$row['so_luot_xem'].'</td>
                    <td>
                        <a href="product--update.php?id='.$row['ma_san_pham'].'" class="btn">Sửa</a>
                        <a href="backend/product/product--delete.php?id='.$row['ma_san_pham'].'" class="btn">Xoá</a>
                    </td>
                </tr>
                ';
            }
            ?> 
        </table>
        <span id="messenger" class="messenger"></span>
        <?php
        require "backend/function.php";
            messenger("messenger");
        ?>
        <a class="btn" href="product--add.php">Thêm mới</a>
    </div>
</body>
</html>