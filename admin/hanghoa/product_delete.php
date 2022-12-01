<?php
$connect = mysqli_connect("localhost", "root", "", "demo-duan1");

$sql_delete_hinh = "DELETE FROM hinh WHERE ma_hh = {$_GET['ma_hh']}";
$query_delete_hinh = mysqli_query($connect, $sql_delete_hinh);

$sql_delete_hang_hoa = "DELETE FROM hang_hoa WHERE ma_hh = '$_GET[ma_hh]'";
$query_delete_hang_hoa = mysqli_query($connect, $sql_delete_hang_hoa);

// header("location:dashboard.php");