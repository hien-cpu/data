<?php 
    include("../db-connect.php");
    
    // lấy id của user cần sửa
    $id = $_GET['id'];

    // lấy ra link trang cần điều hướng tới
    $navigation = $_GET["navigation"];
    $action = $_GET["action"];
    
    $url = $navigation."&action=".$action;
    
    $name = $_POST["name_user_update"];
    $pass = $_POST["pass_user_update"];
    $access_rights = $_POST["access_rights"];

    $sql = "UPDATE `users` SET `name`='$name',`password`='$pass',`access_rights`='$access_rights' WHERE `id` = $id";
    mysqli_query($connect, $sql);

    header("location:$url");

    mysqli_close($connect);
?>