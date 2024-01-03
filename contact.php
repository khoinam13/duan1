<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require "partials/header.php" ?>
    <!--Section: Contact v.2-->
    <div class="wrap">
    <section class="mb-4 contact">

<!--Section heading-->
<!-- <h2 class="h1-responsive font-weight-bold text-center my-4">Gửi phản hồi cho chúng tôi</h2> -->
    <h2 class="heading">Gửi phản hồi cho chúng tôi</h2>
<!--Section description-->
<p class="text-center w-responsive mx-auto mb-5">Bạn có câu hỏi nào không? Xin đừng ngần ngại liên hệ trực tiếp với chúng tôi. Nhóm của chúng tôi sẽ quay lại với bạn trong vòng vài giờ để giúp bạn.</p>

<div class="row">

    <!--Grid column-->
    <div class="col-md-9 mb-md-0 mb-5">
        <form id="contact-form" name="contact-form" action="#" method="POST">

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="text" id="name" name="name" class="form-control">
                        <label for="name" class="">Tên của bạn</label>
                    </div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="text" id="email" name="email" class="form-control">
                        <label for="email" class="">Email của bạn</label>
                    </div>
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

            <!--Grid row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="md-form mb-0">
                        <input type="number" id="subject" name="subject" class="form-control">
                        <label for="subject" class="">Số điện thoại</label>
                    </div>
                </div>
            </div>
            <!--Grid row-->

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-12">

                    <div class="md-form">
                        <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                        <label for="message">Phản hồi của bạn</label>
                    </div>

                </div>
            </div>
            <!--Grid row-->

        </form>

        <div class="text-center text-md-left">
            <a class="btn btn-light" onclick="document.getElementById('contact-form').submit();">Gửi</a>
        </div>
        <div class="status"></div>
    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-md-3 text-center">
        <ul class="list-unstyled mb-0">
            <li><i class="fas fa-map-marker-alt fa-2x"></i>
                <p>177 Phạm Như Xương - Hoà Khánh Nam - Liên Chiểu - Đà Nẵng</p>
            </li>

            <li><i class="fas fa-phone mt-4 fa-2x"></i>
                <p>+84369832486</p>
            </li>

            <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                <p>naitra.com</p>
            </li>
        </ul>
    </div>
    <!--Grid column-->

</div>

</section>
    </div>
    
<!--Section: Contact v.2-->
    <?php require "partials/footer.php" ?>
    <script src="assets/js/script.js"></script>
</body>
</html>