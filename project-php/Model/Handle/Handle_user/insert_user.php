<?php
    // lấy link trang trước
    $url = $_SERVER["HTTP_REFERER"];

    include ("../db-connect.php");
    $phone = $_POST['phone_new_user'];
    $name = $_POST ['name_new_user'];
    $pass = $_POST ['pass_new_user'];
    $access_rights = $_POST['access_rights'];

    $sql = "SELECT * FROM users WHERE 1";
    $sql_insert = "INSERT INTO `users`(`phone`, `name`, `password`, `access_rights`) VALUES ('$phone','$name','$pass','$access_rights')";

    $values = mysqli_query($connect, $sql);

    $flag = 0;

    // kiểm tra xem số điện thoại đã tồn tại hay chưa
    foreach($values as $v) {
        if ($phone == $v['phone']) {
            $flag++;
        }
    }

    // số điện thoại chưa tồn tại -> thêm user
    if ($flag == 0) {
        mysqli_query($connect, $sql_insert);
        header("location:$url");
    }

    // thêm không thành công
    else {
        echo "<script>alert('Thêm user không thành công....! Số điện thoại này đã được sử dụng'); history.go(-1);</script>";
    }

    mysqli_close($connect);
?>