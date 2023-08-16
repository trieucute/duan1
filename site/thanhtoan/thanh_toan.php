<?php 
// session_start();

require_once "../../global.php";
require_once "../../dao/khach-hang.php";
require_once "../../dao/don-hang.php";
require_once "../../dao/hanghoa.php";

extract($_REQUEST);
$message = "";
if (!isset($_SESSION['user'])){

  header("location:../taikhoan/dangky.php");

}
if(exist_param('dat_hang')){
  if (empty($_POST['ho_ten_nguoi_nhan'])){
    $error['ho_ten_nguoi_nhan'] = 'Bạn chưa nhập họ tên';
}

if (empty($_POST['email'])){
    $error['email'] = 'Bạn chưa nhập email';
}
 if (empty($_POST['dia_chi'])){
    $error['dia_chi'] = 'Bạn chưa nhập địa chỉ';
}
// $pattern = '#^?[\d]3?-?[\d]2?-[\d]{2}\.[\d]{3}-[\d]{3}$#';
if (empty($_POST['SDT'])){

  $error['SDT'] = 'Bạn chưa nhập số điện thoại';
}else if ( preg_match("/^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/",  $_POST['SDT']) == false){
 
  $error['SDT'] = 'Bạn nhập sai số điện thoại';
}
if(  $ho_ten_nguoi_nhan != "" && $email != "" && $dia_chi!= ""  && (preg_match("/^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/",  $_POST['SDT']) == true )){
  if (isset($_SESSION['user'])){

    $user = $_SESSION['user'];
    $kh_info = khach_hang_select_by_id($user['email']) ;
  
  }else{
    header("location:../taikhoan/dangky.php");


  };
  $cart = $_SESSION['cart'];
  $tong_tien = 0;
  $ship = 30000;
  foreach($cart as $row){
    $tong_tien += $row['so_luong'] * $row['don_gia'];

  }
  
  add_don_hang($email,$SDT,$dia_chi, "Chờ xác nhận",$kh_info['ma_kh'],$pttt,$ho_ten_nguoi_nhan,$tong_tien+$ship);
  $don = don_hang_top1();

  foreach($cart as $row){
    add_don_hang_ct($row['id'],$don['ma_don_hang'],$row['so_luong'],$row['don_gia'],$row['size']);
    hh_giam_so_luong($row['id'],$row['size'],$row['so_luong']);

  }

  $message = "Đặt hàng thành công <p>Xem đơn hàng của bạn  <a href='../donhang/don_hang.php?ma_dh={$don['ma_don_hang']}'>tại đây</a>";

  $_SESSION['cart'] = array();
  

}
}
$VIEW_NAME = "thanhtoan/thanh_toan_ui.php";
// if(exist_param("momo")){
// $VIEW_NAME = "thanhtoan/xu_ly_momo.php";

// }
require "../layout.php";



?>