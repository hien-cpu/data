<?php 
    include("../db-connect.php");
    
    // lấy link trang trước
    $id = $_GET['id'];

    // lấy ra link trang cần điều hướng tới
    $navigation = $_GET["navigation"];
    $action = $_GET["action"];
    
    $url = $navigation."&action=".$action;

    $name = $_POST["name_video"];
    $src = $_POST["link_video"];

    $sql = "UPDATE `video` SET `name`='$name',`src`='$src' WHERE `id` = $id";
    mysqli_query($connect, $sql);

    header("location:$url");

    mysqli_close($connect);
?>