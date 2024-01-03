<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    require "connect.php"
    ?>
</head>
<body>
    <div class="side-bar">
            <div class="side-bar__wrap">
                <h2 class="side-bar__heading">Danh mục</h2>
                <ul class="side-bar__list">
                    <?php 
                        require "backend/connect.php";
                        $sql = "SELECT * FROM loai_hang";
                        $result = mysqli_query($conn,$sql);
                        while($row = $result->fetch_assoc()){
                            echo'
                            <li class="side-bar__item"><a href="product.php?id-category='.$row['ma_loai_hang'].'" class="side-bar__link">'.$row['ten_loai_hang'].'</a></li>
                            ';
                        }
                    ?>  
                </ul>
                <li onclick=""></li>
            </div>
            <div class="side-bar__wrap">
            <h2 class="side-bar__heading">Sản phẩm nổi bậc</h2>
                <ul class="side-bar__list">
                <?php 
                        require "backend/connect.php";
                        $sql = "SELECT * FROM san_pham";
                        $result = mysqli_query($conn,$sql);
                        while($row = $result->fetch_assoc()){
                            echo'
                            <li class="side-bar__item"><a href="detail-product.php?id-product='.$row['ma_san_pham'].'" class="side-bar__link">'.$row['ten_san_pham'].'</a></li>
                            ';
                        }
                    ?>  
                </ul>
            </div>
    </div>
</body>
</html>