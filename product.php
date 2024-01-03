<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
        require "partials/header.php";
    ?>
    <div class="wrap">
        <?php
        require "partials/side-bar.php"
        ?>
        <div class="content">
            <div class="product">
                <div class="heading">sản phẩm</div>
                <div class="product-filter">
                    <div class="button">Sắp xếp theo</div>
                    <div class="button">Lọc theo</div>
                </div>
                <div class="row">
                        <?php
                        require "backend/connect.php" ;
                        if(isset($_GET['id-category'])){
                            $category = $_GET['id-category'];
                            $sql = "SELECT * FROM san_pham WHERE ma_loai_hang = $category";
                        }
                        else if(isset($_GET['seach-product'])){
                            $seachProduct = $_GET['seach-product'];
                            $sql = "SELECT * FROM san_pham WHERE ten_san_pham Like '%$seachProduct%'";
                        }
                        else{
                            $sql = "SELECT * FROM san_pham";
                        }
                        $result = mysqli_query($conn,$sql);
                            while($row = $result->fetch_assoc()){
                                echo'
                                <div class="col-3">
                                    <a href="detail-product.php?id-product=' . $row['ma_san_pham'] . '">
                                        <div class="product__item">
                                            <img class="product__img" src="uploads/'.$row['hinh_anh'].'">
                                            <div class="product__item-decs">
                                                <h3 class="product__name">'.$row['ten_san_pham'].'</h3>
                                                <span class="product__price">'.$row['gia'].'đ</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                ';
                            }
                        ?>
                        
                </div>
                
            </div>

            
        </div>
    </div>
    <?php require "partials/footer.php" ?>
    <script src="assets/js/script.js"></script>
</body>
</html>