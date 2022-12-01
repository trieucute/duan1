<?php
include_once "encryption.php";
$connect = mysqli_connect("localhost", "root", "", "demo-duan1");
if (isset($_POST['add_user'])) {
    $ho_ten = $_POST['ho_ten_user'];
    $mat_khau = $_POST['mat_khau_user'];  
    $mat_khau_encryption = encryptthis($mat_khau, $key);  
    $email = $_POST['email_user'];
    $dia_chi = $_POST['dia_chi_user'];
    $sdt = $_POST['sdt_user'];
    $vai_tro = $_POST['vai_tro_user'];

    $image_user = $_FILES['hinh_user'];
    $file_name_user = $image_user['name'];
    $file_name_user = explode('.', $file_name_user);
    $ext_user = end($file_name_user);
    if($ext_user==""){
        $new_file_user = "avt.png";
    } else {
        $new_file_user = md5(uniqid()) . '.' . $ext_user;
    }
    $upload_image_user = move_uploaded_file($image_user['tmp_name'], '../content/imgs/' . $new_file_user);

    $sql_insert_user = "INSERT INTO user (email, mat_khau, vai_tro, hinh) VALUES ('$email', '$mat_khau_encryption', '$vai_tro', '$new_file_user')";
    $query_insert_user = mysqli_query($connect, $sql_insert_user);

    $sql_select_user = "SELECT * FROM user ORDER BY ma_user DESC LIMIT 1";
    $query_select_user = mysqli_query($connect, $sql_select_user);
    $row_user = mysqli_fetch_assoc($query_select_user);
    $ma_user = $row_user['ma_user'];

    $sql_insert_khach_hang = "INSERT INTO khachhang (ma_user, ho_ten, dia_chi, sdt) VALUES ('$ma_user', '$ho_ten', '$dia_chi', '$sdt')";
    $query_insert_khach_hang = mysqli_query($connect, $sql_insert_khach_hang);
}