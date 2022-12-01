<?php
$connect = mysqli_connect("localhost", "root", "", "demo-duan1");

$sql_delete_khach_hang = "DELETE FROM khachhang WHERE ma_user = {$_GET['ma_user']};";
$query_delete_khach_hang = mysqli_query($connect, $sql_delete_khach_hang);

$sql_delete_user = "DELETE FROM user WHERE ma_user = {$_GET['ma_user']};";
$query_delete_user = mysqli_query($connect, $sql_delete_user);
// echo $sql_delete_user;
header("location:dashboard.php");