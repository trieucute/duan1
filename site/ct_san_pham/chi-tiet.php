<?php

require_once "../../global.php";
require_once "../../dao/hanghoa.php";
require_once "../../dao/binh-luan.php";

require_once "../../dao/pdo.php";


extract($_REQUEST);

$hang_hoa = sp_load($ma_hh);


extract($hang_hoa);
// print_r($hang_hoa);
tang_lx($ma_hh);
// echo $hinh;
if(exist_param("noi_dung")){
    $ma_kh=$_SESSION['user']['ma_kh'];
$ngay_bl=date_format(date_create(),'Y-m-d');
binh_luan_insert($ma_kh,$ma_hh,$noi_dung,$ngay_bl,$trang_thai);




}
$binh_luan_list =binh_luan_select_by_hang_hoa($ma_hh);
$VIEW_NAME = "ct_san_pham/chi-tiet-ui.php";
require "../layout.php";

?>