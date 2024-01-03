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
        <h2 class="heading">Tổng hợp bình luận</h2>
        <table class=" table-comment">
            <tr>
                <th>Sản phẩm</th>
                <th>Số Bình luận</th>
                <th>Mới nhất</th>
                <th>Cũ nhất</th>
                <th></th>
            </tr>
            <?php
                require "backend/connect.php";
                $select = "SELECT DISTINCT ma_san_pham FROM binh_luan";
                $result = mysqli_query($conn,$select);
                while($row = $result->fetch_assoc()){
                    $i=0;
                    // seclt PRODUCT
                    $selectProduct = "SELECT * FROM san_pham WHERE ma_san_pham = '$row[ma_san_pham]'";
                    $resultProduct = mysqli_query($conn,$selectProduct);
                    $rowProduct = $resultProduct->fetch_assoc();
                    // đếm - > quantity
                    $SelectQuantity = "SELECT COUNT(*) FROM  binh_luan WHERE ma_san_pham = '$row[ma_san_pham]'";
                    $resultQuantity = mysqli_query($conn,$SelectQuantity);
                    $countProduct = $resultQuantity->fetch_row();
                    
                    echo '
                    <tr>
                        <td>'.$rowProduct['ten_san_pham'].'</td>
                        <td>'.$countProduct[$i].'</td>
                        <td></td>
                        <td></td>
                        <td>
                        <a href="./comment--detail.php?id='.$row['ma_san_pham'].'" class="btn">Chi tiết</a>
                        </td>
                    </tr>
                    ';
                    
                $i++;
            }
     
            ?>
        </table>
    </div>
</body>

</html>