<?php

    session_start();
    
    // lấy thông tin điều hướng từ form login
    $navigation = $_GET["navigation"];
    
    // lấy link trang trước
    $url = $_SERVER["HTTP_REFERER"];

    echo $url.$navigation;

    include "db-connect.php";
    $phone = $_POST ['phoneNb_login'];
    $pass = $_POST ['password_login'];
   
    $sql = "SELECT * FROM users WHERE 1";
    $values = mysqli_query($connect, $sql);

    $flag = 0;

    // đăng nhập user thường không cần kiểm tra quyền truy cấp
    // admin và user thường đều có thể trải nghiệm
    foreach($values as $v) {
        if ($phone == $v['phone'] && $pass == $v['password']) {
            $_SESSION['login']['name'] = $v['name'];
            $_SESSION['login']['phone'] = $v['phone'];
            $_SESSION['login']['id'] = $v['id'];
            $_SESSION['login']['access_rights'] = $v['access_rights'];
            $flag++;
        }

    }

    // đăng nhập thành công chuyển đến trang đã chọn
    if ($flag > 0) {
        // vì sau khi đăng ký xong thì -> trang đăng nhập => nên khi đăng nhập xong thì chuyển về trang chủ
        if ($navigation == "login") {
            header("location:/index.php?controller=pages&action=home");
        }
        // điều hướng đến trang vừa chọn
        else {
            header("location:$url");
        }
    }

    // đăng nhập không thành công
    else {
        echo "<script>alert('Đăng nhập không thành công....! Vui lòng kiểm tra lại số điện thoại và mật khẩu'); history.go(-1);</script>";
    }

    mysqli_close($connect);
?>