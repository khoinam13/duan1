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
        <h2 class="heading">Quản lí sản phẩm</h2>
        <form action="backend/product/product--add.php" method="post" class="product" enctype="multipart/form-data">
            <div class="product__box">
                <div class="product__box-row row">
                    <div class="product__item col-6">
                        <label for="" class="heading">Mã hàng hoá</label>
                        <input class="input boder-input input-disabled" type="text" disabled placeholder="auto">
                    </div>
                    <div class="product__item col-6">
                        <label for="" class="heading">Tên hàng hoá</label>
                        <input class="input boder-input" type="text" name="product-name" id="product-name">
                    </div>
                </div>
                <div class="product__box-row row">
                    <div class="product__item col-6">
                        <label for="" class="heading">Đơn giá</label>
                        <input class="input boder-input" type="number" name="product-price" id="product-price" placeholder="10000đ - 50000đ">
                    </div>
                    <div class="product__item col-6">
                        <label for="" class="heading">Đơn giá(L)</label>
                        <input class="input boder-input" type="number" name="product-price-sizeL" id="product-price" placeholder="10000đ - 50000đ">
                    </div>
                </div>
                <div class="product__row row">
                    <div class="product__item col-6">
                        <label for="" class="heading">Giảm giá</label>
                        <input class="input boder-input input-disabled" type="number" disabled>
                    </div>
                    <div class="product__item col-6">
                        <label for="" class="heading">Hình ảnh</label>
                        <input class="input boder-input" type="file" name="product-image">
                    </div>
                    <div class="product__item col-6">
                        <label for="" class="heading">Loại hàng</label>
                        <select name="product-category" id="" class="input boder-input">
                            <?php
                            require  "backend/connect.php";
                            $sql = "SELECT * FROM loai_hang";
                            $result = mysqli_query($conn, $sql);
                            while ($row = $result->fetch_assoc()) {
                                echo '
                                    <option value="' . $row['ma_loai_hang'] . '">' . $row['ten_loai_hang'] . '</option>
                                    ';
                            }
                            ?>

                        </select>
                    </div>
                    <div class="product__item col-6">
                        <label for="" class="heading">Số lượt xem</label>
                        <input class="input boder-input" type="number" disabled>
                    </div>
                </div>
                <div class="product__box-row row">
                    <div class="product__item col-12">
                        <label for="" class="heading">Ngày nhập</label>
                        <input class="input boder-input input-disabled" type="date" disabled placeholder="auto">
                    </div>
                </div>
                <div class="product__box-row row">
                    <div class="product__item col">
                        <label for="" class="heading">Mô tả</label>
                        <textarea class="product__description boder-input" name="product-description" id="product-description"></textarea>
                    </div>
                </div>
            </div>
            <span id="messenger" class="messenger"></span>
            <?php
            require "backend/function.php";
            messenger('messenger');
            backValue('product-name', 'productName');
            backValue('product-price', 'productPrice');
            backValue('product-description', 'productDescription');
            ?>
            <button class="btn" type="submit">Thêm mới</button>
            <a class="btn" href="product--add.php">Nhập lại</a>
            <a class="btn" href="product--list.php">Danh sách</a>
        </form>
    </div>
</body>

</html>