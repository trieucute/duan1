<?php
require "../../global.php";
require "../../dao/loai.php";
require "../../dao/hanghoa.php";
// extract($_REQUEST);





check_login();

//phân giải các field name từ form trong form thành cách biến
extract($_REQUEST);

if (exist_param("loaihang_add")) {
    // if (!empty($ten_loai)) {
        try {
            $connect = mysqli_connect("localhost", "root", "", "demo-duan1");
            if (isset($_POST['themmoi'])) {
                $ten_loai = $_POST['ten_loai'];
                if (empty($_POST['ten_loai'])) {
                    $error['ten_loai'] = 'Bạn chưa nhập tên loại';
                } 
                if($ten_loai != "") {



                    $sql_insert_category = "INSERT INTO loai (ten_loai) VALUES ('$ten_loai') order by ma_loai asc";
                    $query_insert_category = mysqli_query($connect, $sql_insert_category);
                    $thongbao = "Thêm thành công";
                } else {
            $thongbao = "Thêm mới thất bại!";
        }
            
    }
                // unset($ten_loai, $ma_loai);
       
        } catch (Exception $exc) {
            // $thongbao= "Thêm mới thất bại!";
        }
    
   
    $VIEW_NAME = "loaihang_add.php";
        
} else if (exist_param("loaihang_xoa")) {
    try {
        $connect = mysqli_connect("localhost", "root", "", "demo-duan1");

        $sql_delete_loai = "DELETE FROM loai WHERE ma_loai = '$_GET[ma_loai]'";
        $query_delete_loai = mysqli_query($connect, $sql_delete_loai);

        $thongbao = "Đã xoá thành công";
    } catch (Exception $exc) {
        $thongbao = "Xóa thất bại!";
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
else if (exist_param("loaihang_sua")) {

    try {

        $connect = mysqli_connect("localhost", "root", "", "demo-duan1");
        if (isset($_POST['capnhat'])) {
            $ma_loai = $_GET['ma_loai'];
            $ten_loai = $_POST['ten_loai_update'];

            $sql_update_loai = "UPDATE loai SET ten_loai = '$ten_loai' WHERE ma_loai = '$ma_loai'";
            $query_update_loai = mysqli_query($connect, $sql_update_loai);
            // header('location: dashboard.php');
            $thongbao = 'Cập nhật thành công';
        } else {
            // $thongbao= "Cập nhật thất bại!";

        }
    } catch (Exception $exc) {
        // $thongbao= "Cập nhật thất bại!";
    }


    $VIEW_NAME = "loaihang_edit.php";
} else if (exist_param("loaihang_list")) {
    $listdanhmuc = loai_select_all();
    $VIEW_NAME = "loaihang_list.php";
} else {
    $VIEW_NAME = "loaihang_list.php";
}
require "../index.php";
