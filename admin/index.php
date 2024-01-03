<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <!-- ----HEADER ---- -->
    <?php
    require "partials/header.php"
    ?>
    <!-- CONTENT -->
    <div class="container">
        <div class="home">
            <div class="home__add">
                <a href="product--add.php" class="home__add-link">
                    <img src="./assets/img/add-product.png" alt="" class="home__add-img">
                    <h3 class="home__add-heading">Thêm sản phẩm</h3>
                </a>
            </div>
            <div class="home__add">
                <a href="category--add.php" class="home__add-link">
                    <img src="./assets/img/add-category.png" alt="" class="home__add-img">
                    <h3 class="home__add-heading">Thêm danh mục</h3>
                </a>

            </div>
        </div>
    </div>
    <!-- ----FOOTER  ---- -->
    <?php
    require "partials/footer.php"
    ?>
</body>

</html>