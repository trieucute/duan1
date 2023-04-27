<?php
require "../../global.php";
require "../../dao/loai.php";
require "../../dao/khach-hang.php";
include_once '../trangchinh/currency_format.php';

// extract($_REQUEST);
// require_once "encryption.php";
$connect = mysqli_connect("localhost", "root", "", "demo-duan1");
    check_login();

    //phân giải các field name từ form trong form thành cách biến
    extract($_REQUEST); 
    
    if(exist_param("don_moi")){
        $VIEW_NAME = "dh_list_moi.php";

    }else  if(exist_param("da_giao")){
        $VIEW_NAME = "dh_list_done.php";

    }else  if(exist_param("dang_giao")){
        $VIEW_NAME = "dh_list_dvc.php";
    }
    else if(exist_param("ct_dh")){
        if (isset($_POST['cap_nhat_don_hang'])) {
            $ma_don_hang = $_GET['ma_don_hang'];
            $trang_thai = $_POST['trang_thai'];
            $sql_update_don_hang = "UPDATE don_hang SET trang_thai = '$trang_thai' WHERE ma_don_hang = '$ma_don_hang'";
            $query_update_don_hang = mysqli_query($connect, $sql_update_don_hang);    
        }
        // if (isset($_GET['ma_bl'])) {
        // $sql_delete_desc_cmt = "DELETE FROM binh_luan WHERE ma_bl = '$_GET[ma_bl]'";
        // $query_delete_desc_cmt = mysqli_query($connect, $sql_delete_desc_cmt);
        // }
        $VIEW_NAME = "ct_dh.php";
      
    }
    else{
        $VIEW_NAME = "dh_list.php";
    }
require "../index.php";
    
?>