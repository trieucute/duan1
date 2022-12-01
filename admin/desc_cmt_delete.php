<?php
$connect = mysqli_connect("localhost", "root", "", "demo-duan1");
$sql_delete_desc_cmt = "DELETE FROM binh_luan WHERE ma_bl = '$_GET[ma_bl]'";
$query_delete_desc_cmt = mysqli_query($connect, $sql_delete_desc_cmt);
header("location:dashboard.php?ma_hh_bl=".$_GET['ma_hh_bl']);