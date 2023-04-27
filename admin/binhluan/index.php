<?php
require "../../global.php";
require "../../dao/loai.php";
require "../../dao/khach-hang.php";
// extract($_REQUEST);
// require_once "encryption.php";
$connect = mysqli_connect("localhost", "root", "", "demo-duan1");
    check_login();

    //phân giải các field name từ form trong form thành cách biến
    extract($_REQUEST); 
    
 
     if(exist_param("ct_bl")){
        if (isset($_POST['comfirm_cmt'])) {
            $sql_comfirm_desc_cmt = "UPDATE binh_luan SET trang_thai = 'đã duyệt' WHERE ma_bl = '$_POST[ma_binh_luan]'";
            $query_comfirm_desc_cmt = mysqli_query($connect, $sql_comfirm_desc_cmt);
        }
        if (isset($_GET['ma_bl'])) {
        $sql_delete_desc_cmt = "DELETE FROM binh_luan WHERE ma_bl = '$_GET[ma_bl]'";
        $query_delete_desc_cmt = mysqli_query($connect, $sql_delete_desc_cmt);
        }
        $VIEW_NAME = "ct_bl.php";
      
    }
    else{
        $VIEW_NAME = "bl_list.php";
    }
require "../index.php";
    
?>