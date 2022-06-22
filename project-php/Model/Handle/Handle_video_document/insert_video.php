<?php 
    include("../db-connect.php");

    // lấy link trang trước
    $url = $_SERVER["HTTP_REFERER"];

    $name_video = $_POST['name_video'];
    $src_video = $_POST['link_video'];

    $sql= "INSERT INTO `video`(`name`, `src`) VALUES ('$name_video','$src_video')";
    $insert = mysqli_query($connect, $sql);

    header("location:$url");

    mysqli_close($connect);
?>