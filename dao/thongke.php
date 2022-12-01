<?php 

function thong_ke_hang_hoa(){
   $sql = "SELECT lo.ma_loai, lo.ten_loai,"
           . " COUNT(*) so_luong,"
           . " MIN(hh.don_gia) gia_min,"
           . " MAX(hh.don_gia) gia_max,"
           . " AVG(hh.don_gia) gia_avg"
           . " FROM hang_hoa hh "
           . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
           . " GROUP BY lo.ma_loai, lo.ten_loai";
   return pdo_query($sql);
}

function dem_user(){
    $sql = "SELECT  COUNT(*) so_luong  FROM user ";
            
    return pdo_query($sql);
 }
 function dem_bl(){
    $sql = "SELECT  COUNT(*) so_luong  FROM binh_luan ";
            
    return pdo_query($sql);
 }
 function dem_dh(){
    $sql = "SELECT  COUNT(*) so_luong  FROM don_hang ";
            
    return pdo_query($sql);
 }
?>