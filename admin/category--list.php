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
        <h2 class="heading">Quản lí loại hàng</h2>
        <table class="table--category">
            <tr>
                <th></th>
                <th>Mã loại</th>
                <th>tên loại</th>
                <th></th>
            </tr>
            <?php
            require "backend/connect.php";
            $sql = "SELECT * FROM loai_hang";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo '
                <tr>
                    <td>
                        <input class="column-check" type="checkbox" name="" id="">
                    </td>
                    <td>' . $row['ma_loai_hang'] . '</td>
                    <td>' . $row['ten_loai_hang'] . '</td>
                    <td>
                        <a href="category--update.php?id=' . $row['ma_loai_hang'] . '" class="btn">Sửa</a>
                        <a href="backend/category/category--delete.php?id=' . $row['ma_loai_hang'] . '" class="btn">Xoá</a>
                    </td>
                </tr>
                ';
            }
            ?>
        </table>
        <span id="messenger" class='messenger'></span>
        <?php
        require "backend/function.php";
        messenger('messenger');
        ?>

        <a class="btn" href="#">Chọn tất cả</a>
        <a class="btn" href="#">Bỏ chọn tất cả</a>
        <a class="btn" href="#">Xoá các mục đã chọn</a>
        <a class="btn" href="category--add.php">Nhập thêm</a>
    </div>
</body>

</html>