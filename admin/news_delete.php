<?php
$connect = mysqli_connect("localhost", "root", "", "demo-duan1");

$sql_delete_loai = "DELETE FROM loai WHERE ma_loai = '$_GET[ma_loai]'";
$query_delete_loai = mysqli_query($connect, $sql_delete_loai);

header("location:dashboard.php");