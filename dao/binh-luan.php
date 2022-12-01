<?php 

function binh_luan_select_by_hang_hoa($ma_hh){
  $sql = "select * from binh_luan join khachhang on khachhang.ma_kh = binh_luan.ma_kh where ma_hh = $ma_hh and trang_thai like '%đã duyệt%' " ;
  return pdo_query($sql);
}

function binh_luan_insert($ma_kh, $ma_hh, $noi_dung, $ngay_bl,$trang_thai){
  $sql = "INSERT INTO binh_luan(ma_kh, ma_hh, noi_dung, ngay_bl,trang_thai) VALUES ('$ma_kh','$ma_hh','$noi_dung','$ngay_bl','$trang_thai') ";
  pdo_execute($sql);
}



?>
