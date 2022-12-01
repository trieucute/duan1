<?php
require "../../global.php";
require "../../dao/loai.php";
require "../../dao/hanghoa.php";
// include_once 'product_add.php';
include_once 'product_edit.php';
include_once '../trangchinh/currency_format.php';

// extract($_REQUEST);





    check_login();

    //phân giải các field name từ form trong form thành cách biến
    extract($_REQUEST); 
    
    if(exist_param("hanghoa_add")){
        // $hinh= save_file("hinh","$img_path");
     
       if(!empty($ten_hh)&&!empty($don_gia) &&!empty($hinh)&&!empty($ngay_nhap)&&!empty($mo_ta)&&!empty($gioi_tinh)){
       
        try {  
             $connect = mysqli_connect("localhost", "root", "", "demo-duan1");
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
            
                if (!file_exists("../../content/imgs/")){
                    mkdir("../../content/imgs/");
                }
                
            
                $image_1 = $_FILES['hinh1'];
                $file_name_1 = $image_1['name'];
                $file_name_1 = explode('.', $file_name_1);
                $ext_1 = end($file_name_1);
                if($ext_1==""){
                    $new_file_1 = "";
                } else {
                    $new_file_1 = md5(uniqid()) . '.' . $ext_1;
                }
                $upload_image_1 = move_uploaded_file($image_1['tmp_name'], '../../content/imgs/' . $new_file_1);
            
                $image_2 = $_FILES['hinh2'];
                $file_name_2 = $image_2['name'];
                $file_name_2 = explode('.', $file_name_2);
                $ext_2 = end($file_name_2);
                if($ext_2==""){
                    $new_file_2 = "";       
                } else {
                    $new_file_2 = md5(uniqid()) . '.' . $ext_2;
                }
                $upload_image_2 = move_uploaded_file($image_2['tmp_name'], '../../content/imgs/' . $new_file_2);
            
            
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
                  $thongbao = "Thêm thành công";
                }else{
                    $thongbao= "Thêm mới thất bại!";
         }
             // unset($ten_loai, $ma_loai);
            
         }
         catch (Exception $exc) {
             // $thongbao= "Thêm mới thất bại!";
         }
        
 }else{
     $thongbao= "Thêm mới thất bại!";
 }

     $VIEW_NAME = "hanghoa_add.php";
         }
       
   

    else if(exist_param("hanghoa_xoa")){
        try {
            $connect = mysqli_connect("localhost", "root", "", "demo-duan1");

            $sql_delete_loai = "DELETE FROM loai WHERE ma_loai = '$_GET[ma_loai]'";
            $query_delete_loai = mysqli_query($connect, $sql_delete_loai);
            
            $thongbao = "Đã xoá thành công";
     } 
        catch (Exception $exc) {
            $thongbao= "Xóa thất bại!";
        }
        // $listdanhmuc = loai_select_all();
    
        $VIEW_NAME = "loaihang_list.php";

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
    else if(exist_param("loaihang_sua")){ 
    
        try {
          
            $connect = mysqli_connect("localhost", "root", "", "demo-duan1");
            if (isset($_POST['capnhat'])) {
                $ma_loai = $_GET['ma_loai'];
                $ten_loai = $_POST['ten_loai_update'];
            
                $sql_update_loai = "UPDATE loai SET ten_loai = '$ten_loai' WHERE ma_loai = '$ma_loai'";
                $query_update_loai = mysqli_query($connect, $sql_update_loai);
                // header('location: dashboard.php');
                $thongbao='Cập nhật thành công';
            }else{
            // $thongbao= "Cập nhật thất bại!";

            }
          
      
             
        } 
        catch (Exception $exc) {
            // $thongbao= "Cập nhật thất bại!";
        }
    
       
        $VIEW_NAME = "loaihang_edit.php";

    }
    else if(exist_param("loaihang_list")){
        $listdanhmuc = loai_select_all();
        $VIEW_NAME = "loaihang_list.php";
    }
    else{
        $VIEW_NAME = "hanghoa_list.php";
    }
require "../index.php";
    
?>