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
            <div class="home">
                <div class="home__slide">
                    <div class="home__slide-main">
                        <img class="home__slide-feature" src="assets/img//slide1.jpg" alt="">
                        <div class="home__slide-prev">
                            <i class="fa-solid fa-angle-left"></i>
                        </div>
                        <div class="home__slide-next">
                            <i class="fa-solid fa-angle-right"></i>
                        </div>
                    </div>
                    <div class="home__slide-list-img">
                        <div><img src="assets/img/slide1.jpg" alt=""></div>
                        <div><img src="assets/img/slide2.jpg" alt=""></div>
                        <div><img src="assets/img/slide3.jpg" alt=""></div>

                        <div><img src="assets/img/slide1.jpg" alt=""></div>
                        <div><img src="assets/img/slide2.jpg" alt=""></div>
                        <div><img src="assets/img/slide3.jpg" alt=""></div>

                        <div><img src="assets/img/slide1.jpg" alt=""></div>
                        <div><img src="assets/img/slide2.jpg" alt=""></div>
                        <div><img src="assets/img/slide3.jpg" alt=""></div>
                    </div>
                </div>
                <div class="home__product">
                    <div class="heading">Sản phẩm nổi bậc</div>
                    <div class="row">
                        <?php require "backend/connect.php";
                        $sql = "SELECT * FROM san_pham";
                        $result = mysqli_query($conn, $sql);
                        while ($row = $result->fetch_assoc()) {
                            echo '
                                 <div class="col-3">
                                    <a href="detail-product.php?id-product=' . $row['ma_san_pham'] . '">
                                    <div class="product__item">
                                        <img class="product__img" src="uploads/' . $row['hinh_anh'] . '">
                                        <div class="product__item-decs">
                                            <h3 class="product__name">' . $row['ten_san_pham'] . '</h3>
                                            <span class="product__price">' . $row['gia'] . 'đ</span>
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
    </div>
    </div>
    <?php
    require "partials/footer.php"
    ?>
    <!-- ============= xử lí php back page ================= -->
    <!-- xử lí nhập sai mật khẩu -->
    <?php
    if (isset($_GET['messenger'])) {
        $messenger = $_GET['messenger'];
        $loginName = $_GET['login-name'];
        $loginPassword = $_GET['login-password'];
        echo "
            <script>
                setTimeout(function(){
                    var loginBtn = document.querySelector('.module--login');
                    loginBtn.classList.add('open');
                    document.getElementById('login-name').value = '$loginName';
                    document.getElementById('login-password').value = '$loginPassword';
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
    
    // xử lí đăng kí thành công
    if (isset($_GET['register-status'])) {
        $registerStatus = $_GET['register-status'];
        echo "
                <script>
                    setTimeout(function(){
                        alert(' $registerStatus');
                    },100)
                    setTimeout(function(){
                        window.location='/coDE%20-%20DỰ%20ÁN%201/';
                    },300)
                </script>
            ";
    }
    // xử lí đăng nhập thành công
    if (isset($_GET['login-status'])) {
        $loginStatus = $_GET['login-status'];
        echo "
                <script>
                    setTimeout(function(){
                        alert(' $loginStatus');
                    },100)
                    setTimeout(function(){
                        window.location='/coDE%20-%20DỰ%20ÁN%201/';
                    },300)
                </script>
            ";
    }
    ?>
    <script src="assets/js/script.js"></script>
</body>

</html>