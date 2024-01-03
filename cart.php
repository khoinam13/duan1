<?php
    if(isset($_COOKIE['user-name'])){
        session_start();
        //cập nhât lại số lượng
        if(isset($_GET['update'])){
            $IDproductQuantityUpdate = $_GET['update'];   
            $cartQuantity = $_POST['cart-quantity'];
            $_SESSION['cart'][$IDproductQuantityUpdate][4] = $cartQuantity;
        }
        if(!isset($_SESSION['cart']))  $_SESSION['cart']=[];
        // Xoá sản phẩm
        if(isset($_GET['delete']) && $_GET['delete'] >=0){
            array_splice($_SESSION['cart'],$_GET['delete'],1);
        }
        if(isset($_POST['product__cart']) && ($_POST['product__cart'])){
            $productId = $_POST['product-id'];
            $productImg = $_POST['product-img'];
            $productName = $_POST['product-name'];
            $productSize = $_POST['product-size'];
            if($productSize == 'M'){
                $productPrice = $_POST['product-price'];
            }
            else{
                $productPrice = $_POST['product-price-size-l'];
            }
            $productQuantity = $_POST['product-quantity'];
            $productDecs = $_POST['product-decs'];
            // kiểm tra sản phẩm tồn tại chưa ???
            $flag = true;
            for($i=0; $i < sizeof($_SESSION['cart']); $i++){
                if($_SESSION['cart'][$i][1] == $productName && $_SESSION['cart'][$i][3] == $productSize){
                    $flag = false ;
                    $productQuantityUpdate =$productQuantity+$_SESSION['cart'][$i][4];
                    $_SESSION['cart'][$i][4] = $productQuantityUpdate;
                    break;
                }
            }
            if($flag== true){
                $products = [$productImg, $productName,$productPrice,$productSize,$productQuantity,$productDecs,$productId];
                $_SESSION['cart'][]= $products;
            }
        }
        function showCart(){
            if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
                $totalOrder = 0;
                for($i=0; $i < sizeof($_SESSION['cart']); $i++){
                    $tatalMoney  =  $_SESSION['cart'][$i][2] *  $_SESSION['cart'][$i][4];
                    $totalOrder += $tatalMoney;
                    echo'
                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                        <img
                        src="uploads/'.$_SESSION['cart'][$i][0].'"
                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                    <h6 class="text-muted text-uppercase">'.$_SESSION['cart'][$i][1].'</h6>
                    <h6 class="text-black mb-20">'.$_SESSION['cart'][$i][3].'</h6>
                    <h6 class="text-black mb-0">'.$_SESSION['cart'][$i][5].'</h6>
                    </div>
                    <div class="col-md-4 col-lg-4 col-xl-4 d-flex">
                    <form name="update-cart" class="update-cart" action="cart.php?update='.$i.'" method="post">
                        <button name="reduce-cart" class="btn btn-link px-2">
                            <i class="fas fa-minus"></i>
                        </button>
                        <input min="0" name="cart-quantity" value="'.$_SESSION['cart'][$i][4].'" type="number"
                            class="form-control form-control-sm" />
                        <button name="increase-cart" class="btn btn-link px-2">
                            <i class="fas fa-plus"></i>
                        </button>
                        <button name="btn-update-cart" type="submit" class="btn btn-dark btn-block btn-lg btn-update-cart" data-mdb-ripple-color="dark">Cập nhật</button>
                    </form>
                    </div>
                    <div class="col-md-2 col-lg-1 col-xl-1 offset-lg-1">
                    <h6 class="mb-0">'.$tatalMoney.'đ</h6>
                    </div>
                    
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                    <a href="cart.php?delete='.$i.'" class="text-muted"><i class="fas fa-times"></i></a>
                    </div>
                </div>
    
                <hr class="my-4">
                ';}
            }  
        }
        function showtotalOrder(){
            if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
                $totalOrder = 0;
                for($i=0; $i < sizeof($_SESSION['cart']); $i++){
                    $tatalMoney  =  $_SESSION['cart'][$i][2] *   $_SESSION['cart'][$i][4];
                    $totalOrder += $tatalMoney;
                }
                echo'
                <div class="d-flex justify-content-between mb-5">
                    <h5 class="text-uppercase">Tổng tiền</h5>
                    <h5>'.$totalOrder.'</h5>
                </div>
                ';
            }
        }
        function showQuantityProduct(){
            if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
                echo'
                <h6 class="mb-0 text-muted">Số sản phẩm '.sizeof($_SESSION['cart']).' </h6>
                ';
            }
        }
        function sendOrder(){
            if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
                $totalOrder = 0;
                echo'<form id="order__form" action="order.php" method="post">';
                for($i=0; $i < sizeof($_SESSION['cart']); $i++){
                    $tatalMoney  =  $_SESSION['cart'][$i][2] *   $_SESSION['cart'][$i][4];
                    $totalOrder += $tatalMoney;
                    echo'
                    <input type="hidden" name="cart-total-money" value="'.$tatalMoney.'">
                    ';
                }
                
                echo'
                <input type="hidden" name="cart-total-order" value="'.$totalOrder.'">
                </form>';
            }
            // <input type="hidden" name="cart-id" value="'.$_SESSION['cart'][$i][6].'">
            // <input type="hidden" name="cart-name" value="'.$_SESSION['cart'][$i][1].'">
            // <input type="hidden" name="cart-quantity" value="'.$_SESSION['cart'][$i][4].'">
            // <input type="hidden" name="cart-price" value="'.$_SESSION['cart'][$i][2].'">
            // <input type="hidden" name="cart-decs" value="'.$_SESSION['cart'][$i][5].'">
        }
        
        
    }
    else{
        header('location:/coDE%20-%20DỰ%20ÁN%201/?not-logged-in=Vui lòng đăng nhập để tiếp tục mua sắm!!');
    }
