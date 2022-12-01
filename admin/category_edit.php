<?php
$connect = mysqli_connect("localhost", "root", "", "demo-duan1");
if (isset($_POST['edit_category'])) {
    $ma_loai = $_GET['ma_loai'];
    $ten_loai = $_POST['ten_loai_update'];

    $sql_update_loai = "UPDATE loai SET ten_loai = '$ten_loai' WHERE ma_loai = '$ma_loai'";
    $query_update_loai = mysqli_query($connect, $sql_update_loai);
    header('location: dashboard.php');
}
