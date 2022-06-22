<?php

    session_start();

    include "db-connect.php";

    // lấy link trang trước
    $url = $_SERVER["HTTP_REFERER"];

    $name = $_POST ['phone'];
    $pass = $_POST ['password'];

    $sql = "SELECT * FROM users WHERE 1";
    $values = mysqli_query($connect, $sql);

    $flag = 0;

    /** access_rights là quyền truy cập:
     * 1 là admin full quyền
     * 0 user thường chỉ để xem nội dung trên web
      */  
    foreach($values as $v) {
        if ($name == $v['phone'] && $pass == $v['password'] && $v['access_rights'] == 1) {
            $flag++;
            $_SESSION['login']['name'] = $v['name'];
            $_SESSION['login']['phone'] = $v['phone'];
            $_SESSION['login']['access_rights'] = $v['access_rights'];
        }

    }

    // đăng nhập thành công
    if ($flag > 0) {
        header("location:$url");
    }

    // đăng nhập không thành công
    else {
        echo "<script>alert('Đăng nhập không thành công....! Vui lòng kiểm tra lại số điện thoại và mật khẩu'); history.go(-1);</script>";
    }

    mysqli_close($connect);
?>