<?php
$connect = mysqli_connect("localhost", "root", "", "demo-duan1");
if (isset($_POST['add_category'])) {
    $ten_loai = $_POST['ten_loai'];

    $sql_insert_category = "INSERT INTO loai (ten_loai) VALUES ('$ten_loai')";
    $query_insert_category = mysqli_query($connect, $sql_insert_category);
}