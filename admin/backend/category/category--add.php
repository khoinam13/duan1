<!-- thêm dữ liệu -->
<?php
require "../connect.php";
if(isset($_POST['category-name'])){
    $category = $_POST['category-name'];
    $insert = "INSERT INTO loai_hang (ten_loai_hang) VALUES ('$category')";
    $select = "SELECT * FROM loai_hang WHERE ten_loai_hang = '$category'";
    $result = mysqli_query($conn, $select);
    // $rs = mysqli_query($conn,$select); // thực hiện truy vấn
    if (mysqli_num_rows($result) > 0) { //trả số hàng từ try vấn
        header("Location: /CODE%20-%20DỰ%20ÁN%201/admin/category--add.php?messenger-err= Loại hàng này đã tồn tại, vui lòng nhập lại&value=$category");
    } else if ($category == "" || $category == null || strlen($category) <= 3 || strlen($category) > 50 || (is_numeric($category))) {
        header("Location: /CODE%20-%20DỰ%20ÁN%201/admin/category--add.php?messenger-err=Kí tự nhập vào không đúng, vui lòng nhập lại&value=$category");
    } else {
        $conn->query($insert);
        header("location: /CODE%20-%20DỰ%20ÁN%201/admin/category--list.php?messenger-success= Đã thêm loại hàng thành công");
    }
}
?>