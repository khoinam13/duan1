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
        <h2 class="heading">Quản lí sản phẩm</h2>
        <?php
        require "backend/connect.php";
        require "backend/function.php";
        if (isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "SELECT * FROM san_pham Where ma_san_pham =$id";
            $result = mysqli_query($conn, $sql);
            $row = $result->fetch_assoc();
            echo '
            <form action="backend/product/product--update.php?id='.$id.'" method="post">
                <h3 class="heading">Tên Sản Phẩm Mới</h3>
                <input type="text" name="product-name--update" id="product-name--update" class="input boder-input" placeholder="' . $row["ten_san_pham"] . '">
                <h3 class="heading">Giá Mới</h3>
                <input type="number" name="product-price--update" id="product-price--update" class="input boder-input" placeholder="' . $row["gia"] . '">
                <h3 class="heading">Giá Size(L) Mới</h3>
                <input type="number" name="product-price-size-l--update" id="product-price-size-l--update" class="input boder-input" placeholder="' . $row["gia_size_l"] . '">
                <span id="messenger" class="messenger"></span>
                <button class="btn" type"submit">Cập nhật</button>
                <a class="btn" href="product--list.php">Danh sách</a>
            </form>
            ';
        }
        messenger("messenger");
        backValue("product-price--update", "productPriceUpdate");
        backValue("product-price-size-l--update", "productPriceSizeLUpdate");
        backValue("product-name--update", "productNameUpdate");
        
        ?>
    </div>

</body>

</html>