<?php
if(isset($_COOKIE['user-name'])){
    setcookie('user-name','',time() - (86400*30), "/");
    header("location: /coDE%20-%20DỰ%20ÁN%201/");
}
?>