?>
<!DOCTYPE html>
<?php sendOrder()?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require "partials/header.php" ?>;
        <section class="h-100 h-custom cart">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12">
            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
            <div class="card-body p-0">
                <div class="row g-0">
                <div class="col-lg-8">
                    <div class="p-5">
                    <div class="d-flex justify-content-between align-items-center mb-5">
                        <h2 class="heading">Giỏ hàng</h2>
                        <?php showQuantityProduct() ?>
                    </div>
                    <hr class="my-4">
                    <?php
                    showCart();
                    ?>
                    <div class="pt-5">
                        <h6 class="mb-0"><a href="product.php" class="text-body"><i
                            class="fas fa-long-arrow-alt-left me-2"></i>Tiếp tục mua sắm</a></h6>
                    </div>
                    </div>
                </div>
                <div class="col-lg-4 bg-grey">
                    <div class="p-5">
                    <h3 class="fw-bold mb-5 mt-2 pt-1">Đặt hàng</h3>
                    <hr class="my-4">
                    <!-- <div class="d-flex justify-content-between mb-4">
                        <h5 class="text-uppercase">Số sản phẩm 3</h5>
                        <h5>€ 132.00</h5>
                    </div>
                    < -->
                    <h5 class="text-uppercase mb-3">Mã giảm giá</h5>
                    <div class="mb-5">
                        <div class="form-outline">
                        <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                        <!-- <button class="button mt-3" for="form3Examplea2">Gửi mã</button> -->
                        </div>
                    </div>
                    <h5 class="text-uppercase mb-3">Ghi chú</h5>
                    <div class="mb-5">
                        <div class="form-outline">
                        <input name="cart-notes" type="text" class="form-control form-control-lg" />
                        <!-- <button class="button mt-3" for="form3Examplea2">Gửi mã</button> -->
                        </div>
                    </div>

                    <hr class="my-4">
                    <?php
                         showtotalOrder()
                    ?>
                    <button id="order__submit" type="btn" class="btn btn-dark btn-block btn-lg"data-mdb-ripple-color="dark">Thanh toán</button>
                    </div>
            <!--=================== -->
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
    <?php require "partials/footer.php" ?>;
    <script src="assets/js/script.js"></script>
</body>

</html>