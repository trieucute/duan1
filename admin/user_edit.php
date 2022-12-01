<?php
include_once "encryption.php";
$connect = mysqli_connect("localhost", "root", "", "demo-duan1");
if (isset($_POST['edit_user'])) {
    $ma_user = $_GET['ma_user'];
    $ho_ten = $_POST['ho_ten_user_update'];
    $mat_khau = $_POST['mat_khau_user_update'];  
    $mat_khau_encryption = encryptthis($mat_khau, $key);  
    $email = $_POST['email_user_update'];
    $dia_chi = $_POST['dia_chi_user_update'];
    $sdt = $_POST['sdt_user_update'];
    $vai_tro = $_POST['vai_tro_user_update'];

    $sql_user = "SELECT * FROM user WHERE ma_user = $ma_user";
    $query_user = mysqli_query($connect, $sql_user);
    $row_user = mysqli_fetch_assoc($query_user);

    $image_user_update = $_FILES['hinh_user_update'];
    $file_name_user_update = $image_user_update['name'];
    $file_name_user_update = explode('.', $file_name_user_update);
    $ext_user_update = end($file_name_user_update);
    if($ext_user_update==""){
        $new_file_user_update = $row_user['hinh'];
    } else {
        $new_file_user_update = md5(uniqid()) . '.' . $ext_user_update;
    }
    $upload_image_user_update = move_uploaded_file($image_user_update['tmp_name'], '../content/imgs/' . $new_file_user_update);

    $sql_user_update = "UPDATE user SET email = '$email', mat_khau = '$mat_khau_encryption', vai_tro = '$vai_tro', hinh = '$new_file_user_update' WHERE ma_user = '$ma_user'";
    $query_user_update = mysqli_query($connect, $sql_user_update);

    $sql_khach_hang_update = "UPDATE khachhang SET ho_ten = '$ho_ten', dia_chi = '$dia_chi', sdt = '$sdt' WHERE ma_user = '$ma_user'";
    $query_khach_hang_update = mysqli_query($connect, $sql_khach_hang_update);
    header('location: dashboard.php');
}