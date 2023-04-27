<?php
require "../../global.php";
require "../../dao/loai.php";
require "../../dao/hanghoa.php";
// include_once 'product_add.php';

// include_once 'product_edit.php';
include_once '../trangchinh/currency_format.php';
$connect = mysqli_connect("localhost", "root", "", "demo-duan1");
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 7;
$start = ($current_page - 1) * $limit;

// extract($_REQUEST);






check_login();

//phân giải các field name từ form trong form thành cách biến
extract($_REQUEST);

if (exist_param("hanghoa_add")) {
    // $hinh= save_file("hinh","$img_path");
    $total_records = (int)hh_count_all();

    // if (!empty($ten_hh) && !empty($don_gia)) {

        try {
            if (isset($_POST['themmoi'])) {


                $ma_loai = $_POST['ma_loai'];
                $ten_hh = $_POST['ten_hh'];
                $don_gia = $_POST['don_gia'];
                $giam_gia = $_POST['giam_gia'];
                $gioi_tinh = $_POST['gioi_tinh'];
                $dac_biet = $_POST['dac_biet'];
                $size_s = $_POST['size_s'];
                $size_m = $_POST['size_m'];
                $size_l = $_POST['size_l'];
                $size_xl = $_POST['size_xl'];
                $size_xxl = $_POST['size_xxl'];
                $mo_ta = $_POST['mo_ta'];


                if (!file_exists("../../content/imgs/")) {
                    mkdir("../../content/imgs/");
                }



                $image_1 = $_FILES['hinh1'];
                $file_name_1 = $image_1['name'];
                $file_name_1 = explode('.', $file_name_1);
                $ext_1 = end($file_name_1);

                if ($ext_1 == "") {

                    $new_file_1 = "";
                } else {
                    $new_file_1 = md5(uniqid()) . '.' . $ext_1;
                }
                $upload_image_1 = move_uploaded_file($image_1['tmp_name'], '../../content/imgs/' . $new_file_1);
              


                $image_2 = $_FILES['hinh2'];
                $file_name_2 = $image_2['name'];
                $file_name_2 = explode('.', $file_name_2);
                $ext_2 = end($file_name_2);

                if ($ext_2 == "") {
                    $new_file_2 = "";

                } else {
                    $new_file_2 = md5(uniqid()) . '.' . $ext_2;
                }
                $upload_image_2 = move_uploaded_file($image_2['tmp_name'], '../../content/imgs/' . $new_file_2);


                if (empty($_POST['ten_hh'])){
                    $error['ten_hh'] = 'Bạn chưa nhập tên hàng hoá';
                }
                if (empty($_POST['don_gia'])){
                    $error['don_gia'] = 'Bạn chưa nhập giá';
                }else if($_POST['don_gia']<0){
                    $error['don_gia'] = 'Bạn phải nhập giá là số dương';
                    
                }
                if (empty($_POST['mo_ta'])){
                    $error['mo_ta'] = 'Bạn chưa nhập mô tả cho hàng hoá';
                }
                if (empty($_POST['size_s'])){
                    $error['size_s'] = 'Bạn chưa nhập số lượng size S';
                }else if($_POST['size_s']<0){
                    $error['size_s'] = 'Bạn phải nhập số là số dương';
                    
                }

                if (empty($_POST['size_m'])){
                    $error['size_m'] = 'Bạn chưa nhập số lượng size M';
                }else if($_POST['size_m']<0){
                    $error['size_m'] = 'Bạn phải nhập số là số dương';
                    
                }
                if (empty($_POST['size_l'])){
                    $error['size_l'] = 'Bạn chưa nhập số lượng size L';
                }else if($_POST['size_l']<0){
                    $error['size_l'] = 'Bạn phải nhập số là số dương';
                    
                }
                if (empty($_POST['size_xl'])){
                    $error['size_xl'] = 'Bạn chưa nhập số lượng size XL';
                }else if($_POST['size_xl']<0){
                    $error['size_xl'] = 'Bạn phải nhập số là số dương';
                    
                }
                if (empty($_POST['size_xxl'])){
                    $error['size_xxl'] = 'Bạn chưa nhập số lượng size XXL';
                }else if($_POST['size_xxl']<0){
                    $error['size_xxl'] = 'Bạn phải nhập số là số dương';
                    
                }
              
                if($ten_hh !="" && $don_gia != "" && $mo_ta !="" && $size_s !="" && $size_m !="" && $size_l !="" && $size_xl !="" && $size_xxl !="" ){

                
                $sql_insert = "INSERT INTO hang_hoa (ten_hh, don_gia, giam_gia, ma_loai, dac_biet, mo_ta, gioi_tinh, size_s, size_m, size_l, size_xl, size_xxl) 
                VALUES ('$ten_hh', '$don_gia', '$giam_gia', '$ma_loai', '$dac_biet', '$mo_ta', '$gioi_tinh', '$size_s', '$size_m', '$size_l', '$size_xl', '$size_xxl')";
                $query = mysqli_query($connect, $sql_insert);



                $sql_select = "SELECT * FROM hang_hoa ORDER BY ma_hh DESC LIMIT 1";
                $query_select = mysqli_query($connect, $sql_select);
                $row = mysqli_fetch_assoc($query_select);
                $ma_hh = $row['ma_hh'];


                $sql_insert_imgs = "INSERT INTO hinh (hinh, ma_hh, vai_tro_hinh) values ('$new_file_1', '$ma_hh', 'Đại diện'), ('$new_file_2', '$ma_hh', 'Mô tả')";
                $query_insert_imgs = mysqli_query($connect, $sql_insert_imgs);
                // header('location: index.php?page_layout=danhsach');
                $thongbao = "Thêm mới thành công";
                //         }else{
                //             // $thongbao= "Thêm mới thất bại!";
            }else{
                            $thongbao= "Thêm mới thất bại!";
                        }
            // unset($ten_loai, $ma_loai);
}
        } catch (Exception $exc) {
            // print_r($exc);
            $thongbao = "Thêm mới thất bại!";
        }
    // } else {
    //     $thongbao = "Hãy nhập hàng hoá mới";
    // }

    $VIEW_NAME = "hanghoa_add.php";
} else if (exist_param("hanghoa_xoa")) {
    try {

        $sql_delete_hinh = "DELETE FROM hinh WHERE ma_hh = {$_GET['ma_hh']}";
        $query_delete_hinh = mysqli_query($connect, $sql_delete_hinh);

        $sql_delete_hang_hoa = "DELETE FROM hang_hoa WHERE ma_hh = '$_GET[ma_hh]'";
        $query_delete_hang_hoa = mysqli_query($connect, $sql_delete_hang_hoa);

        $thongbao = "Đã xoá thành công";
    } catch (Exception $exc) {
        $thongbao = "Xóa thất bại!";
    }
    // $listdanhmuc = loai_select_all();
    $total_records = (int)hh_count_all();
    $sp = hh_phan_trang_all_admin($start,$limit);    
    $VIEW_NAME = "hanghoa_list.php";
}

