<?php
$connect = mysqli_connect("localhost", "root", "", "demo-duan1");
if (isset($_POST['edit_product'])) {
    $ma_hh = $_GET['ma_hh'];
    $sql_edit_hh = "SELECT * FROM hang_hoa WHERE ma_hh = '$ma_hh'";
    $query_edit_hh = mysqli_query($connect, $sql_edit_hh);
    $row_edit_hh = mysqli_fetch_assoc($query_edit_hh);

    $ma_loai = $_POST['ma_loai_update'];
    $ten_hh = $_POST['ten_hh_update'];
    $don_gia = $_POST['don_gia_update'];
    $giam_gia = $_POST['giam_gia_update'];
    $gioi_tinh = $_POST['gioi_tinh_update'];
    $dac_biet = $_POST['dac_biet_update'];
    $size_s = $_POST['size_s_update'];
    $size_m = $_POST['size_m_update'];
    $size_l = $_POST['size_l_update'];
    $size_xl = $_POST['size_xl_update'];
    $size_xxl = $_POST['size_xxl_update'];

    if (empty($_POST['mo_ta_update'])){
        $mo_ta = $row_edit_hh['mo_ta'];
    } else {
        $mo_ta = $_POST['mo_ta_update'];
    }

    if (!file_exists("../content/imgs/")) {
        mkdir("../content/imgs/");
    }

    // $ma_hh = $_GET['ma_hh'];
    // $sql_edit_hh = "SELECT * FROM hang_hoa WHERE ma_hh = '$ma_hh'";
    // $query_edit_hh = mysqli_query($connect, $sql_edit_hh);
    // $row_edit_hh = mysqli_fetch_assoc($query_edit_hh);
    $sql_edit_hinh_avt = "SELECT * FROM hinh WHERE ma_hh = '$ma_hh'";
    $query_edit_hinh_avt = mysqli_query($connect, $sql_edit_hinh_avt);
    $row_edit_hinh_avt = mysqli_fetch_assoc($query_edit_hinh_avt);
    $sql_edit_hinh_desc = "SELECT * FROM hinh WHERE ma_hh = '$ma_hh'";
    $query_edit_hinh_desc = mysqli_query($connect, $sql_edit_hinh_desc);
    $row_edit_hinh_desc = mysqli_fetch_assoc($query_edit_hinh_desc);

    $image_1 = $_FILES['hinh1_update'];
    $file_name_1 = $image_1['name'];
    $file_name_1 = explode('.', $file_name_1);
    $ext_1 = end($file_name_1);
    if ($ext_1 == "") {
        $new_file_1 = $row_edit_hinh_avt['hinh'];
    } else {
        $new_file_1 = md5(uniqid()) . '.' . $ext_1;
    }
    $upload_image_1 = move_uploaded_file($image_1['tmp_name'], '../content/imgs/' . $new_file_1);

    $image_2 = $_FILES['hinh2_update'];
    $file_name_2 = $image_2['name'];
    $file_name_2 = explode('.', $file_name_2);
    $ext_2 = end($file_name_2);
    if ($ext_2 == "") {
        $new_file_2 = $row_edit_hinh_desc['hinh'];
    } else {
        $new_file_2 = md5(uniqid()) . '.' . $ext_2;
    }
    $upload_image_2 = move_uploaded_file($image_2['tmp_name'], '../content/imgs/' . $new_file_2);


    $sql_update = "UPDATE hang_hoa SET ten_hh = '$ten_hh', don_gia = '$don_gia', giam_gia = '$giam_gia', ma_loai = '$ma_loai', dac_biet = '$dac_biet', mo_ta = '$mo_ta', gioi_tinh = '$gioi_tinh', size_s = '$size_s', size_m = '$size_m', size_l = '$size_l', size_xl = '$size_xl', size_xxl = '$size_xxl' WHERE ma_hh = '$ma_hh'";
    $query_update = mysqli_query($connect, $sql_update);

    $sql_update_imgs = "UPDATE hinh SET hinh = '$new_file_1', vai_tro_hinh = 'Đại diện' WHERE ma_hh = '$ma_hh' AND vai_tro_hinh LIKE '%Đại diện%'";
    $query_update_imgs = mysqli_query($connect, $sql_update_imgs);
    $sql_update_imgs_mo_ta = "UPDATE hinh SET hinh = '$new_file_2', vai_tro_hinh = 'mô tả' WHERE ma_hh = '$ma_hh' AND vai_tro_hinh like N'%mô tả%'";
    $query_update_imgs_mo_ta = mysqli_query($connect, $sql_update_imgs_mo_ta);
    header('location: dashboard.php');
    // header('location: dashboard.php');
}
