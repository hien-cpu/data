<?php
    // lấy link trang trước
    $url = $_SERVER["HTTP_REFERER"];

    include("../db-connect.php");

    // lấy id cần xóa
    $id = $_GET['id'];
    
    $accessRights = $_GET['accessRights'];

    // nếu là user thường thì xóa
    if ($accessRights == 0) {
        $sql = "DELETE FROM `users` WHERE `id` = $id";
        mysqli_query($connect, $sql);
        header("location:$url");
    }

    // nếu là user admin thì không xóa được -> quay lại
    else {
        echo "<script>alert('Không thể xóa User Admin....!'); history.go(-1);</script>";
    }

    mysqli_close($connect);
?>