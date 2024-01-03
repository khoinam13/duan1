<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRÀ SỮA NAICHA</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script type="text/javascript" src="assets/js/script.js"></script>
</head>
<body>
    <header>
        <div class="header__logo">
            <a href="index.php"><img src="assets/img/logo.png" alt=""></a>
        </div>
        
        <ul class="header__nav-list">
                <li class="header__nav-item"><a href="index.php" class="header__nav-link">Trang chủ</a></li>
                <li class="header__nav-item"><a href="product.php" class="header__nav-link">Sản phẩm</a></li>
                <li class="header__nav-item"><a href="contact.php" class="header__nav-link">Liên hệ</a></li>
                <li class="header__nav-item">
                    <a href="https://www.facebook.com/nobi.nam.908" class="header__nav-link header__nav-link--social"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://www.instagram.com/khoinam13/" class="header__nav-link header__nav-link--social"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://twitter.com/" class="header__nav-link header__nav-link--social"><i class="fa-brands fa-twitter"></i></a>
                </li>
        </ul>
        <div class="header__seach">
            <form id="product__seach" action="product.php?seach=seach-product" method="get">
                <input type="search" name="seach-product">
                <button id="product__seach-submit" href="" class="header__seach-btn-icon"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div class="header__cart">
            <a href="cart.php" class=""><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
        <ul class="header__nav-list--user">
            <li class="header__nav-item js-header__nav-item--register"><a href="#" class="header__nav-link">Đăng kí</a></li>
            <li class="header__nav-item js-header__nav-item--login"><a id="js-login-button" href="#" class="header__nav-link">Đăng nhập</a></li>
            <!-- đã đăng nhập -->
            <li class="header__nav-item header__nav-item--logged js-header__nav-item--user"><a href="#" class="header__nav-link"><i class="fa-solid fa-user"></i></a></li>
            <li class="header__nav-item header__nav-item--logged js-header__nav-item--log-out"><a href="backend/user/logout.php" class="header__nav-link">Đăng xuất</a></li>
        </ul>
    </header>
    <!-- login/ register -->
        <div class="module--login">
            <div class="module__wrap js-module__wrap--login">
                <div class="module__header">
                    <ul class="module__header--transfer">
                        <li class="module__header--item"><span class="module__header--link">Đăng nhập</span></li>
                        <li class="module__header--item js-open--register active"><a class="module__header--link" href="#">Tạo tài khoản</a></li>
                    </ul>
                </div>
                <form action="backend/user/login.php" id="login" class="module__form " method="post">
                    <div class="module__form-wrap-input">
                        <input type="text" id="login-name" name="login-name" class="module__form-input" placeholder="Tên Đăng Nhập Hoặc SDT">
                    </div>
                    <?php
                    require "backend/connect.php";
                    $sql = "SELECT * FROM user";
                    $result = mysqli_query($conn,$sql);
                    while($row = $result->fetch_assoc()){
                        echo '
                        <input type="text" name= login-name-exist class="module__form-input" value= '.$row['ma_khach_hang'].' hidden>
                        <input type="text" name= login-sdt-exist class="module__form-input" value= '.$row['sdt'].' hidden>
                        <input type="text" name= login-password-exist class="module__form-input" value= '.$row['mat_khau'].' hidden>
                        ';
                    }
                    ?>
                    <div class="module__form-wrap-input">
                        <input type="text" id="login-password" name="login-password" class="module__form-input" placeholder="Mật Khẩu">
                        <span class="module__form-more">Hide</span>
                    </div>
                    <input id="login-submit" class="module__form-submit" type="button" value="Đăng nhập">
                </form>
                <div class="module__close js-module__close--login"><i class="fa-solid fa-xmark"></i></div>
                <a href="#" class="module__help">Quên mật khẩu?</a>  
            </div>
        </div>
         <!-- register -->
        <div class="module--register">
            <div class="module__wrap js-module__wrap--register">
                <div class="module__header">
                    <ul class="module__header--transfer">
                        <li class="module__header--item active"><span class="module__header--link ">Đăng Kí</span></li>
                        <li class="module__header--item js-open--login"><a class="module__header--link js-header__nav-item--login" href="#">Đăng nhập</a></li>
                    </ul>
                </div>
                <form action="backend/user/register.php" id="register" class="module__form" method="post">
                    <div class="module__form-wrap-input">
                        <input type="text" class="module__form-input register-name" id = register-name name="register-name" placeholder="Tên Đăng Nhập">
                    </div>
                    <div class="module__form-wrap-input">
                        <input type="text" class="module__form-input register-full-name" id = register-full-name name="register-full-name" placeholder="Họ Và Tên">
                    </div>
                    <div class="module__form-wrap-input">
                        <input type="email" class="module__form-input" id = register-email name="register-email" placeholder="Email">
                    </div>
                    <div class="module__form-wrap-input">
                        <span class="module__form-more module__form-more--sdt">+84</span>
                        <input type="text" class="module__form-input" id = register-sdt name="register-sdt" placeholder="SDT" parent= "^[1-9]*$"/>
                    </div>
                    <div class="module__form-wrap-input">
                        <input type="password" class="module__form-input" id = register-password name="register-password" placeholder="Mật Khẩu">
                        <span class="module__form-more">Hide</span>
                    </div>
                    <div class="module__form-wrap-input">
                        <input  type="password" class="module__form-input" id = register-back-password name="register-back-password" placeholder="Nhập Lại Mật Khẩu">
                        <span class="module__form-more">Hide</span>
                    </div>
                    <div class="module__form-wrap-input">
                        <input type="text" class="module__form-input" id = register-address name="register-address" placeholder="Địa chỉ" >
                    </div>
                    <input type="date" class="module__form-input" id = register-date name="register-date" hidden>
                    <?php 
                    require "backend/connect.php";
                    $sql = "SELECT * FROM user";
                    $result = mysqli_query($conn,$sql);
                    while($row = $result->fetch_assoc()){
                        echo'
                        <input type="text" class="module__form-input" name="register-name-exist" value = "'.$row['ma_khach_hang'].'" hidden>
                        <input type="text" class="module__form-input" name="register-sdt-exist" value = "'.$row['sdt'].'" hidden>
                        <input type="text" class="module__form-input" name="register-email-exist" value = "'.$row['email'].'" hidden>
                        ';
                    }
                    ?>
                    <input id="register-submit"  class="module__form-submit" type="button"  value="Đăng kí">
                </form>
                <div class="module__close js-module__close--register"><i class="fa-solid fa-xmark"></i></div>
            </div>
        </div>
        <!-- XỬ LÍ ẨN HIỆN LOGIN  -->
        <?php
        if(isset($_COOKIE['user-name'])){
            echo'
            <script>
            var login = document.querySelector(".js-header__nav-item--login");
            var register = document.querySelector(".js-header__nav-item--register");
            login.style.display = "none";
            register.style.display = "none";
            // logged
            var user = document.querySelector(".js-header__nav-item--user");
            var logOut = document.querySelector(".js-header__nav-item--log-out");
            user.style.display = "inline-block";
            logOut.style.display = "inline-block";
            </script>   
            ';
        }
        ?>  
</body>
</html> 
