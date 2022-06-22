<?php
    // lấy link trang trước
    $url = $_SERVER["HTTP_REFERER"];

    include("../db-connect.php");

    // lấy id cần xóa
    $id = $_GET['id'];
    
    $sql = "DELETE FROM `video` WHERE `id` = $id";

    mysqli_query($connect, $sql);

    header("location:$url");

    mysqli_close($connect);
?>