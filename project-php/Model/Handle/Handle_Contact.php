<?php 

    session_start();
    // set thời gian
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    // lấy link trang trước
    $url = $_SERVER["HTTP_REFERER"];

    include "db-connect.php";

    $name = $_SESSION['login']['name'];
    $phone = $_SESSION['login']['phone'];
    $iduser = $_SESSION['login']['id'];
    $email =$_POST['email'];
    $content =$_POST['content'];

    echo $name.$phone;
    // lấy thông tin thời gian
    $time = date("H:i d-m-y");

    $sql = "INSERT INTO `contact`(`name`, `phone`, `email`, `content`, `iduser`, `time`) VALUES ('$name','$phone','$email','$content','$iduser','$time')";

    $insert = mysqli_query($connect, $sql);

    header("location:$url");

    mysqli_close($connect);
?>