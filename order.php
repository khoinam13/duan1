<?php
    session_start();
    if(isset($_SESSION['cart']) && sizeof($_SESSION['cart'])>0){
        
        // $cartId = $_POST['cart-id'];
        // $cartName = $_POST['cart-name'];
        // $cartPrice = $_POST['cart-price'];
        // $cartQuantity = $_POST['cart-quantity'];
        // $cartDecs = $_POST['cart-decs'];
        // $cartTotalMoney = $_POST['cart-total-money'];
        $cartTotalOrder = $_POST['cart-total-order'];
        // user 
        $client = $_COOKIE['user-name'];
        // order
        function AddOrder($cartTotalOrder,$client){
            require "backend/connect-pdo.php";
            $sql = "INSERT INTO `order` (`tong_tien_don_hang`, `ma_khach_hang`) VALUES ('$cartTotalOrder', '$client')";
            $conn->exec($sql);
            $lastId = $conn->lastInsertId();
            $conn = null;
            return $lastId;
        }
        $IdOrder = AddOrder( $cartTotalOrder,$client);
        function AddOrderDetails($idOrders,$idProduct, $price, $quantity, $notes,$tatalOrder){
            require "backend/connect-pdo.php";
            $sql = "INSERT INTO `chi_tiet_don_hang` (`ma_don_hang`, `ma_san_pham`, `gia`, `so_luong`, `ghi_chu`, `tong_tien_sp`)
            VALUES ('$idOrders', '$idProduct', '$price', '$quantity' , '$notes', '$tatalOrder')";
            $conn->exec($sql);
            $conn = null;
        }
        for($i=0; $i < sizeof($_SESSION['cart']); $i++){
            $cartId = $_SESSION['cart'][$i][6];
            $cartPrice = $_SESSION['cart'][$i][2];
            $cartQuantity = $_SESSION['cart'][$i][4];
            $cartDecs = $_SESSION['cart'][$i][5];
            $cartTotalMoney = $_SESSION['cart'][$i][2] * $_SESSION['cart'][$i][4];
            AddOrderDetails($IdOrder,$cartId,$cartPrice,$cartQuantity,$cartDecs,$cartTotalMoney);
        }
        function showOrderDate($IdOrder){
            require "backend/connect.php";
            $sql = "SELECT * FROM `order` WHERE `ma_don_hang` = $IdOrder";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
                echo'
                <span>'.$row['thoi_gian'].'</span>
                ';
            }
        }
        function showIdOrder($IdOrder){
            require "backend/connect.php";
            $sql = "SELECT * FROM `order` WHERE `ma_don_hang` = $IdOrder";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
                echo'
                <span>'.$row['thoi_gian'].'</span>
                ';
            }
        }
        function TatalOrder($IdOrder){
            require "backend/connect.php";
            $sql = "SELECT * FROM `order` WHERE `ma_don_hang` = $IdOrder";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
                echo'
                <span>'.$row['tong_tien_don_hang'].'</span>
                ';
            }
        }
        function TatalOrderMore($IdOrder){
            require "backend/connect.php";
            $sql = "SELECT * FROM `order` WHERE `ma_don_hang` = $IdOrder";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
                $tatalOrderNew = $row['tong_tien_don_hang'] + 13000;
                echo'
                <span>'.$tatalOrderNew.'.</span>
                ';
            }
        }
        function AddressOrder($user){
            require "backend/connect.php";
            $sql = "SELECT * FROM `user` WHERE `ma_khach_hang` = '$user'";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
                echo'
                <span>'.$row['dia_chi'].'</span>
                ';
            }
        }
        function showProduct($IdOrder){
            require "backend/connect.php";
            $sql = "SELECT * FROM `chi_tiet_don_hang` WHERE `ma_don_hang` = $IdOrder";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
                $sql2 = "SELECT * FROM `san_pham` WHERE `ma_san_pham` = '$row[ma_san_pham]'";
                $result2 = $conn->query($sql2);
                $row2 = $result2->fetch_assoc();
                echo'
                <tr>
                <td width="20%">
                
                <img src="uploads/'.$row2['hinh_anh'].'" width="70">
    
            </td>
        
            <td width="60%">
                <span class="font-weight-bold"></span>
                <div class="product-qty">
                    <span class="d-block">Số lượng: '.$row['so_luong'].'</span>
                    <span>Giá: '.$row['gia'].'đ</span>
                    
                </div>
            </td>
            <td width="20%">
                <div class="text-right">
                    <span class="font-weight-bold">'.$row['tong_tien_sp'].'đ</span>
                </div>
            </td>
            </tr>
                ';
            }
        }
        unset($_SESSION['cart']);
    }
    else {
        header("location: /coDE%20-%20DỰ%20ÁN%201/cart.php");
    }
