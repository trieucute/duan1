<?php 
require_once "pdo.php";

// thêm vào chi tiết don hàng
function add_don_hang_ct($ma_hh,$ma_don_hang,$so_luong,$don_gia,$size){
  $sql = "insert into  chi_tiet_don_hang(ma_hh,ma_don_hang,so_luong,don_gia,size) values ('$ma_hh','$ma_don_hang',$so_luong,$don_gia,'$size')";
  pdo_execute($sql);

}

// thêm mới đơn hàng
function add_don_hang($email,$SDT,$dia_chi,$trang_thai,$ma_kh,$pttt,$nguoi_nhan,$tong_tien){
  $sql = "insert into don_hang(email,SDT,dia_chi,trang_thai,ma_kh,phuong_thuc_thanh_toan,ho_ten_nguoi_nhan,tong_tien) values ('$email','$SDT','$dia_chi','$trang_thai','$ma_kh','$pttt','$nguoi_nhan',$tong_tien)";
  // print_r($sql);
  pdo_execute($sql);
}

// lấy mã đơn hàng mới thêm
function don_hang_top1 (){
  $sql = "select  * from don_hang order by ma_don_hang desc limit 1";
  return pdo_query_one($sql);
}

// lấy đơn hàng theo mã khách hàng

function don_hang_by_ma_kh($ma_kh){
  $sql = "select * from don_hang where ma_kh = $ma_kh";
  return pdo_query($sql);
}
function don_hang_huy($ma_don_hang){
  $sql = "select * from don_hang where trang_thai= 'Chờ xác nhận' and ma_don_hang = '$ma_don_hang' ";
 
  return pdo_query($sql);
}
function don_hang_by_huy($ma_don_hang){
  $sql = "UPDATE don_hang SET trang_thai= 'Đã huỷ'  where ma_don_hang = '$ma_don_hang' ";
 
  pdo_execute($sql);
}
// lấy chi tiết đơn don

function select_ct_don_hang($ma_don_hang){
  $sql = "select * from chi_tiet_don_hang where ma_don_hang = $ma_don_hang";

  return pdo_query($sql);

}

?>