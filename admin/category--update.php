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
    <div class="container">
        <h2 class="heading">Quản lí loại hàng</h2>
        <?php
        require "backend/connect.php";
        require "backend/function.php";
        if($_GET['id']){
            $id = $_GET['id'];
            $sql = "SELECT * FROM loai_hang Where ma_loai_hang =$id";
            $result = mysqli_query($conn, $sql);
            $row = $result->fetch_assoc();
            echo '
            <form action="backend/category/category--uptade.php?id=' . $id . '" method="post">
                <h3 class="heading">Tên Loại Hàng Mới</h3>
                <input type="text" name="category--update" id="category--update" class="input boder-input" placeholder="' . $row["ten_loai_hang"] . '">
                <span id="messenger" class="messenger"></span>
                <button class="btn" type"submit">Gửi</button>
            </form>
            ';
        }
        messenger("messenger");
        backValue("category--update","categoryUpdate");
        ?>
    </div>
</body>

</html>