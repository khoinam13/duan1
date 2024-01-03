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
    <div class="wrap">
        <?php
        require "partials/side-bar.php";
           // xử lí chưa đăng nhập khi mua hàng
           if (isset($_GET['not-logged-in'])) {
            $messenger = $_GET['not-logged-in'];
            echo "
                <script>
                    setTimeout(function(){
                        var loginBtn = document.querySelector('.module--login');
                        loginBtn.classList.add('open');
                    },100)
                    setTimeout(function(){
                        alert('$messenger')
                    },200)
                    setTimeout(function(){
                        window.location='/coDE%20-%20DỰ%20ÁN%201/';
                    },60000)
                </script>
            ";
            }
        ?>
        <div class="content">
            <div class="detail__product">
                <?php
                require "backend/connect.php";
                if(isset($_GET['id-product'])){
                    $idProduct = $_GET['id-product'];
                    $sql = "SELECT * FROM san_pham WHERE ma_san_pham = '$idProduct'";
                    $result = mysqli_query($conn, $sql);
                    while($row = $result->fetch_assoc()){
                        echo'
                        <img src="uploads/'.$row['hinh_anh'].'" alt="" class="detail__product-img">
                        <form action="cart.php" method="post">
                        <div class="detail__product-decs">
                            <div class="detail__product-name">'.$row['ten_san_pham'].'</div>
                            <div class="detail__product-price detail__product-price--m checked">'.$row['gia'].'</div>
                            <div class="detail__product-price detail__product-price--l">'.$row['gia_size_l'].'</div>
                            <div class="detail__product-seperate"></div>
                            <div class="detail__product-box">
                                <div class="detail__product-heading">Size</div>
                                <input type="radio" name="product-size" value="M" id="product-size-m" checked="checked" >
                                <label for="product-size-m" class="detail__product-size-option">M</label>
                                <input type="radio" name="product-size" value="L" id= "product-size-l">
                                <label for="product-size-l" class="detail__product-size-option">L</label>
                            </div>
                            <div class="detail__product-box">
                                <div class="detail__product-heading">Số lượng</div>
                                <div class="detail__product-quantity-wrap">
                                    <input class="detail__product-quantity-input" id="product-quantity-reduce" type="button" value="-">
                                    <input name="product-quantity" class="detail__product-quantity-input" id="product-quantity" type="number" value=1>
                                    <input class="detail__product-quantity-input" id="product-quantity-increase" type="button" value="+">
                                </div>
                            </div>
                            <div class="detail__product-box">
                                <div class="detail__product-heading">Ghi chú</div>
                                <input name="product-decs" class="detail__product-note-input" type="text" placeholder="Nhập ghi chú của bạn">
                            </div>
                            <input type="hidden" name="product-id" value="'.$row['ma_san_pham'].'">
                            <input type="hidden" name="product-img" value="'.$row['hinh_anh'].'">
                            <input type="hidden" name="product-name" value="'.$row['ten_san_pham'].'">
                            <input type="hidden" name="product-price" value="'.$row['gia'].'">
                            <input type="hidden" name="product-price-size-l" value="'.$row['gia_size_l'].'">
                            <div class="detail__product-box">
                                <input type="submit" name="product__cart" class="detail__product-button" value="Thêm vào giỏ hàng">
                                <button class="detail__product-button">Mua ngay</button>
                            </div>
                        </div>
                        </form>
                        ';
                    }
                }
                ?> 
            </div>
            <?php
                function getID ($id){
                    echo"$id";
                }
                
                // comment 
                function showComent($id){
                    require "backend/connect.php";
                    $sql  = "SELECT * FROM binh_luan WHERE ma_san_pham = '$id'";
                    $reuslt = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($reuslt)){
                        $sqlUser  = "SELECT * FROM user WHERE ma_khach_hang = '$row[ma_khach_hang]'";
                        $reusltUser = mysqli_query($conn, $sqlUser);
                        $rowUser = mysqli_fetch_assoc($reusltUser);
                        echo '
                        <div class="bg-white p-2">
                            <div class="d-flex flex-row user-info"><i class="fa-solid fa-user comment__user-icon"></i>
                                <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name">'.$rowUser['ho_va_ten'].'</span><span class="date text-black-50">'.$row['thoi_gian'].'</span></div>
                            </div>
                            <div class="mt-2">
                                <p class="comment-text">'.$row['noi_dung'].'</p>
                            </div>
                        </div>
                        ';
                    }
                }       

             ?>
            <!-- coment -->
            <div class="container mt-5">
    <div class="d-flex justify-content-center row">
        <div class="col">
            <div class="d-flex flex-column comment-section">
                <?php showComent($_GET['id-product'])?>
                <div class="bg-white">
                    <div class="d-flex flex-row fs-12">
                        <div class="like p-2 cursor"><i class="fa fa-thumbs-o-up"></i><span class="ml-1">Like</span></div>
                        <div class="like p-2 cursor"><i class="fa fa-commenting-o"></i><span class="ml-1">Comment</span></div>
                        <div class="like p-2 cursor"><i class="fa fa-share"></i><span class="ml-1">Share</span></div>
                    </div>
                </div>
                <div class="bg-light p-2">
                    <form action="backend/user/comment.php?id-product=<?php getID($_GET['id-product'])?>" method="post">
                        <div class="d-flex flex-row align-items-start"><i class="fa-solid fa-user comment__user-icon"></i>
                            <input id="comment-product" name="comment-product" class="form-control ml-1 shadow-none">
                        </div>
                        <div class="mt-2 text-right">
                            <input class="btn btn-secondary btn-sm shadow-none comment__btn" type="submit" value="Bình luận">
                            <button class="btn btn-outline-secondary  btn-sm ml-1 shadow-none comment__btn" type="button">Bỏ qua</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ==== -->
            
        </div>
    </div>
<!-- <div class="detail__product-box">
    <div class="detail__product-heading">Thêm topping</div>
    <div class="detail__product-more-item">
        <input type="checkbox" id="product-more-topping-1" name="product-more-topping-1" value="Trân châu đường đen"> 
        <label for="product-more-topping-1">Trân châu đường đen</label>
    </div>
</div> -->
    <?php require "partials/footer.php" ?>
    <script src="assets/js/script.js"></script>
</body>
</html>