?>
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
<div class="container mt-5 mb-5">

<div class="row d-flex justify-content-center">

    <div class="col-md-8">

        <div class="card">


                <div class="text-left logo p-2 px-5">

                    <!-- <img src="https://i.imgur.com/2zDU056.png" width="10"> -->
                    

                </div>

                <div class="invoice p-5">

                    <h5>Đơn đặt hàng của bạn đã được xác nhận</h5>

                    <span class="font-weight-bold d-block mt-4">Cảm ơn quý khách</span>
                    <span>Đơn đặt hàng của bạn đã được xác nhận và sẽ được giao từ 10 - 30 phút tới!</span>

                    <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">

                        <table class="table table-borderless">
                            
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="py-2">

                                            <span class="d-block text-muted">Thời gian đặt hàng</span>
                                            <?php
                                            showOrderDate($IdOrder);
                                            ?>  
                                        </div>
                                    </td>

                                    <td>
                                        <div class="py-2">

                                            <span class="d-block text-muted">Mã đơn hàng</span>
                                        <span>
                                            <?php echo"$IdOrder";?>
                                        </span>
                                            
                                        </div>
                                    </td>

                                    <td>
                                        <div class="py-2">

                                            <span class="d-block text-muted">Thanh toán</span>
                                            <?php TatalOrder($IdOrder); echo'đ'; ?>

                                    <td>
                                        <div class="py-2">

                                            <span class="d-block text-muted">Địa chỉ giao hàng</span>
                                        <?php  AddressOrder($client)?>
                                            
                                        </div>
                                    </td>
                                </tr>
                            </tbody>

                        </table>




                        
                    </div>




                        <div class="product border-bottom table-responsive">

                            <table class="table table-borderless">

                            <tbody>
                               <?php
                               showProduct($IdOrder);
                               ?>
                            </tbody> 
                                
                            </table>
                            


                        </div>



                        <div class="row d-flex justify-content-end">

                            <div class="col-md-5">

                                <table class="table table-borderless">

                                    <tbody class="totals">

                                         <tr>
                                            <td>
                                                <div class="text-left">

                                                    <span class="text-muted">Phí vận chuyển</span>
                                                    
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-right">
                                                    <span>13000đ</span>
                                                </div>
                                            </td>
                                        </tr>

                                         <tr>
                                            <td>
                                                <div class="text-left">

                                                    <span class="text-muted">Giảm giá</span>
                                                    
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-right">
                                                    <span class="text-success">0đ</span>
                                                </div>
                                            </td>
                                        </tr>


                                         <tr class="border-top border-bottom">
                                            <td>
                                                <div class="text-left">

                                                    <span class="font-weight-bold">Tổng tiền</span>
                                                    
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-right">
                                                    <?php TatalOrderMore($IdOrder) ?>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                    
                                </table>
                                
                            </div>
                            


                        </div>

                        <p class="font-weight-bold mb-0">Cảm ơn đã đặt hàng của chúng tôi</p>
                        <span>Trà Sữa Naitra</span>



                    

                </div>


                <div class="d-flex justify-content-between footer p-3">

                    <span>Trợ giúp? <a href="naitra.com">naitra.com</a></span>
                     <!-- <span>12 June, 2020</span> -->
                     <h6 class="mb-0"><a href="product.php" class="text-body"><i
                class="fas fa-long-arrow-alt-left me-2"></i>Tiếp tục mua sắm</a></h6>
                    
                </div>



    
</div>
        
    </div>
    
</div>
        

</div>
        
<?php
require "partials/footer.php"
?>
</body>
</html>