//     else if(exist_param("loaihang_sua")){
//         $connect = mysqli_connect("localhost", "root", "", "demo-duan1");
// if (isset($_POST['edit_category'])) {
//     $ma_loai = $_GET['ma_loai'];
//     $ten_loai = $_POST['ten_loai_update'];


// $sql_update_loai = "UPDATE loai SET ten_loai = '$ten_loai' WHERE ma_loai = '$ma_loai'";
// $query_update_loai = mysqli_query($connect, $sql_update_loai);
// header('location: dashboard.php');

// }
//         $capnhatdm= loai_select_by_id($ma_loai);
//         extract($capnhatdm);
//         $thongbao = "Đã lấy thành công";
//         $VIEW_NAME = "loaihang_edit.php";
//     }
else if (exist_param("hanghoa_sua")) {
    $total_records = (int)hh_count_all();

    try {

        if (isset($_POST['capnhat'])) {
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

            if (empty($_POST['mo_ta_update'])) {
                $mo_ta = $row_edit_hh['mo_ta'];
            } else {
                $mo_ta = $_POST['mo_ta_update'];
            }

            if (!file_exists("../../content/imgs/")) {
                mkdir("../../content/imgs/");
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
            $upload_image_1 = move_uploaded_file($image_1['tmp_name'], '../../content/imgs/' . $new_file_1);

            $image_2 = $_FILES['hinh2_update'];
            $file_name_2 = $image_2['name'];
            $file_name_2 = explode('.', $file_name_2);
            $ext_2 = end($file_name_2);
            if ($ext_2 == "") {
                $new_file_2 = $row_edit_hinh_desc['hinh'];
            } else {
                $new_file_2 = md5(uniqid()) . '.' . $ext_2;
            }
            $upload_image_2 = move_uploaded_file($image_2['tmp_name'], '../../content/imgs/' . $new_file_2);


            $sql_update = "UPDATE hang_hoa SET ten_hh = '$ten_hh', don_gia = '$don_gia', giam_gia = '$giam_gia', ma_loai = '$ma_loai', dac_biet = '$dac_biet', mo_ta = '$mo_ta', gioi_tinh = '$gioi_tinh', size_s = '$size_s', size_m = '$size_m', size_l = '$size_l', size_xl = '$size_xl', size_xxl = '$size_xxl' WHERE ma_hh = '$ma_hh'";
            $query_update = mysqli_query($connect, $sql_update);

            $sql_update_imgs = "UPDATE hinh SET hinh = '$new_file_1', vai_tro_hinh = 'Đại diện' WHERE ma_hh = '$ma_hh' AND vai_tro_hinh LIKE '%Đại diện%'";
            $query_update_imgs = mysqli_query($connect, $sql_update_imgs);
            $sql_update_imgs_mo_ta = "UPDATE hinh SET hinh = '$new_file_2', vai_tro_hinh = 'mô tả' WHERE ma_hh = '$ma_hh' AND vai_tro_hinh like N'%mô tả%'";
            $query_update_imgs_mo_ta = mysqli_query($connect, $sql_update_imgs_mo_ta);
            // header('location: dashboard.php');
            $thongbao = 'Cập nhật thành công';
        } else {
            // $thongbao= "Cập nhật thất bại!";

        }
    } catch (Exception $exc) {
        // $thongbao= "Cập nhật thất bại!";
    }


    $VIEW_NAME = "hanghoa_edit.php";
} else if (exist_param("hanghoa_list")) {
    // $listdanhmuc = loai_select_all();
    $VIEW_NAME = "hanghoa_list.php";
} else if (exist_param("search") ){
    $total_records = (int)dem_phanTrang_timKiem($search);
        $sp= kq_phanTrang_timKiem_admin($search,$start,$limit);
        $VIEW_NAME = "hanghoa_list.php";
  }  else{
        // function hanghoa_count_all(){
        // // $connect = mysqli_connect("localhost", "root", "", "demo-duan1");

        //     $sql_product = "SELECT * FROM hang_hoa inner join hinh on hang_hoa.ma_hh = hinh.ma_hh WHERE hinh.vai_tro_hinh = 'đại diện'";
        //     // $query_product = mysqli_query($connect, $sql_product);
        //     return pdo_query($sql_product);
        // }

            $total_records = (int)hh_count_all();
            $sp = hh_phan_trang_all_admin($start,$limit);    
           //  $sp= sp_all();
                 $VIEW_NAME = "hanghoa_list.php";
           }
        
           $total_page = ceil($total_records / $limit);
            // Giới hạn current_page trong khoảng 1 đến total_page
            if ($current_page > $total_page){
               $current_page = $total_page;
           }
           else if ($current_page < 1){
               $current_page = 1;
           }
require "../index.php";
?>
