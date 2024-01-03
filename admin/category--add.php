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
        <h2 class="heading">Quản lí loại hàng</h2>
        <form action="backend/category/category--add.php" method="post" class="category">
            <div class="category__box">
                <h3 class="heading">Mã loại</h3>
                <input type="number" class="input boder-input input-disabled" disabled placeholder="auto">
            </div>
            <div class="category__box">
                <h3 class="heading">Tên loại</h3>
                <input type="text" class="input boder-input" name="category-name" id="category-name">
            </div>
            <!-- báo lỗi nhập không hợp lệ  -->
            <span id='messenger' class="messenger"></span>
            <?php
            require "backend/function.php";
            messenger('messenger');
            backValue('category-name','value')
            ?>
            <button class="btn" type="submit">Thêm mới</button>
            <a class="btn" href="category--add.php">Nhập lại</a>
            <a class="btn" href="category--list.php">Danh sách</a>
            
    </div>
    </form>

</body>

</html>